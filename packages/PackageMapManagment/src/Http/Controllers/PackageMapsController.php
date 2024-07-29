<?php
namespace Hip\PackageMapManagement\Http\Controllers;

use App\Helpers\ExternalHelper;
use App\Http\Controllers\Controller;
use App\Models\AppMap;
use App\Models\SecCache;
use App\Models\SecPermission;
use App\Models\SecPermissionLink;
use App\Models\SecRoleLink;
use App\Models\SecRoleType;
use App\Models\SecRoleUser;
use App\Models\SecRole;
use App\Traits\PermissionSec;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Str;
use Nette\Schema\ValidationException;
use Validator;
use App\Models\User;


class PackageMapsController extends Controller
{

    use PermissionSec;

    public function test()
    {
       
        return response()
            ->json(['success'=>true ]);
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $roles = SecRole::paginate(request()->all());

        return response()
            ->json(['success'=>true, 'data' => $roles ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|unique:sec_role',
        ]);

        SecRole::create($request->all());

        return response()
            ->json([ 'success'=>true ]);
    }

    /**
     * @param Request $request
     * @param SecRole $secRole
     * @return $this
     */
    public function update(Request $request, SecRole $secRole)
    {
        $request->validate([
            'role_id' => 'required',
            'role_name' => 'required'
        ]);

        $secRole->update($request->all());

        return response()
            ->json([ 'success'=>true, 'message'=>'Updated.' ]);
    }

    /**
     * @param SecRole $secRole
     * @return mixed
     */
    public function destroy(SecRole $secRole)
    {
        $secRole->delete();

        return response()
            ->json([ 'success'=>true, 'message'=>'Deleted.' ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getUsersWithRoles( Request $request ){

        $getUsersNotApprovedAndNoRoles = ExternalHelper::getUsersWithRoles($request);

        return response()->json([
            'success'       => true,
            'users'         => $getUsersNotApprovedAndNoRoles
        ]);

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function assignRoles( Request $request ){

        $validator = Validator::make($request->all(),[
            'user' => 'required',
            'roles'=> 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        //  TRANSACTION
        DB::transaction(function() use ( $request )
        {

            //  DELETE ALL ROLES FOR NEW INSERT
            $userRoles=SecRoleUser::where("user_id","=",$request->user);
            $userRoles->delete();

            $getRoles = $request->roles;

            foreach ( $getRoles as &$role) {

                SecRoleUser::create(
                    [
                        'role_user_id' =>  Str::uuid()->toString(),
                        'user_id' =>  $request->user,
                        'role_id' => $role['value']
                    ]
                );

            }

            DB::executeProcedure('MASTER_APP.pop_sec_cache', [$request->user]);

        });

        return response()->json([
            'success'       => true
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function assignRoleToPermission( Request $request ){

        $validator = Validator::make($request->all(),[
            'permission_id' => 'required',
            'role_id'=> 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        try {

            $dataCreated = [];

            $roleAssigned = SecPermissionLink::where([
                'permission_id' =>  $request->permission_id,
                'role_id' => $request->role_id
            ])->get();

            if( count($roleAssigned) == 0 ){
                //  ------------    CHECK IF EXISTS AND JUST UPDATE AGAIN OR CREATE ROLE FOR USER
                $dataCreated = SecPermissionLink::create(
                    [
                        'p_link_id' =>  Str::uuid()->toString(),
                        'permission_id' =>  $request->permission_id,
                        'role_id' => $request->role_id
                    ]
                );

                //  ----------- BUILD LIST AGAIN
                Artisan::call('appSyncSecCacheWithSecPermissionAll:run', []);

            }

            return response()->json([
                'success' => true,
                'data'    => $dataCreated
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
    public function assignPermission( Request $request ){

        $validator = Validator::make($request->all(),[
            'user' => 'required',
            'roles'=> 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        //  TRANSACTION
        DB::transaction(function() use ( $request )
        {

            //  DELETE ALL ROLES FOR NEW INSERT
            $userRoles=SecRoleUser::where("user_id","=",$request->user);
            $userRoles->delete();

            $getRoles = $request->roles;

            foreach ( $getRoles as &$role) {

                SecRoleUser::create(
                    [
                        'role_user_id' =>  Str::uuid()->toString(),
                        'user_id' =>  $request->user,
                        'role_id' => $role['value']
                    ]
                );

            }

            DB::executeProcedure('MASTER_APP.pop_sec_cache', [$request->user]);

        });

        return response()->json([
            'success'       => true
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRoles(  Request $request ){

        try {

            $getAllRoles = SecRole::orderBy('role_name', 'Asc')->get();

            return response()->json([
                'success' => true,
                'data'    => $getAllRoles
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
    public function getPermissionsByRole(  Request $request ){

        try {

//            $getAllPermissions = SecPermission::whereIn('permission_id',
//                    DB::table('sec_permission_link')
//                        ->where( 'role_id', '=', $request->role_id )
//                        ->pluck('permission_id')
//                )
//                ->with('appClass')
//                ->orderBy('permission_name', 'DESC')
//                ->get();

            $getAllPermissions = SecPermission::with('appClass')
                ->orderBy('permission_name', 'DESC')
                ->get();

            return response()->json([
                'success' => true,
                'data'    => $getAllPermissions
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
    public function revokeUserRole( Request $request ){

        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'role_id'=> 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        try {

            //  DELETE ALL ROLES FOR NEW INSERT
            $userRoles=SecRoleUser::where([
                ['user_id','=', $request->user_id],
                ['role_id', '=', $request->role_id]
            ]);
            $userRoles->delete();

            Artisan::call('appSyncSecCacheWithSecPermissionAll:run', []);

            return response()->json([
                'success' => true
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
    public function revokePermissionRole( Request $request ){

        $validator = Validator::make($request->all(),[
            'permission_id' => 'required',
            'role_id'=> 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        try {

            //  DELETE ALL ROLES FOR NEW INSERT
            $userRoles=SecPermissionLink::where([
                ['permission_id','=', $request->permission_id],
                ['role_id', '=', $request->role_id]
            ]);
            $userRoles->delete();

            //  ----------- BUILD LIST AGAIN
            Artisan::call('appSyncSecCacheWithSecPermissionAll:run', []);

            return response()->json([
                'success' => true
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
    public function assignUserRole( Request $request ){

        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'role_id'=> 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        try {

            $roleAssigned = SecRoleUser::where([
                'user_id' =>  $request->user_id,
                'role_id' => $request->role_id
            ])->get();

            if( count($roleAssigned) == 0 ){
                //  ------------    CHECK IF EXISTS AND JUST UPDATE AGAIN OR CREATE ROLE FOR USER
                SecRoleUser::create(
                    [
                        'role_user_id' =>  Str::uuid()->toString(),
                        'user_id' =>  $request->user_id,
                        'role_id' => $request->role_id
                    ]
                );

                DB::executeProcedure('MASTER_APP.pop_sec_cache', [$request->user]);

            }

            return response()->json([
                'success' => true
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
    public function getRoleTypes( Request $request ){

        try {

            $roleType  = SecRoleType::orderBy(
                'role_type_name', 'ASC'
            )->get();

            return response()->json([
                'success' => true,
                'data'    => $roleType
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
    public function createMap( Request $request ){

        $validator = Validator::make($request->all(),[
            'map_name'     => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        try {

            //  ------------    CHECK IF EXISTS AND JUST UPDATE AGAIN OR CREATE ROLE FOR USER
            $createSecRole = AppMap::updateOrCreate([
                'map_name' => $request->map_name
            ],
                [
                    'map_name' =>  $request->map_name,
                ]
            );

            return response()->json([
                'success' => true,
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
     * @param $a
     * @param $b
     * @return mixed
     */
    function map_name_sort($a, $b) {

        return $a["map_name"] - $b["map_name"];

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStructure( Request $request ){

        try {

            $allRoles = array();

            $allMaps = AppMap::get();

            //  ------------------ PARENT GROUP
            foreach ( $allMaps as $map ){

                $roleGroup = array();
                $roleGroup['map_id']   = $map->map_id;
                $roleGroup['Head_ID']   = -1;
                $roleGroup['map_name'] = $map->map_name;

                array_push($allRoles, $roleGroup);

            }

            $collSort = collect($allRoles);

            return response()->json([
                'success'    => true,
                'structure'  => $collSort->sortBy('map_name', SORT_NATURAL)->values()->all()
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

}