<?php

namespace Hip\Workflow\Http\Controllers;

use App\Helpers\RequestHelper;
use App\Http\Controllers\Controller;
use App\Models\AppClass;
use App\Models\AppWfStatus;
use App\Models\MasterData\FormGenerator\AppForm;
use Carbon\Carbon;
use Hip\CustomAuth\Http\Controllers\AuthController;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WorkflowController extends Controller
{

    //  ----------  CUSTOM ESRI PROVIDER
    protected $workflowApi;

    protected $superset;

    public $whichModel;

    /**
     * @param $className
     * @param $table
     * @param $primaryKey
     * @return string
     */
    public function createDynamicModel($className, $table, $primaryKey, $class_schema )
    {

        //  Load up the template data and replace the placeholders
        if($class_schema != 'master_data'){
            $file_path = '/var/www/html/packages/FormGenerator/src/Http/Controllers/dynamic_class_template_app.txt';
        }else{
            $file_path = '/var/www/html/packages/FormGenerator/src/Http/Controllers/dynamic_class_template.txt';
        }

        $dynamic_file_path = '/var/www/html/app/Models/MasterData/FormGenerator/' . $className . 'Dynamic';

        $contents = scandir('/var/www/html/app/Models/MasterData/FormGenerator');

        if (in_array($className . 'Dynamic.php', $contents))
            return 'App\\Models\\MasterData\\FormGenerator\\' . $className . 'Dynamic';

        $fileContent = file_get_contents($file_path);
        $fileContent = str_replace("{0}", $className . 'Dynamic', $fileContent);
        $fileContent = str_replace("{1}", $table, $fileContent);
        $fileContent = str_replace("{2}", $primaryKey, $fileContent);
        $dynamicFile = fopen($dynamic_file_path . ".php", "w+");
        //Let us create a dynamic php file for the model
        fwrite($dynamicFile, $fileContent);
        fclose($dynamicFile);

        chmod($dynamic_file_path . ".php", 0755);

        //Finally we want to load up the model
        return 'App\\Models\\MasterData\\FormGenerator\\' . $className . 'Dynamic';

    }

    /**
     * @param $formId
     */
    public function getActiveModel($formId)
    {

        if (!$formId)
            return;

        $form = AppForm::select(
            'class_name',
            'pk_field_name',
            'class_schema',
            'app_form.*')
            ->leftJoin(
                'master_app.app_class',
                'master_app.app_class.class_id',
                '=',
                'master_app.app_form.class_id')
            ->where('form_id', $formId )->first();

        $className = str_replace('_', '', ucwords($form->class_name, '_\/'));

        //This needs to access the requests to dynamically assign the className, table, primaryKey and fillable from the gridId
        $table = $form->class_name;
        $primaryKey = $form->pk_field_name;

        $getTheApp = $this->createDynamicModel($className, $table, $primaryKey, $form->class_schema);

        $this->whichModel = app($getTheApp);

        return $form;

    }

    public function __construct( \App\ExternalProviders\WorkflowApi $workflowApi, \App\ExternalProviders\Superset $superset )
    {

        $this->workflowApi = $workflowApi;

        $this->superset = $superset;

    }

    /**
     * @param $facilityInformationRequest
     * @return bool|mixed
     * NO ROUTE
     */
    public function initiateWorkflow( $facilityInformationRequest ){

        $informationUser = array(
            'userid' => '{' . auth('sanctum')->user()->sec_user_id . '}',
            'expiry' => Carbon::now('UTC')->addMinutes( 240 )->format('Y-m-d H:i:s')
        );

        $sendUserSecure = AuthController::encryptWithData( $informationUser );

        //  --------------  FIRE REQUEST TO WORKFLOW API
        $requestStarted = $this->workflowApi->startWorkflow( env('WORKFLOW_URL_INITIATE'), [], array(
            "token" => $sendUserSecure,
            'wf_id'  => '388e3b8a-36ea-4dda-ac2d-d3dd0103ed0a',
            'hips_facility_request_id' => $facilityInformationRequest->hips_facility_request_id,
            'class_id'  => $facilityInformationRequest->class_id,
            'ref1'      => $facilityInformationRequest->ref1
        ));

        return $requestStarted;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function workflowApproval( Request $request ){

        try {

            $validator = Validator::make($request->all(),[
                'wf_instance_id' => 'required',
                'request_status_id' => 'required'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());
            }

            //  --------------- RUN STATE MACHINE
            $informationUser = array(
                'userid' => '{' . auth('sanctum')->user()->sec_user_id . '}',
                'expiry' => Carbon::now('UTC')->addMinutes( 240 )->format('Y-m-d H:i:s')
            );

            $sendUserSecure = AuthController::encryptWithData( $informationUser );

            //  --------------  FIRE REQUEST TO WORKFLOW API
            $this->workflowApi->workflowApproval( env('WORKFLOW_APPROVAL'), [], array(
                "token" => $sendUserSecure,
                'wf_instance_id'  => $request->wf_instance_id,
                'request_status_id' => $request->request_status_id
            ));

            return response()->json([
                'success' => true,
                'status'  => $request->status,
                'wf_instance_id'  => $request->wf_instance_id
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }catch(\Exception $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function workflowProgress( Request $request ){

        try {

            $validator = Validator::make($request->all(),[
                'form_id' => 'required',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());
            }

            $getClassId = AppForm::find( $request->form_id )->class_id;

            $getClass = AppClass::find($getClassId);

            //  --------------- GET ACTIVE MODEL
            self::getActiveModel($request->form_id);

            //  --------------- WHICH MODEL AND UPDATE
            $getModel = $this->whichModel->where($getClass->pk_field_name, $request[$getClass['pk_field_name']])->first();
            $getModel->request_status_id = $request->request_status_id;
            $getModel->save();

            //  --------------- RUN STATE MACHINE
            $informationUser = array(
                'userid' => '{' . auth('sanctum')->user()->sec_user_id . '}',
                'expiry' => Carbon::now('UTC')->addMinutes( 240 )->format('Y-m-d H:i:s')
            );

            $sendUserSecure = AuthController::encryptWithData( $informationUser );

            //  --------------  FIRE REQUEST TO WORKFLOW API
            $this->workflowApi->workflowProgress( env('WORKFLOW_PROGRESS'), [], array(
                "token" => $sendUserSecure,
                'wf_instance_id'  => $request->wf_instance_id,
                'request_status_id' =>  $request->request_status_id
            ));

            return response()->json([
                'success' => true,
                'status'  => $request->status,
                'wf_instance_id'   => $request->wf_instance_id
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }catch(\Exception $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWorkflowStatus(Request $request ){

        try {

            return response()->json([
                'success' => true,
                'data' => AppWfStatus::orderBy('status', 'ASC')->get()
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
            'success' => false,
            'message' => $e->getMessage()
            ]);

        }catch(\Exception $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function workflowTest(Request $request)
    {

        return response()->json([
            'success' => true
        ]);

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function runSuperSetChartImage(Request $request){

        try {

            $validator = Validator::make($request->all(),[
                'id' => 'required',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());
            }

            $allowedDashboards = [];

            $getAccessToken = $this->superset->getAccessGuestToken( env('SUPERSET_API') . '/api/v1/security/login', [], array(
                "password" => env("SUPERSET_PASSWORD"),
                "provider" => "db",
                "refresh" => "true",
                "username" => env("SUPERSET_USERNAME"),
            ));

            if(!isset($getAccessToken['access_token'])){
                return response()
                    ->json([
                        'success' => false,
                        'message' => "No access token."
                    ]);
            }

            $getCharts = $this->superset->getCharts( env('SUPERSET_API') . '/api/v1/chart/?q={"page": 0,"page_size": '. $request->pagesize .'}', array(
                "Authorization" => "Bearer " . $getAccessToken['access_token']
            ), array(
                'force' => true
            ));

            return response()->json([
                'success' => true,
                'data' => $getCharts
            ]);

            $imageCreated = $this->workflowApi->workflowSupersetRunChartImage( env('WORKLFLOW_SUPERSET') . $request->id , [] );

            return response()->json([
                'success' => true,
                'data' => $imageCreated
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }catch(\Exception $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }

    }

    /**
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public function checkConnection(){

        try {

            $checkConnection = RequestHelper::requestGet( env('WORKFLOW_CONNECTION'), [] );

            if($checkConnection['status']){
                return true;
            }else{
                return false;
            }

        }catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }catch(\Exception $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }catch(\Throwable $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }

    }

}