<?php

namespace Hip\GridEditing\Http\Controllers;

use App\Events\EventHistory;
use App\Helpers\ExternalHelper;
use App\Http\Controllers\Controller;
use App\Models\AppClass;
use App\Models\AppClassAttribute;
use App\Models\AppDataSource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
use Enforcer;

class GridAppClassController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        try {

            //  --------------------
            //  --------------------    SORTING
            //  --------------------
            $sorting = '';

            if ($request->get('sort')) {

                $convertToArraySort = json_decode($request->get('sort'));

                foreach ($convertToArraySort as &$v) {

                    $check = ($v->desc) ? 'DESC' : 'ASC';

                    $concat = $v->selector . ' ' . $check;

                    if ($sorting == '') {
                        $sorting .= $concat;
                    } else {
                        $sorting .= ',' . $concat;
                    }

                }

            }

            //  --------------------
            //  --------------------    FILTERS, default always has the facility name  not being null
            //  --------------------
            $filters = array();

            if ($request->get('filter')) {

                $convertToArray = json_decode($request->get('filter'));

                foreach ($convertToArray as &$value) {

                    if (is_array($value)) {

                        if ($value != 'and') {

                            if(is_string($value[0])){

                                switch ($value[1]) {
                                    case 'contains':
                                        array_push($filters, [
                                            $value[0], 'ILIKE', '%' . $value[2] . '%'
                                        ]);
                                        break;
                                    case '=':

                                        if(!Str::isUuid($value[2])){
                                            array_push($filters, [
                                                $value[0], '=', $value[2]
                                            ]);
                                        }
                                        break;
                                    default:

                                }

                            }

                        }

                    } else {

                        if ($value != 'and' ) {

                            if(is_string($value[0])){

                                switch ($convertToArray[1]) {
                                    case 'contains':
                                        array_push($filters, [
                                            $convertToArray[0], 'ILIKE', '%' . $convertToArray[2] . '%'
                                        ]);
                                        break;
                                    case '=':
                                        if(!Str::isUuid($convertToArray[2])){
                                            array_push($filters, [
                                                $convertToArray[0], '=', $convertToArray[2]
                                            ]);
                                        }
                                        break;

                                }

                            }

                        }

                    }

                }

            };

            $getAppClass = AppClass::when($sorting, function ($query) use ($sorting) {

                if ($sorting != '') {
                    return $query->orderByRaw($sorting);
                }

            })
                ->where($filters);

            $getCount = $getAppClass->count();

            $getAppClass = $getAppClass->skip($request->skip)
                ->take($request->take)
                ->get();

            return response()->json([
                'success'       => true,
                'data'          => $getAppClass,
                'totalCount'    => $getCount,
                'summary'       => [],
                'groupCount'    => [],
                'orderBy'       => $sorting
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
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
                'email'     => auth('sanctum')->user()->email,
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
    //  --------------------    CREATE
    //  --------------------
    public function create(Request $request)
    {

        return response()->json([
            'success' => true
        ]);

    }

    //  --------------------
    //  --------------------    STORE
    //  --------------------
    public function store(Request $request)
    {
       
            try {

                $validator = Validator::make($request->all(), [
                    'class_id' => 'required',
                    'class_type' => 'required',
                    'class_schema' => 'required',
                    'class_name' => 'required',
                    'display_name' => 'required',
                    'pk_field_name' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json($validator->errors());
                }

                // Get Data Source
                $appDataSource = AppDataSource::find($request->data_source_id);

                if (!$appDataSource) {
                    return response()->json([
                        'success' => false,
                        'data' => 'No data source found.'
                    ]);
                }

                $tableSchemaInfo = ExternalHelper::getTableSchema($request->class_name, $appDataSource->connect_string);

                if (!$tableSchemaInfo) {
                    return response()->json([
                        'success' => false,
                        'data' => 'No table found with information on schema. Please check your details placed.'
                    ]);
                }

                // Start the transaction
                $appClassAttributes = DB::transaction(function () use ($request, $tableSchemaInfo) {
                    
                    // CREATE THE CLASS
                    $appClass = AppClass::create($request->all());

                    $appClassAttributes = [];

                    // CREATE THE CLASS ATTRIBUTES
                    foreach ($tableSchemaInfo as $schemaDetails) {
                        // Assuming $schemaDetails is an object
                        $attr = new AppClassAttribute();
                        $attr->class_id = $appClass->class_id;
                        $attr->field_name = $schemaDetails->COLUMN_NAME;
                        $attr->display_name = $schemaDetails->COLUMN_NAME;
                        $attr->data_type = $schemaDetails->DATA_TYPE;
                        $attr->udt_name = $schemaDetails->UDT_NAME ?? null; // Ensure UDT_NAME is handled properly
                        $attr->field_order = $schemaDetails->ORDINAL_POSITION;
                        $attr->numeric_precision = $schemaDetails->NUMERIC_PRECISION;
                        $attr->numeric_scale = $schemaDetails->NUMERIC_SCALE;
                        $attr->is_generated = $schemaDetails->IS_GENERATED ?? null; // Ensure IS_GENERATED is handled properly
                        $attr->save();
                        
                        // Collect attributes for response if needed
                        $appClassAttributes[] = $attr;
                    }

                    return $appClassAttributes;
                });

                // Run the Procedure to Create the Class Attributes
                // Uncomment and adjust if needed
                // DB::connection('pgsqlMasterApp')
                //     ->select("CALL generate_class_attributes(?)", [$request->class_id]);

                return response()->json([
                    'success' => true,
                    'data' => $appClassAttributes
                ]);

            } catch (\Illuminate\Database\QueryException $e) {
                // Log to DB
                event(new EventHistory([
                    'email' => auth('sanctum')->user()->email,
                    'url' => $request->fullUrl(),
                    'error' => $e->getMessage()
                ], 'API_ENDPOINT_ERROR'));

                // Rollback is automatic when using DB::transaction()
                return response()->json([
                    'success' => false,
                    'error' => $e->getMessage()
                ]);

            } catch (\Exception $e) {
                // Log to DB
                event(new EventHistory([
                    'email' => auth('sanctum')->user()->email,
                    'url' => $request->fullUrl(),
                    'error' => $e->getMessage()
                ], 'API_ENDPOINT_ERROR'));

                // Rollback is automatic when using DB::transaction()
                return response()->json([
                    'success' => false,
                    'error' => $e->getMessage()
                ]);
            }
        
    }


    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request){

        try {

            if (!$id)
                return response()->json([
                    'success' => false,
                    'message' => 'No App class chosen.'
                ]);

            $getRequest = $request->all();
            //$getRequest['sec_user_id'] = auth('sanctum')->user()->sec_user_id;

            // Determine the controller that must be run
            $getFacility = AppClass::where( 'class_id', $id )->first();
            $getFacility->update($getRequest);
            $getFacility->save();

            return response()->json([
                'success' => true
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'error'     => $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'error'     => $e->getMessage()
            ]);

        }

    }

    /**
     * @param $id
     */
    public function destroy($id)
    {

    }

}