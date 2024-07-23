<?php

namespace Hip\GridEditing\Http\Controllers;

use App\Events\EventHistory;
use App\Helpers\ExternalHelper;
use App\Http\Controllers\Controller;
use App\Models\AppClass;
use App\Models\AppGridAttributes;
use App\Models\AppVersion;
use App\Models\MasterData\FormGenerator\HipsFacilityRequestDynamic;
use App\Models\MasterData\HipsScenario;
use App\Models\MasterData\Views\HipsScenarioEaCurrentVw;
use App\Models\MasterData\Views\HipsScenarioFacilityVw;
use App\Models\SecRoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
use Enforcer;

class GridScenarioPlanningController extends Controller
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

            $filtersOwner = array();

            if ($request->get('filter')) {

                $convertToArray = json_decode($request->get('filter'));

                foreach ($convertToArray as &$value) {

                    if (is_array($value)) {

                        if ($value != 'and' && $value[0] != 'owner_sec_user_id') {

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

                        if ($value[0] == 'owner_sec_user_id') {

                            array_push($filtersOwner, $value[2]);

                        }

                    } else {

                        if ($value != 'and' && $convertToArray[0] != 'owner_sec_user_id' ) {

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

                        if ( $convertToArray[0] == 'owner_sec_user_id') {

                            array_push($filtersOwner, $convertToArray[2]);

                        }

                    }

                }

            };

            $getAppAttribute = HipsScenarioFacilityVw::when($sorting, function ($query) use ($sorting) {

                if ($sorting != '') {
                    return $query->orderByRaw($sorting);
                }

            });

            $getAppAttribute = $getAppAttribute->skip($request->skip)
                //->where('owner_sec_user_id', auth('sanctum')->user()->sec_user_id)
                ->where( $filters )
                ->whereIn('owner_sec_user_id', function ($query) use ($filtersOwner) {

                    if( count($filtersOwner) > 0){
                         $query->select(['sec_user_id'])
                            ->from('master_app.sec_user')
                            ->where('first_name', 'ILIKE',  '%' . $filtersOwner[0] . '%')
                            ->orWhere('last_name', 'ILIKE',  '%' . $filtersOwner[0] . '%');
                    }else{
                        $query->select(['sec_user_id'])
                            ->from('master_app.sec_user');
                    }

                })
                ->where('scenario_stage_id', 3)
                ->where('is_request_facility', true)
                ->with('facilityRequest.user', 'facilityRequest.facilityType', 'facilityRequest.clinicCategory', 'owner')
                ->orderBy('date_created', 'DESC')
                ->take($request->take)
                ->get();

            return response()->json([
                'success'       => true,
                'data'          => $getAppAttribute,
                'totalCount'    => $getAppAttribute->count(),
                'summary'       => [],
                'groupCount'    => [],
                'orderBy'       => $sorting,
                '$filtersOwner' => $filtersOwner
            ]);

        }catch (\Illuminate\Database\QueryException $e){

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Exception $e){

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
            'success' => true,
            'data'    => 'disabled'
        ]);

    }

    //  --------------------
    //  --------------------    STORE
    //  --------------------
    public function store(Request $request)
    {

        return response()->json([
            'success' => true,
            'data'    => 'disabled'
        ]);

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

        return response()->json([
            'success' => true,
            'data'    => 'disabled'
        ]);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        return response()->json([
            'success' => true,
            'data'    => 'disabled'
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function getScenario( Request $request ){

        try {

            $validator = Validator::make($request->all(), [
                'scenario_id' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $getScenario = HipsScenarioFacilityVw::where( 'scenario_id', $request->scenario_id )
                ->with(
                    'facilityRequest.user',
                    'facilityRequest.facilityType',
                    'facilityRequest.clinicCategory',
                    'facilityRequest.appWfInstance.status',
                    'facilityRequest.getForm',
                    'getFacility',
                    'getScenario'
             )->where('is_request_facility', true)->first();

            return response()->json([
                'success' => true,
                'data'    => $getScenario
            ]);

        }catch (\Illuminate\Database\QueryException $e){

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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getScenarioPlain( Request $request ){

        try {

            $validator = Validator::make($request->all(), [
                'scenario_id' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $getScenario = HipsScenario::where( 'scenario_id', $request->scenario_id )
                ->first();

            return response()->json([
                'success' => true,
                'data'    => $getScenario
            ]);

        }catch (\Illuminate\Database\QueryException $e){

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

}