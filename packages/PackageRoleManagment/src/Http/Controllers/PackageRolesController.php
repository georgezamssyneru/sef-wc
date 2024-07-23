<?php
namespace Hip\PackageRoleManagement\Http\Controllers;

use App\Helpers\ExternalHelper;
use App\Http\Controllers\Controller;
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


class PackageRolesController extends Controller
{

    use PermissionSec;

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

            //  RUN TRIGGER TO INITIATE SEC CACHE
            DB::select("call pop_sec_cache( ? )", array( $request->user ));

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

            //  RUN TRIGGER TO INITIATE SEC CACHE
            DB::select("call pop_sec_cache( ? )", array( $request->user ));

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

                //  RUN TRIGGER TO INITIATE SEC CACHE
                DB::select("call pop_sec_cache( ? )", array( $request->user_id ));

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
    public function createRole( Request $request ){

        $validator = Validator::make($request->all(),[
            'role_name'     => 'required',
            'isGroup'       => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        try {

            //  --------------  IF WE HAVE A ROLE TYPE
            if($request->isGroup){

                $roleAssigned = SecRole::where([
                    'role_name' =>  $request->role_name,
                    'role_type_id' => $request->role_type_id
                ])->get();

                if( count($roleAssigned) == 0 ){

                    //  ------------    CHECK IF EXISTS AND JUST UPDATE AGAIN OR CREATE ROLE FOR USER
                    $createSecRole = SecRole::create(
                        [
                            'role_id' =>  Str::uuid()->toString(),
                            'role_name' =>  $request->role_name,
                            'role_type_id' =>  $request->role_type_id,
                            'role_group_id' =>  0,
                            'role_is_profile' =>  0,
                            'role' => 1,
                            'role_status' => 1
                        ]
                    );

                }

            }

            //  --------------  IF WE HAVE A PARENT ROLE
            if(!$request->isGroup){

                $roleAssignedParent = SecRole::where([
                    'role_id' =>  $request->role_id
                ])->first();

                //  ------------    CHECK IF EXISTS AND JUST UPDATE AGAIN OR CREATE ROLE FOR USER
                $createSecRoleChild = SecRole::create(
                    [
                        'role_id' =>  Str::uuid()->toString(),
                        'role_name' =>  $request->role_name,
                        'role_type_id' =>  $roleAssignedParent->role_type_id,
                        'role_group_id' =>  0,
                        'role_is_profile' =>  0,
                        'role' => 1,
                        'role_status' => 1
                    ]
                );

                //  --------------- CREATE PARENT ROLE
                SecRoleLink::create([
                    'role_link_id' => Str::uuid()->toString(),
                    'parent_role'  => $request->role_id,
                    'child_role'   => $createSecRoleChild->role_id
                ]);

            }

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
    function role_name_sort($a, $b) {

        return $a["role_name"] - $b["role_name"];

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStructure( Request $request ){

        try {

            $allRoles = array();

            $groupRoles = SecRoleType::get();

            $secRole = SecRole::whereNotIn('role_id', DB::table('sec_role_link')->pluck('child_role') )->get();

            //$parentRoles = SecRoleLink::distinct('parent_role')->with('secRoleParent.secRoleType')->get();

            $childRoles = SecRoleLink::with('secRoleChild')->get();

            //  ------------------ PARENT GROUP
            foreach ($groupRoles as $groupRole){

                $roleGroup = array();
                $roleGroup['role_id']   = $groupRole->role_type_id;
                $roleGroup['Head_ID']   = -1;
                $roleGroup['role_name'] = $groupRole->role_type_name;

                array_push($allRoles, $roleGroup);

            }

            foreach ($secRole as $groupRoleP){

                $roleGroupParent = array();
                $roleGroupParent['role_id']   = $groupRoleP->role_id;
                $roleGroupParent['Head_ID']   = $groupRoleP->role_type_id;
                $roleGroupParent['role_name'] = $groupRoleP->role_name;

                array_push($allRoles, $roleGroupParent);

            }

            //  ------------------- CHILD ROLE
            foreach (json_decode($childRoles, true) as $childRole){

                //  --------------- CHECK IF CHILD
                $roleChild = array();
                $roleChild['role_id']   = $childRole['sec_role_child']['role_id'];
                $roleChild['Head_ID']   = $childRole['parent_role'];
                $roleChild['role_name'] = $childRole['sec_role_child']['role_name'];

                array_push($allRoles, $roleChild);

            }

            $collSort = collect($allRoles);

            return response()->json([
                'success'    => true,
                'structure'  => $collSort->sortBy('role_name', SORT_NATURAL)->values()->all()
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