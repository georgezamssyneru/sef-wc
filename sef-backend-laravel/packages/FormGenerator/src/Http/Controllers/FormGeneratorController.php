<?php

namespace Hip\FormGenerator\Http\Controllers;

use App\Events\EventHistory;
use App\Helpers\ExternalHelper;
use App\Http\Controllers\Controller;
use App\Models\AppClass;
use App\Models\AppClassAttribute;
use App\Models\AppGridAttributes;
use App\Models\MasterData\FormGenerator\AppForm;
use App\Models\MasterData\FormGenerator\AppFormAttributes;
use App\Models\MasterData\FormGenerator\FacilityRequest;
use App\Models\MasterData\FormGenerator\HipsFacilityRequestDynamic;
use App\Models\MasterData\FormGenerator\HipsScenarioWf;
use App\Models\MasterData\HipsFacilityRequestComment;
use App\Models\MasterData\HipsScenarioDef;
use Carbon\Carbon;
use Hip\CustomAuth\Http\Controllers\AuthController;
use Hip\Workflow\Http\Controllers\WorkflowController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
use Enforcer;

class FormGeneratorController extends Controller
{

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


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getClassAttributesMetaData(Request $request)
    {

        try {

            $allMeta = array();

            $validator = Validator::make($request->all(), [
                'classId' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $getGridAttributes = AppClassAttribute::where('class_id', $request->classId)
                ->get();

            foreach ($getGridAttributes as &$v) {

                if (!array_key_exists( $v->lk_table, $allMeta)) {

                    $getConcat = $v->lk_schema . '.' . $v->lk_table;

                    if ($v->lk_schema && $v->lk_table) {

                        try{

                            if($v->filter_query_class){
                                $types = DB::select('SELECT ' . $v->lk_join . ', '. $v->lk_display .' FROM ' . $getConcat .' WHERE ' . $v->filter_query_class );
                            }else if($v->filter_query){
                                $types = DB::select('SELECT ' . $v->lk_join . ', '. $v->lk_display .' FROM ' . $getConcat .' WHERE ' . $v->filter_query );
                            }else{
                                $types = DB::select('SELECT ' . $v->lk_join . ', '. $v->lk_display .' FROM ' . $getConcat );
                            }

                        }catch (\Illuminate\Database\QueryException $e) {

                            //  ------- GET ALL AS THERE IS NO COLUMN
                            $types = DB::select('SELECT ' . $v->lk_join . ', '. $v->lk_display .' FROM ' . $getConcat );

                        }

                        $allMeta[$v->lk_table] = $types;

                    }

                    //  ---------------    CREATE META DATA IF LK TABLE USE
                    if( isset( $v->lk_table_use ) ){

                        foreach ($getGridAttributes as &$val) {

                            if( $v->lk_table_use === $val->lk_table ){

                                //  -------------   CHECK IF ALREADY CREATED
                                if ( !array_key_exists( $v->field_name, $allMeta) ) {

                                    $getConcat = $val->lk_schema . '.' . $val->lk_table;

                                    if ( $val->lk_schema && $val->lk_table ) {

                                        try{

                                            if( $v->filter_query_class ){
                                                $typeUseTable = DB::select('SELECT ' . $val->lk_join . ', '. $val->lk_display .' FROM ' . $getConcat .' WHERE ' . $v->filter_query_class );
                                            }else if($v->filter_query){
                                                $typeUseTable = DB::select('SELECT ' . $val->lk_join . ', '. $val->lk_display .' FROM ' . $getConcat .' WHERE ' . $v->filter_query );
                                            }else{
                                                $typeUseTable = DB::select('SELECT ' . $val->lk_join . ', '. $val->lk_display .' FROM ' . $getConcat );
                                            }

                                        }catch (\Illuminate\Database\QueryException $e) {

                                            //  ------- GET ALL AS THERE IS NO COLUMN
                                            $typeUseTable = DB::select('SELECT ' . $val->lk_join . ', '. $val->lk_display .' FROM ' . $getConcat );

                                        }

                                        $allMeta[$v->field_name] = $typeUseTable;

                                    }

                                }

                            }

                        }

                    }

                }

            }

            return response()->json([
                'success' => true,
                'data' => $allMeta
            ]);

        } catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getGeomFromLatLong(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'longitude' => 'required',
                'latitude'      => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $province = DB::select('SELECT gid, pr_name FROM master_demographics.hips_provinces WHERE public.ST_Contains(public.ST_Transform(public.ST_SetSRID(geom, 4326), 4326) , public.ST_GeometryFromText(\'POINT(' . $request->longitude .' '. $request->latitude.')\', 4326));');

            $municipality = DB::select('SELECT id, district_n  FROM master_data.hips_district_municipalities WHERE public.ST_Contains(public.ST_Transform(public.ST_SetSRID(geom, 4326), 4326) , public.ST_GeometryFromText(\'POINT(' . $request->longitude .' '. $request->latitude.')\', 4326));');

            return response()->json([
                'success' => true,
                'province' => $province,
                'municipality' => $municipality,
            ]);

        } catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);

        }

    }

    //  --------------------
    //  --------------------    STORE
    //  --------------------
    public function storeData(  Request $request )
    {

        try {

            //  ------------------  CHECK WORKFLOW API CONNECTION
            $checkConnection = app('Hip\Workflow\Http\Controllers\WorkflowController')
                ->checkConnection();

            if(!$checkConnection){

                //  LOG TO DB
                event( new EventHistory( array(
                    'email'     => auth('sanctum')->user()->sec_user_id,
                    'url '      => $request->fullUrl(),
                    'error'     => 'WORKFLOW API DOWN'
                ),'API_ENDPOINT_ERROR') );

                return response()->json([
                    'success'   => false,
                    'message'  => 'Workflow api is down.',
                ]);
            }

            $getAllAttchments = json_decode($request->Attachments, false);

            $getDTO = json_decode($request->DTO, true);

            //  ------------    CHECK IF FORM ID
            if(!$getDTO['form_id'])
                return response()->json([
                    'success'   => false,
                    'message'  => 'No Form Id'
                ]);

            if($request->Attachments){
                foreach ($getAllAttchments as $value) {

                    if($request->file($value)){
                        $getDTO[$value] = "data:image/png;base64,".base64_encode($request->file($value)->getContent());
                    }else{
                        unset($getDTO[$value]);
                    }

                }
            }

            $getFormData = self::getActiveModel($getDTO['form_id']);

            //  -----   PLACE INFORMATION ON LOGGED IN USER
            $getDTO['sec_user_id'] = auth('sanctum')->user()->sec_user_id;

            //unset($getDTO['formId']);

            //  -------------   CHECK TO SEE IF WE ARE SAVING AND WE HAVE A FACILITY REQUEST ID
            if( isset($getDTO['facility_request_id']) ){

                $updateThisModal = $this->whichModel->where('facility_request_id', $getDTO['facility_request_id']);

                $updateThisModal->update($getDTO);

                $facilityInformationRequest = $updateThisModal->first();

            }else{

                //  ----------  IF CLINIC CATEGORY PLACE IN FACILITY TYPE CODE
                if( isset($getDTO['clinic_category']) ){
                    $getDTO['facility_type_code'] = $getDTO['clinic_category'];
                }

                $facilityInformationRequest = $this->whichModel->create($getDTO);

            }

            //  --------------  IF SUBMITTED
            if( $getDTO['request_status_id'] === 2 ){

                $facilityInformationRequest['class_name'] = $getFormData->class_name;
                $facilityInformationRequest['class_id'] = $getFormData->class_id;
                $facilityInformationRequest['class_schema'] = $getFormData->class_schema;
                $facilityInformationRequest['pk_field_name'] = $getFormData->pk_field_name;
                $facilityInformationRequest['ref1'] = $facilityInformationRequest[$getFormData->pk_field_name];

                //  ------------    INITIATE WORKFLOW AND SEND ENCRYPTED TOKEN
                $initiateWorkFlow = app('Hip\Workflow\Http\Controllers\WorkflowController')
                    ->initiateWorkflow( $facilityInformationRequest );

                if(isset($initiateWorkFlow['wf_instance_id'])){

                    //  ------------    UPDATE RECORD ON RESPONSE
                    $updateModel = $this->whichModel->find($facilityInformationRequest[$getFormData->pk_field_name]);
                    $updateModel->wf_instance_id = $initiateWorkFlow['wf_instance_id'];
                    $updateModel->save();

                }

            }

            return response()->json([
                'success'   => true,
                //'response'  => $initiateWorkFlow,
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Throwable $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }

    }

    //  --------------------
    //  --------------------    APPROVAL DATA
    //  --------------------
    public function approvalData(  Request $request )
    {

        try {

            //  ------------------  CHECK WORKFLOW API CONNECTION
            $checkConnection = app('Hip\Workflow\Http\Controllers\WorkflowController')
                ->checkConnection();

            if(!$checkConnection){

                //  LOG TO DB
                event( new EventHistory( array(
                    'email'     => auth('sanctum')->user()->sec_user_id,
                    'url '      => $request->fullUrl(),
                    'error'     => 'WORKFLOW API DOWN'
                ),'API_ENDPOINT_ERROR') );

                return response()->json([
                    'success'   => false,
                    'message'  => 'Workflow api is down.',
                ]);
            }

            $validator = Validator::make($request->all(), [
                'assigned_infrastructure_planner' => 'required',
                'facility_request_id'            => 'required',
                'form_id'                        => 'required',
                'wf_instance_id'                 => 'required',
                'comment'                        => 'required',
                'wf_state_id'                    => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            //  -------------   APPROVAL REGIONAL PLANNER
            $updateModel = HipsFacilityRequestDynamic::find($request->facility_request_id);
            $updateModel->assigned_infrastructure_planner = $request->assigned_infrastructure_planner;
            $updateModel->request_status_id = $request->request_status_id;
            $updateModel->save();

            //  -------------   SAVE QUALYING CRITERIA TO COMMENTS
            HipsFacilityRequestComment::create(array(
                'facility_request_id'   =>  $request->facility_request_id,
                'sec_user_id'   =>  auth('sanctum')->user()->sec_user_id,
                'comment'   =>  $request->comment,
                'wf_state_id'   =>  $request->wf_state_id
            ));

            //  ------------    INITIATE WORKFLOW AND SEND ENCRYPTED TOKEN
            app('Hip\Workflow\Http\Controllers\WorkflowController')
                ->workflowApproval( $request );

            return response()->json([
                'success'   => true
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }

    }

    //  --------------------
    //  --------------------    APPROVAL DATA INFRASTRUCTURE PLANNER
    //  --------------------
    public function approvalInfrastructurePlannerData(  Request $request )
    {

        try {

            //  ------------------  CHECK WORKFLOW API CONNECTION
            $checkConnection = app('Hip\Workflow\Http\Controllers\WorkflowController')
                ->checkConnection();

            if(!$checkConnection){

                //  LOG TO DB
                event( new EventHistory( array(
                    'email'     => auth('sanctum')->user()->sec_user_id,
                    'url '      => $request->fullUrl(),
                    'error'     => 'WORKFLOW API DOWN'
                ),'API_ENDPOINT_ERROR') );

                return response()->json([
                    'success'   => false,
                    'message'  => 'Workflow api is down.',
                ]);
            }

            $validator = Validator::make($request->all(), [
                'facility_request_id'            => 'required',
                'form_id'                        => 'required',
                'wf_instance_id'                 => 'required',
                'comment'                        => 'required',
                'wf_state_id'                    => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            //  -------------   APPROVAL REGIONAL PLANNER
            $updateModel = HipsFacilityRequestDynamic::find($request->facility_request_id);
            $updateModel->request_status_id = $request->request_status_id;
            $updateModel->save();

            //  -------------   SAVE QUALYING CRITERIA TO COMMENTS
            HipsFacilityRequestComment::create(array(
                'facility_request_id'   =>  $request->facility_request_id,
                'sec_user_id'   =>  auth('sanctum')->user()->sec_user_id,
                'comment'   =>  $request->comment,
                'wf_state_id'   =>  $request->wf_state_id
            ));

            //  -----------     PLACE THE STATUS THE STATE MACHINE UNDERSTANDS FOR APPROVED / DECLINED
            $request->merge([
                'request_status_id' => ($request->request_status_id == 9) ? 8 : 7
            ]);

            //  ------------    CREATE THE HIPS SCENARIO DEF
            $allScenarioDef = explode(",", $request->service_area_def_id);

            //  ------------    RUN TRIGGER TO INITIATE A CREATE SCENARIO
            $createScenario = DB::connection('pgsqlMasterData')->select( DB::raw("CALL scenario_create( ". (int) $request->facility_request_id . ", '" . $request->scenario_name . "', '" . $request->scenario_description . "', " . (int) $request->target_acc_period_id . ", '" . $request->service_area_def_id . "', NULL )"));

            $getScenarioId = json_decode(json_encode($createScenario), true);

            //  ------------    INITIATE WORKFLOW AND SEND ENCRYPTED TOKEN
            app('Hip\Workflow\Http\Controllers\WorkflowController')
                ->workflowApproval( $request );

            //  ------------    CREATE DRIVE TIME
            if( !$updateModel->is_addition ){

                //dffd ExternalHelper::solveODCostMatrix($updateModel->longitude, $updateModel->latitude,  $getScenarioId[0]['p_scenario_id'], 5000 );

            }

            return response()->json([
                'success'   => true,
                'scenario'  => (array) $createScenario
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFormDataByKey(Request $request){

        try {

            $validator = Validator::make($request->all(), [
                'formId'    => 'required',
                'ref1'      => 'required',
                'pkField'   => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            self::getActiveModel($request->formId);

            return response()->json([
                'success'   => true,
                'data'  =>  $this->whichModel->where($request->pkField,'=',$request->ref1)->first()
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getForm(Request $request)
    {

        try {

            $validator = Validator::make( $request->all(),[
                'form_id' => 'required',
            ]);

            if($validator->fails()){
                return response()->json( $validator->errors() );
            }

            $getFormAndRelations = AppForm::where( 'form_id', $request->form_id )
                ->where('for_admin', false)
                ->with('formAttr.appClassAttr')
                ->get();

            return response()->json([
                'success' => true,
                'data'    => $getFormAndRelations
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllForms(Request $request)
    {

        try {

            $getAllForms = AppForm::where('for_admin', false)
                ->where('is_active', true)
                ->orderBy('form_name', 'ASC')
                ->get();

            return response()->json([
                'success' => true,
                'data'    => $getAllForms
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFacilityById(Request $request)
    {

        try {

            $validator = Validator::make( $request->all(),[
                'facilityId' => 'required',
            ]);

            if($validator->fails()){
                return response()->json( $validator->errors() );
            }

            $getHipsFacilityRequest = HipsFacilityRequestDynamic::where( 'facility_id', $request->facilityId )
                ->first();

            return response()->json([
                'success' => true,
                'data'    => $getHipsFacilityRequest
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Throwable $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getScenarioWfById(Request $request)
    {

        try {

            $validator = Validator::make( $request->all(),[
                'scenarioWfId' => 'required',
            ]);

            if($validator->fails()){
                return response()->json( $validator->errors() );
            }

            return response()->json([
                'success' => true,
                'data'    => HipsScenarioWf::where( 'scenario_wf_id', $request->scenarioWfId )
                            //->with('appWfInstance.status', 'getFacility')
                            ->with('user')
                            ->first()
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFacilityRequestById(Request $request)
    {

        try {

            $validator = Validator::make( $request->all(),[
                'facilityRequestId' => 'required',
            ]);

            if($validator->fails()){
                return response()->json( $validator->errors() );
            }

            $getHipsFacilityRequest = HipsFacilityRequestDynamic::where( 'facility_request_id', $request->facilityRequestId )
                ->with('appWfInstance.status', 'getFacility')
                ->with('user')
                ->first();

            return response()->json([
                'success' => true,
                'data'    => $getHipsFacilityRequest
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateToken( Request $request ){

        $informationUser = array(
            'userid' => '{992f833c-ba5d-437d-b314-7676f4d2d990}',
            'expiry' => Carbon::now('UTC')->addMinutes( 240 )->format('Y-m-d H:i:s')
        );

        $sendUserSecure = AuthController::encryptWithData( $informationUser );

        return response()->json([
            'success' => true,
            'token'   => $sendUserSecure,
            'wf_id'  => '0181f20e-3abd-4cd3-8466-75ead569261d',
            'hips_facility_request_id' => '14'
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function test(Request $request){

        return response()->json([
            'success' => true
        ]);

    }

}