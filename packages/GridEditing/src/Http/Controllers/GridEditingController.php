<?php

namespace Hip\GridEditing\Http\Controllers;

use App\Events\EventHistory;
use App\Http\Controllers\Controller;
use App\Models\AppClass;
use App\Models\AppClassAttribute;
use App\Models\AppGrid;
use App\Models\AppGridAttributes;
use App\Models\AppGridType;
use App\Models\AppDataSource;
use App\Models\MasterData\FormGenerator\AppForm;
use App\Models\MasterData\HipsHealthFacility;
use App\Models\MasterData\HipsHealthFacilityType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Str;
use Validator;
use Enforcer;

use PDF;
use Illuminate\Container\Container;

class GridEditingController extends Controller
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
        if($class_schema == 'master_data'){
            $file_path = '/var/www/html/packages/GridEditing/src/Http/Controllers/dynamic_class_template.txt';
        }else if($class_schema == 'master_uamp'){
            $file_path = '/var/www/html/packages/GridEditing/src/Http/Controllers/dynamic_class_template_uamp.txt';
        }else{
            $file_path = '/var/www/html/packages/GridEditing/src/Http/Controllers/dynamic_class_template_app.txt';
        }

        $dynamic_file_path = '/var/www/html/app/Models/MasterData/GridEditing/' . $className . 'Dynamic';

        $contents = scandir('/var/www/html/app/Models/MasterData/GridEditing');

        if (in_array($className . 'Dynamic.php', $contents))
            return 'App\\Models\\MasterData\\GridEditing\\' . $className . 'Dynamic';

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
        return 'App\\Models\\MasterData\\GridEditing\\' . $className . 'Dynamic';

    }

    /**
     * @param $request
     */
    public function getActiveModel($request)
    {

        if (!$request->gridId)
            return;

        $gridId = AppGrid::select(
            'class_name',
            'pk_field_name',
            'class_schema',
            'app_grid.*')
            ->leftJoin(
                'master_app.app_class',
                'master_app.app_class.class_id',
                '=',
                'master_app.app_grid.class_id')
            ->where('grid_id', json_decode($request->gridId))->first();

        $className = str_replace('_', '', ucwords($gridId->class_name, '_\/'));

        //This needs to access the requests to dynamically assign the className, table, primaryKey and fillable from the gridId
        $table = $gridId->class_name;
        $primaryKey = $gridId->pk_field_name;

        $getTheApp = $this->createDynamicModel($className, $table, $primaryKey, $gridId->class_schema);

        $this->whichModel = app($getTheApp);

        return $gridId;

    }

    public function getDataSources(Request $request){

        try{

            return response()->json([
                'success' => true,
                'data' => AppDataSource::get()
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
                'message' => $e->getMessage()
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
                'message' => $e->getMessage()
            ]);

        }

    }

    /**
     * Display a listing of the resource.
     *10.10.3
     * @return Response
     */
    public function index(Request $request)
    {

        try {

            $getAppClassAtrributeAppClass = self::getActiveModel($request);

            $filterQuery = null;

            //  GET THE GRID INFORMATION
            $getGrid = AppGrid::find(json_decode($request->gridId));

            if($getGrid)
                $filterQuery = $getGrid->filter_query;

            //  --------------------
            //  --------------------    SORTING
            //  --------------------
            $sorting = '';
            $sorting_beds = [];
            $sorting_munipalities_district = [];
            $sorting_municipality_local = [];
            $sorting_province = [];
            $sorting_district = [];
            $group = [];

            //  --------------------
            //  --------------------    SORTING
            //  --------------------
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

            if ($getAppClassAtrributeAppClass) {
                //  --------------------    RUN IF HIPS FACILITY
                if ($getAppClassAtrributeAppClass->class_name == 'hips_facility') {
                    $filters = array(
                        array('facility_name', '!=', ''),
                        array('facility_status_id', '=', '1')
                    );
                }
            }

            if ($request->get('filter')) {

                $convertToArray = json_decode($request->get('filter'));

                foreach ($convertToArray as &$value) {

                    if (is_array($value)) {

                        if ($value != 'and') {

                            if (is_string($value[0])) {

                                switch ($value[1]) {
                                    case 'contains':
                                        array_push($filters, [
                                            $value[0], 'ILIKE', '%' . $value[2] . '%'
                                        ]);
                                        break;
                                    case '=':

                                        if (!Str::isUuid($value[2])) {
                                            array_push($filters, [
                                                $getAppClassAtrributeAppClass->class_name . '.' . $value[0], '=', $value[2]
                                            ]);
                                        }
                                        break;
                                    default:

                                }

                            }

                        }

                    } else {

                        if (is_string($convertToArray[0])) {

                            switch ($convertToArray[1]) {
                                case 'contains':
                                    array_push($filters, [
                                        $convertToArray[0], 'ILIKE', '%' . $convertToArray[2] . '%'
                                    ]);
                                    break;
                                case '=':
                                    if (!Str::isUuid($convertToArray[2])) {
                                        array_push($filters, [
                                            $getAppClassAtrributeAppClass->class_name . '.' . $convertToArray[0], '=', $convertToArray[2]
                                        ]);
                                    }
                                    break;

                            }

                        }

                    }

                }

            }

            //  --------------------
            //  --------------------    GROUPING
            //  --------------------
            if ($request->get('group')) {

                $GroupResponse = [];

                $convertToArrayGroup = json_decode($request->get('group'));

                $groupBuilding = (object)[];

                $totalGroup = 0;

                foreach ($convertToArrayGroup as $key => $v) {

                    //  BUILD THE GROUPS
                    $items = [];

                    if ($key == 0) {

                        $getGroupedBy = $this->whichModel
                            ->select($v->selector, DB::raw('count(*) as total'))
                            ->where($filters)
                            //  WHEN GRID HAS FILTER QUERY
                            ->when($filterQuery, function ( $query ) use($filterQuery, $getAppClassAtrributeAppClass){

                                //  --------------- GET THE CLASS NAME
                                $getClassName = AppClass::find($getAppClassAtrributeAppClass->class_id);

                                return $query
                                    ->whereRaw( $getClassName->class_name.'.'.$filterQuery);

                            })
                            ->orderBy($v->selector, ($v->desc) ? 'DESC' : 'ASC') ;

                        //  BUILD THE GROUPS
                        foreach ($getGroupedBy->groupBy($v->selector)->get() as &$vGroup) {

                            if ($key == 0) {

                                if ($vGroup[$v->selector]) {

                                    array_push($items, array(
                                        'key' => $vGroup[$v->selector],
                                        'table_column' => $v->selector,
                                        'items' => null,
                                        'count' => $vGroup['total'],
                                        'summary' => [$vGroup['total']]
                                    ));

                                }

                            }

                        }

                        $keyName = 'key' . $key;

                        $groupBuilding->$keyName = $items;

                    } else {

                        $keyName = 'key' . $key - 1;

                        //  GET THE PREVIOUS
                        $get_previous_values = $groupBuilding->$keyName;

                        $itemsNew = [];

                        foreach ($get_previous_values as $k => &$vGroupNested) {

                            $getGroupedByNested = $this->whichModel
                                ->select($v->selector, DB::raw('count(*) as total'))
                                ->orderBy($v->selector, ($v->desc) ? 'DESC' : 'ASC')
                                ->where($vGroupNested['table_column'], $vGroupNested['key'])
                                ->where($filters)
                                ->when($filterQuery, function ( $query ) use($filterQuery, $getAppClassAtrributeAppClass){

                                    //  --------------- GET THE CLASS NAME
                                    $getClassName = AppClass::find($getAppClassAtrributeAppClass->class_id);

                                    return $query
                                        ->whereRaw( $getClassName->class_name.'.'.$filterQuery);

                                });

                            //  BUILD THE GROUPS
                            foreach ($getGroupedByNested->groupBy($v->selector)->get() as &$vGroupInner) {

                                array_push($itemsNew, array(
                                    'key' => $vGroupInner[$v->selector],
                                    'table_column' => $v->selector,
                                    $vGroupNested['table_column'] => $vGroupNested['key'],
                                    'items' => null,
                                    'count' => $vGroupInner['total'],
                                    'summary' => [$vGroupInner['total']]
                                ));

                            }

                            //$groupBuilding->$keyName[$k]['items'] = $itemsNew;

                            $keyName = 'key' . $key;

                            $groupBuilding->$keyName = $itemsNew;

                        }

                    }

                }

                $tempArray = [];

                $i = count(array_keys((array)$groupBuilding)) - 1;

                //  WE ONLY HAVE ONE GROUP
                if ($i == 0) {

                    $whatKey = 'key' . $i;

                    $giveBackOne = $groupBuilding->$whatKey;

                    $GroupResponse = $giveBackOne;

                } else {

                    while ($i >= 0) {

                        if ($i == count(array_keys((array)$groupBuilding)) - 1) {

                            $whatKey = 'key' . $i;

                            $tempArray = $groupBuilding->$whatKey;

                        } else if ($i != 0) {

                            $whatKey = 'key' . $i;

                            $listArray = [];

                            foreach ($groupBuilding->$whatKey as $k => $valueDynamic) {

                                $sArray = [];

                                //print_r($valueDynamic['table_column']);

                                foreach ($tempArray as $kTempIn => $valueTempIn) {

                                    if ($valueDynamic['key'] === $valueTempIn[$valueDynamic['table_column']]) {

                                        //  GET COUNT
//                                    $getCount = $this->whichModel->select($v->selector)
//                                        ->orderBy($v->selector, ($v->desc) ? 'DESC' : 'ASC')
//                                        ->where($valueTempIn['table_column'], $valueTempIn['key'])
//                                        ->count();
//
//                                    $valueTempIn['count'] = $getCount;
//                                    $valueTempIn['summary'] = [$getCount];

                                        array_push($sArray, $valueTempIn);

                                    }

                                }

                                $valueDynamic['items'] = $sArray;

                                array_push($listArray, $valueDynamic);

                            }

                            $tempArray = $listArray;

                        } else {

                            $whatKey = 'key' . $i;

                            $listArray = [];

                            foreach ($groupBuilding->$whatKey as $k => $valueDynamic) {

                                $sArray = [];

                                foreach ($tempArray as $kTemp => $valueTemp) {

                                    if ($valueDynamic['key'] == $valueTemp[$valueDynamic['table_column']]) {

                                        //  GET COUNT
//                                    $getCount = $this->whichModel->select($v->selector)
//                                        ->orderBy($v->selector, ($v->desc) ? 'DESC' : 'ASC')
//                                        ->where($valueTemp['table_column'], $valueTemp['key'])
//                                        ->count();
//
//                                    $valueTemp['count'] = $getCount;
//                                    $valueTemp['summary'] = [$getCount];

                                        array_push($sArray, $valueTemp);

                                    }

                                }

                                $valueDynamic['items'] = $sArray;

                                array_push($listArray, $valueDynamic);

                            }

                            $GroupResponse = $listArray;

                        }

                        $i--;

                    }

                }

                return response()->json([
                    'success' => true,
                    'data' => $GroupResponse,
                    'totalCount' => count($GroupResponse),
                    'groupCount' => [count($GroupResponse)]
                ]);

            }

            //Determine the controller that must be run
            if (!$request->gridId)
                return response()->json([
                    'success' => true,
                    'data' => [],
                    'totalCount' => 0,
                    'summary' => [],
                    'groupCount' => []
                ]);

            $getDisplayColumns = [$getAppClassAtrributeAppClass->class_name . '.*'];

            $getAllJoins = null;

            if ($getAppClassAtrributeAppClass) {

                $getAllJoins = AppClassAttribute::where('class_id', $getAppClassAtrributeAppClass->class_id)
                    ->whereNotNull('lk_table')->get();

                //  --------------------
                //  --------------------    RUN ONLY IF LOOKUP
                //  --------------------
                if ($getAllJoins) {

                    foreach ($getAllJoins as &$v) {

                        array_push($getDisplayColumns, $v['lk_display']);

                    }

                }

            }

            //  --------------------
            //  --------------------    GET ALL
            //  --------------------
            $getFacilities = $this->whichModel->select($getDisplayColumns);

            if ($getAllJoins) {

                foreach ($getAllJoins as &$val) {

                    $getFacilities
                        ->leftJoin(
                            $val['lk_schema'] . '.' . $val['lk_table'],
                            $val['lk_schema'] . '.' . $val['lk_table'] . '.' . $val['lk_join'],
                            '=',
                            $getAppClassAtrributeAppClass->class_name . '.' . $val['field_name']);

                }

            }

            if ($getAppClassAtrributeAppClass) {
                //  --------------------    RUN IF HIPS FACILITY
                if ($getAppClassAtrributeAppClass->class_name == 'hips_facility') {

                    $getFacilities->with('facilityLink.facilityType.facilityTypeCategory');

                }
            }

            $getFacilities->when($sorting, function ($query) use ($sorting) {

                if ($sorting != '') {
                    return $query->orderByRaw($sorting);
                }

            })
                ->when($sorting_province, function ($query) use ($sorting_province) {

                    //  SORT BY PROVINCE
                    if ($sorting_province) {

                        return $query
                            ->orderBy(
                                'pr_name', $sorting_province[0]['sortBy']
                            );

                    }

                })
                ->when($sorting_munipalities_district, function ($query) use ($sorting_munipalities_district) {

                    //  SORT BY DISTRICT MUNICIPALITY
                    if ($sorting_munipalities_district) {

                        return $query
                            ->orderBy(
                                'district_1', $sorting_munipalities_district[0]['sortBy']
                            );

                    }

                })
                //  WHEN GRID HAS FILTER QUERY
                ->when($filterQuery, function ( $query ) use($filterQuery, $getAppClassAtrributeAppClass){

                    //  --------------- GET THE CLASS NAME
                    $getClassName = AppClass::find($getAppClassAtrributeAppClass->class_id);

                    return $query
                        ->whereRaw( $getClassName->class_name.'.'.$filterQuery );

                })
                ->where( $filters )
                ->when($request->extent, function ($query) use ($sorting, $request) {

                    return $query
                        ->whereRaw("public.ST_INTERSECTS( hips_facility.shape, public.ST_TRANSFORM( public.ST_GeomFromGeoJSON('{
                    \"type\":\"Polygon\",
                    \"coordinates\":  [" . json_decode($request->extent, true) . "],
                    \"crs\":{\"type\":\"name\",\"properties\":{\"name\":\"EPSG:4326\"}}
                }'),4326))");

                });

            $getFacilitiesCount = $getFacilities->count();

            $getFacilitiesQuery = $getFacilities->skip($request->skip)
                ->take($request->take)
                ->get();

            return response()->json([
                'success' => true,
                'data' => $getFacilitiesQuery,
                'totalCount' => $getFacilitiesCount,
                'summary' => [],
                'groupCount' => [],
                'orderBy' => $sorting,
                'filterBy' => $filterQuery
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
                'message' => $e->getMessage()
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
                'message' => $e->getMessage()
            ]);

        }

    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        try{

            $validator = Validator::make($request->all(), [
                'gridId' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $getGridData = self::getActiveModel($request);

            $getDataType = AppClassAttribute::where('class_id', $getGridData->class_id)
                ->where('field_name', $getGridData->pk_field_name)
                ->first();

            $getRequest = $request->except('gridId');

            if ($getDataType->data_type != 'integer') {

                $getRequest[$getGridData->pk_field_name] = Str::uuid()->toString();

            }

            $this->whichModel->create($getRequest);

            return response()->json([
                'success' => true,
                'request' => $getRequest
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
                'message' => $e->getMessage()
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
                'message' => $e->getMessage()
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
    public function update($id, Request $request)
    {

        try{

            if (!$id)
                return response()->json([
                    'success' => false,
                    'message' => 'No facility chosen.'
                ]);

            $getRequest = $request->except('gridId');
            // $getRequest['sec_user_id'] = auth('sanctum')->user()->sec_user_id;

            //Determine the controller that must be run
            $getAppClassAtrributeAppClass = self::getActiveModel($request);

            $getFacility = $this->whichModel->where($getAppClassAtrributeAppClass->pk_field_name, $id)->first();
            $getFacility->update($getRequest);
            $getFacility->save();

            return response()->json([
                'success' => true,
                'facility' => $getRequest
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
                'message' => $e->getMessage()
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
                'message' => $e->getMessage()
            ]);

        }

    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, Request $request)
    {

        try{

            //Determine the controller that must be run
            $getAppClassAtrributeAppClass = self::getActiveModel($request);

            $getFacility = $this->whichModel->where($getAppClassAtrributeAppClass->pk_field_name, $id)->first();

            if($request->frontGrid){
                $getFacility->delete();
            }else{
                $getFacility->where('attribute_id', $id)->delete();
            }

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
                'message' => $e->getMessage()
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
                'message' => $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFacilityType(Request $request)
    {

        try{

            if( $request->facility_cat_code && $request->facility_cat_code != 'undefined' ){

                //  --------    FACILITY TYPE
                $facilityTypesMeta = HipsHealthFacilityType::where('is_relevant', 1)
                    ->where('facility_cat_code', $request->facility_cat_code)
                    ->orderBy('facility_type', 'DESC')
                    ->get();

            }else{

                //  --------    FACILITY TYPE
                $facilityTypesMeta = HipsHealthFacilityType::where('is_relevant', 1)
                    ->whereIn('facility_cat_code', ['Hospital', 'PHC'])
                    ->orderBy('facility_type', 'DESC')
                    ->get();

            }

            return response()->json([
                'success' => true,
                'data' => $facilityTypesMeta
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
                'message' => $e->getMessage()
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
                'message' => $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllMetaDataTypesFromLookups(Request $request)
    {

        try {

            $allMeta = array();

            $getGridAttributes = AppGridAttributes::
            select(
                'lk_table',
                'lk_join',
                'lk_display',
                'lk_schema',
                'filter_query',
                'app_grid_attributes.*'
            )
                ->leftJoin(
                    'master_app.app_class_attribute',
                    'master_app.app_class_attribute.attribute_id',
                    '=',
                    'app_grid_attributes.attribute_id')
                ->leftJoin(
                    'master_app.app_grid',
                    'master_app.app_grid.grid_id',
                    '=',
                    'app_grid_attributes.grid_id')
                ->whereNotNull('app_grid_attributes.get_lookup')
                ->where('app_grid_attributes.grid_id', $request->gridId)
                ->orderBy('sort_order', 'ASC')
                ->get();

            $errors = [];

            //  --------    LOOP THROUGH
            foreach ($getGridAttributes as &$v) {

                if ($v->get_lookup) {

                    if (!array_key_exists($v->lk_table, $allMeta)) {

                        $getConcat = $v->lk_schema . '.' . $v->lk_table;

                        if ($v->lk_schema && $v->lk_table) {

                            try{

                                if($v->filter_query){

                                    $types = DB::select('SELECT '. $v->lk_join .', '. $v->lk_display .' FROM ' . $getConcat .' WHERE ' . $v->filter_query );

                                }else{

                                    $types = DB::select('SELECT '. $v->lk_join .', '. $v->lk_display .' FROM ' . $getConcat  );

                                }

                            }catch (\Illuminate\Database\QueryException $e) {

                                array_push( $errors , array( 'location' => $getConcat, 'error' => $e->getMessage() ));

                                //  ------- GET ALL AS THERE IS NO COLUMN
                                $types = DB::select('SELECT '. $v->lk_join .', '. $v->lk_display .' FROM ' . $getConcat );

                            }

                            $allMeta[$v->lk_table] = $types;

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
                'email'     => auth('sanctum')->user()->email,
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
                'email'     => auth('sanctum')->user()->email,
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
    public function getMunicipalities(Request $request)
    {

        try{

            //  --------    FACILITY TYPE
            $facilityMunicipality = HipsDistrictMunicapalities::select(['id', 'province', 'district', 'district_n'])
                ->orderBy('district_n', 'ASC')->get();

            return response()->json([
                'success' => true,
                'data' => $facilityMunicipality,
                'totalCount' => count($facilityMunicipality)
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
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
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
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getGridTypeEditing(Request $request)
    {

        try{

            $getGridTypeEditing = AppGridType::select('grid_type_id', 'type_code')->get();

            return response()->json([
                'success' => true,
                'data' => $getGridTypeEditing,
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
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
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
    public function updateFacilityCoordinates(Request $request)
    {

        try{

            $validator = Validator::make($request->all(), [
                'latitude' => 'required',
                'longitude' => 'required',
                'facility_id' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $facility = HipsHealthFacility::find($request->facility_id);
            $facility->latitude = $request->latitude;
            $facility->longitude = $request->longitude;
            $facility->save();

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
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
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
    public function getGridItems(Request $request)
    {

        try{

            //$gridsAllowed = AppGrid::orderBy('grid_name', 'ASC')->get();

            $gridsAllowed = DB::connection('pgsqlMasterApp')
                ->select("select * from app_grid_by_user('".auth('sanctum')->user()->sec_user_id."')");

            return response()->json([
                'success' => true,
                'data' => $gridsAllowed
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
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
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
    public function getGridItemsBeds(Request $request)
    {

        try{

            $getGridItemsBeds = AppGrid::get();

            return response()->json([
                'success' => true,
                'data' => $getGridItemsBeds
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
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
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
    public function getGridItemsMaintenance(Request $request)
    {

        try{

            $getGridItemsMaintenance = AppGrid::get();

            return response()->json([
                'success' => true,
                'data' => $getGridItemsMaintenance
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
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
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
    public function getGridAttributes(Request $request)
    {

        try{

            $validator = Validator::make($request->all(), [
                'gridId' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            //  --------------- GET CLASS
            $getAppClassFromGrid = AppGrid::find($request->gridId);

            $getAppClass = AppClass::find($getAppClassFromGrid->class_id);

            $getGridAttributes = AppGridAttributes::where('grid_id', $request->gridId)
                ->select(
                    'field_name',
                    'master_app.app_class_attribute.display_name',
                    'data_type',
                    'lk_table',
                    'lk_join',
                    'lk_display',
                    'lk_schema',
                    'field_order',
                    'numeric_precision',
                    'app_grid_attributes.*'
                )
                ->leftJoin(
                    'master_app.app_class_attribute',
                    'master_app.app_class_attribute.attribute_id',
                    '=',
                    'app_grid_attributes.attribute_id')
                ->orderBy('sort_order', 'ASC')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $getGridAttributes,
                'allow_insert' => $getAppClassFromGrid->allow_insert,
                'allow_delete' => $getAppClassFromGrid->allow_delete,
                'appClass' => $getAppClass,
                'grid' => $getAppClassFromGrid->grid_type_id
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
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
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
    public function getGridAttributeFromClassAttribute(Request $request)
    {

        try{

            $validator = Validator::make($request->all(), [
                'classId' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            //  --------------- GET CLASS ATTRIBUTE
            $getAppClassAttributes = AppClassAttribute::select('attribute_id', 'display_name')
                ->where('class_id', $request->classId)
                ->get();


            return response()->json([
                'success' => true,
                'data' => $getAppClassAttributes
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
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
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
    public function getAllClasses(Request $request)
    {

        try{

            //  --------------- GET CLASSES
            $getAppClass = AppClass::select('class_id', 'display_name')->get();

            return response()->json([
                'success' => true,
                'data' => $getAppClass
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
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);

        }

    }

    public function getAllClassAttributesByClassId(Request $request){

        try{

            return response()->json([
                'success' => true,
                'data' => AppClassAttribute::get()
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
                'error' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
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
     * TEST
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridTest(Request $request)
    {

        return response()->json([
            'success' => true
        ]);

    }

}