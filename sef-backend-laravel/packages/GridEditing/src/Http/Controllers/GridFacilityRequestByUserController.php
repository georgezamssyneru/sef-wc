<?php

namespace Hip\GridEditing\Http\Controllers;

use App\Events\EventHistory;
use App\Helpers\ExternalHelper;
use App\Http\Controllers\Controller;
use App\Models\AppClass;
use App\Models\AppGridAttributes;
use App\Models\AppVersion;
use App\Models\MasterData\FormGenerator\HipsFacilityRequestDynamic;
use App\Models\SecRoleUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
use Enforcer;

class GridFacilityRequestByUserController extends Controller
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

            $getAppAttribute = HipsFacilityRequestDynamic::when($sorting, function ($query) use ($sorting) {

                if ($sorting != '') {
                    return $query->orderByRaw($sorting);
                }

            });

            $getCount = $getAppAttribute->count();

            $provincesByUser = array();

            //  ----------------    GET ALL USERS WITH PLANNER ROLES
            $users = array();

            //  ----------------    GET UNIQUE USERS
            $getUsers = array();

            $rolesByUser = array();

            //  ----------------    GET ALL PERMISSIONS BY USER
            $allRolesByUser = DB::table('sec_role_user')
                ->where('user_id', auth('sanctum')->user()->sec_user_id)
                ->pluck('role_id')
                ->toArray();

            //  ----------------    GO THROUGH ALL PERMISSIONS AND CHECK IF IN PLANNING
            foreach($allRolesByUser as $r){

                //  ----------------    GET USER ROLES FOR PLANNING
                $getRole = ExternalHelper::plannersByProvince( $r );

                if( $getRole != false )
                    array_push( $provincesByUser, $getRole);


            }

            //  --------------- GET ALL USERS IN PROVINCES WITH ROLES
            if( count($provincesByUser) > 0 ){
                //  ----------------    FIND USERS
                $users = DB::connection('pgsqlMasterData')->table('hips_facility_request')
                    ->whereIn( 'province_id', $provincesByUser )
                    ->pluck('sec_user_id')->toArray();
            }

            $getUsers = array_unique($users);

            array_push( $getUsers, auth('sanctum')->user()->sec_user_id );

            $getAppAttribute = $getAppAttribute->skip($request->skip)
                ->whereIn('sec_user_id',
                    array_unique($getUsers)
                )
                ->orWhere(function($subquery){
                    $subquery->whereIn('assigned_infrastructure_planner', array( auth('sanctum')
                        ->user()->sec_user_id ))
                        ->whereIn('request_status_id', array(8, 9) );
                })
                ->with('appWfInstance.status')
                ->with('user')
                ->orderBy('created_at', 'DESC')
                ->take($request->take)
                ->get();

            return response()->json([
                'success'       => true,
                'data'          => $getAppAttribute,
                'totalCount'    => $getAppAttribute->count(),
                'summary'       => [],
                'groupCount'    => [],
                'orderBy'       => $sorting
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

}