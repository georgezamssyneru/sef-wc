<?php
namespace Hip\PackageUserManagement\Http\Controllers;

use App\Events\EventHistory;
use App\Helpers\ExternalHelper;
use App\Http\Controllers\Controller;
use App\Models\SecCache;
use App\Models\SecLogRegistrationOutcome;
use App\Models\SecLogUser;
use App\Models\SecRole;
use App\Models\SecRoleUser;
use App\Models\SecUserDecision;
use App\Models\SecUserStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Validator;
use App\Models\User;
use App\Models\MasterList\Facility;
use App\Models\MasterList\Address;
use Enforcer;
use Illuminate\Auth\Events\Registered;
//use Illuminate\Support\Facades\Auth;
use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\PublicKeyLoader;

use PDF;

class PackageUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * GET DISTRICTS SEARCHED FOR
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDistricts( Request $request ){

        try{

            $validator = Validator::make($request->all(),[
                'district' => 'required'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());
            }

            $wordCount = str_word_count( $request->district );

            if($wordCount > 1){
                $allDistricts = DB::connection('pgsqlReport')
                    ->select("select distinct district_municipality 
                      from master_data.hips_facility where district_municipality is not null 
                      and LOWER(district_municipality) LIKE LOWER(:district) ORDER BY 1",
                        [ 'district' => '%' .$request->district. '%' ] );
            }else{
                $allDistricts = DB::connection('pgsqlReport')
                    ->select("select distinct district_municipality 
                      from master_data.hips_facility where district_municipality is not null 
                      and LOWER(district_municipality) LIKE LOWER(:district2) 
                      or LOWER(district_municipality) LIKE LOWER(:district) 
                      ORDER BY 1",
                        [ 'district' => '% ' .$request->district. '%', 'district2' => $request->district. '%' ] );
            }

            $finalDistricts = [];

            foreach ($allDistricts as &$value) {

                $b = array(
                    'value' =>   $value->district_municipality,
                    'label' =>   $value->district_municipality
                );

                array_push( $finalDistricts, $b);

            }

            return response()->json([
                'success'       => true,
                'districts'     => $finalDistricts,
                'wordCount'     => $wordCount
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
                'error'   => $e->getMessage()
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
                'error'   => $e->getMessage()
            ]);

        }

    }

    /**
     * GET FACILITIES FOR DISTRICT
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFacility( Request $request ){

        try{

            $validator = Validator::make($request->all(),[
                'facility' => 'required'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());
            }

            $allDistricts = DB::connection('pgsqlReport')
                ->select("select distinct facility_name from master_data.hips_facility where district_municipality = :facility", [ 'district' => $request->facilty ] );

            $finalDistricts = [];

            foreach ($allDistricts as &$value) {

                $b = array(
                    'value' =>   $value->district_municipality,
                    'label' =>   $value->district_municipality
                );

                array_push( $finalDistricts, $b);

            }

            return response()->json([
                'success'       => true,
                'districts'     => $finalDistricts
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
                'error'   => $e->getMessage()
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
                'error'   => $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFacilities( Request $request ){

        try{

            $validator = Validator::make($request->all(),[
                'facility' => 'required'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());
            }

            $allDistricts = DB::connection('pgsqlReport')
                ->select("select * from master_data.hips_facility where district_municipality= :facility ", [ 'facility' => $request->facility ]);

            $finalDistricts = [];

            foreach ($allDistricts as &$value) {

                $b = array(
                    'value' =>   $value->facility_name,
                    'label' =>   $value->facility_name
                );

                array_push( $finalDistricts, $b);

            }

            return response()->json([
                'success'       => true,
                'facilities'    => $finalDistricts
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
                'error'   => $e->getMessage()
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
                'error'   => $e->getMessage()
            ]);

        }

    }

    /**
     * Assign role to a user
     * @param Request $request
     */
    public function assignRole( Request $request ){

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function usersSearchWithRoles(Request $request){

        try{

            $getUsersNotApprovedAndNoRoles = ExternalHelper::getUsersWithRoles($request);

            return response()->json([
                'success'       => true,
                'users'         => $getUsersNotApprovedAndNoRoles
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
                'error'   => $e->getMessage()
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
                'error'   => $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function usersWithRoles( Request $request ){

        try{

            $column='user_status_id';
            $direction='ASC';

            if($request->all()){
                foreach($request->all() as $key => $item){
                    switch ($key) {
                        case 'first_name':
                            $column='first_name';
                            $direction=$item;
                            break;
                        case 'last_name':
                            $column='last_name';
                            $direction=$item;
                            break;
                        case 'email':
                            $column='email';
                            $direction=$item;
                            break;
                    }
                }
            }

            $getUsersNotApprovedAndNoRoles = User::orderBy($column, $direction)
                ->with('secRoleUser.secRole')
                ->get();

            $count = User::where('user_status_id','=','1')->count();

            return response()->json([
                'success'       => true,
                'users'         => $getUsersNotApprovedAndNoRoles,
                'ordering'      => $request->all(),
                'inactive_count' => $count
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
                'error'   => $e->getMessage()
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
                'error'   => $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function decrypt(Request $request){

        try{

            $validator = Validator::make($request->all(), [
                'token'   => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $private = RSA::loadPrivateKey(env('PRIVATE_KEY'));

            $ciphertext = $request->token;

            $private = openssl_get_privatekey($private);

            openssl_private_decrypt(base64_decode($ciphertext), $plaintext, $private, OPENSSL_PKCS1_PADDING);

            return response()->json([
                'success'    => true,
                'decrypt'    => json_decode($plaintext),
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function encrypt( Request $request ){

        $key = PublicKeyLoader::load(env('PUBLIC_KEY'));

        $key = $key->withPadding( RSA::ENCRYPTION_PKCS1 );

        $package = array(
            'userid' => '6022b834-2fd2-40e1-a962-116721b4b501',
            'expiry' => '2022-01-28T17:54:46.3845875+02:00'
        );
        $encrypt =  base64_encode( $key->encrypt( json_encode( $package )) );

        return response()->json([
            'success'       => true,
            'cipher'     => $encrypt
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPublicPrivateKeys(Request $request){

        $private = RSA::createKey();
        $private = $private->withPadding(RSA::SIGNATURE_PSS )->withHash('sha256');
        $public = $private->getPublicKey();

        return response()->json([
            'success'    => true,
            'private'    => $private->toString('PKCS1'),
            'public'     => $public->toString('PKCS1')
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function assignUserStatus( Request $request){

        try{

            $checkTransactionError = false;

            $errorMessage = null;

            //  TRANSACTION
            DB::transaction(function() use ($request, &$checkTransactionError, &$errorMessage){

                try
                {

                    //  ------- UPDATE SEC USER
                    $user = User::find($request->sec_user_id);

                    $secRole = SecRole::where('role_name', 'App User')->first();

                    if( $secRole ){

                        $secRoleUser = SecRoleUser::where([
                            ['user_id', $user->sec_user_id],
                            ['role_id', $secRole->role_id]
                        ])->first();

                        //  CREATE IF NOT CREATED
                        if(!$secRoleUser){

                            //  CREATE LINK TO ROLE ON USER
                            SecRoleUser::create([
                                'role_user_id'  => Str::uuid()->toString(),
                                'user_id'   =>  $user->sec_user_id,
                                'role_id'   =>  $secRole->role_id
                            ]);

                        }

                        //  RUN TRIGGER TO INITIATE SEC CACHE
                        DB::select("call pop_sec_cache( ? )", array( $user->sec_user_id ));

                    }

                    //  ------- GET STATUS
                    $status = SecUserStatus::where('sec_user_status_id', $request->user_status_id )->first();

                    //  ------- IF USER STATUS DIFFERENT FROM DB ON ACTIVE INACTIVE, MAKE CHANGE
                    if( $user->user_status_id !== $status->sec_user_status_id ){

                        $user->user_status_id = $status->sec_user_status_id;
                        $user->save();

                        //  ------- SEC LOG USER
                        SecLogUser::create([
                            'sec_user_log_id'   =>  Str::uuid()->toString(),
                            'user_id'           =>  $request->sec_user_id,
                            'user_status_id'    =>  $status->sec_user_status_id,
                            'modified_dt'       =>  Carbon::now(),
                            'review_user_id'    =>  auth()->user()->sec_user_id,
                            'comment'           =>  $request->comment
                        ]);

                        //  SEND EMAIL IF STATUS WAS INACTIVE TO INFORM USER THAT HE IS ACTIVE
                        //  @todo Place column when email has been sent for the first time, so we dont resend, on each change
                        if( $request->user_status_id === 2 ){

                            $details = [

                                'name' => $user->first_name,

                                'lastname' => $user->last_name

                            ];

                            //  SEND EMAIL
                            Mail::to($user->email)->send(new \App\Mail\UserActivated($details));

                        }else if( $request->status === 1 ){

                            $details = [

                                'name' => $user->first_name,

                                'lastname' => $user->last_name

                            ];

                            //  SEND EMAIL
                            Mail::to($user->email)->send(new \App\Mail\UserInActive($details));

                        }

                    }

                }
                catch (\Exception $e)
                {

                    $errorMessage = $e->getMessage();
                    $checkTransactionError = true;

                }

            });

            if(!$checkTransactionError){
                return response()->json([
                    'success'  => true,
                ]);
            }else{

                return response()->json([
                    'success'  => false,
                    'error'    => $errorMessage
                ]);

            }

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRoles( Request $request){

        try{

            return response()->json([
                'success'  => true,
                'roles'    => SecRole::get()
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserStatus( Request $request){

        try{

            return response()->json([
                'success'  => true,
                'data'    => SecUserStatus::get()
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

        }

    }

}