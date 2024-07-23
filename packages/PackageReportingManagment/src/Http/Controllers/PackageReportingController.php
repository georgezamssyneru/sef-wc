<?php

namespace Hip\PackageReportingManagment\Http\Controllers;

use App\Events\EventHistory;
use App\Helpers\ExternalHelper;
use App\Helpers\ExternalLoggerHelper;
use App\Http\Controllers\Controller;
use App\Models\CSIR\LogImportCSIR;
use App\Models\MasterData\HipsHealthFacility;
use App\Models\PPO\LogImportPPO;
use App\Models\ReportLayout;
use App\Models\SecCache;
use App\Models\SecRoleUser;
use App\Models\SecRole;
use App\Traits\PermissionSec;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Nette\Schema\ValidationException;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

use PDF;

class PackageReportingController extends Controller
{

    use PermissionSec;

    //  ----------  CUSTOM ESRI PROVIDER
    protected $customEsri;

    public function __construct( \App\ExternalProviders\Esri $customEsri )
    {

        $this->customEsri = $customEsri;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reporting(Request $request)
    {

        try{

            $validator = Validator::make($request->all(), [
                'district' => 'required',
                'facilities' => 'required',
                'limit' => 'required'
            ]);

            if ( $validator->fails() ) {
                return response()->json($validator->errors());
            }

            //  GET Facilities
            $fac_array = json_decode($request->facilities, true);
            $placeholders = join("','", $fac_array);

            //  ------------------  GET REPORT FROM DB
            $runReport = ExternalHelper::getReport( $placeholders, $request );

            //  ------------------  GENERATE TOKEN
            //  ------------------  GET TOKEN FROM ESRI
            //Cache::delete('tokenEsri');

            $tokenKey = Cache::get( 'tokenEsri' );

            if ( !$tokenKey ) {

                //  ------------------  GET REFRESH TOKEN FROM ESRI PROVIDER API
                $refreshToken = $this->customEsri->getRefreshToken( env('ESRI_GENERATE_TOKEN_URL'), [ "verify" => false ], array(
                    "username" => env('ESRI_USERNAME'),
                    "password" => env('ESRI_PASSWORD'),
                    "client" => 'referer',
                    "referer" => 'http://10.73.1.4/server/',
                    "expiration" => '20160',
                    "f" => 'json'
                ));

                //  --------- STORE TOKEN IN CACHE
                $tokenKey = Cache::put( 'tokenEsri', $refreshToken, $seconds = 20000 );

            }

            foreach ($runReport as &$report) {

                //  ------------------  GET IMAGE FROM ESRT
                //  ------------------  CHECK IF IMAGE DOWNLOADED
                $Webmap = $this->customEsri->mapImageFromEsriOptions( $report );

                if( !\Illuminate\Support\Facades\Storage::exists( $report->facilitycodendoh .'.jpg' )) {

                    if( isset($tokenKey['token']) ){

                        $responseMap = $this->customEsri->generateMapImage(env('ESRI_GENERATE_MAP_URL'), ["verify"=>false],
                            array(
                                "Web_Map_as_JSON" => $Webmap,
                                "Format" => 'JPG',
                                "Layout_Template" => 'MAP_ONLY',
                                "f" => 'json',
                                "token" => $tokenKey['token']
                            ));

                        $responseMapUrl = $responseMap['results'][0]['value']['url'];

                        if( $responseMapUrl ){

                            //  ------------    STORE IMAGE TO DISK FOR LATER USE
                            stream_context_set_default(array(
                                'ssl'                => array(
                                    'peer_name'          => 'generic-server',
                                    'verify_peer'        => FALSE,
                                    'verify_peer_name'   => FALSE,
                                    'allow_self_signed'  => TRUE
                                )));

                            $contents = file_get_contents( $responseMapUrl );
                            $name = $report->facilitycodendoh.'.jpg';
                            Storage::disk('public')->put( $name, $contents );

                        }

                    }

                }else{

                    if( !$responseMap )
                        return response()->json([
                            'success'       => false,
                            'message'       => 'Error on generating token.'
                        ]);

                }

            }

            //  -------------   SHARE THE DATA FROM DB TO VIEW
            view()->share('p', $runReport);

            $pdf_doc = PDF::loadView('export_pdf', $runReport);
            $pdf_doc->setPaper('A4', 'landscape');
            return $pdf_doc->download('report.pdf');

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
    public function providersReporting(Request $request)
    {

        try{

            $validator = Validator::make($request->all(), [
                'provider' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $date = Carbon::now()->subDays(4);

            $ppo = LogImportPPO::where('ImportStartDate', '>=', $date)
                ->orderBy('ImportStartDate', 'DESC')
                ->get()
                ->groupBy(function($date) {
                    return Carbon::parse($date->ImportStartDate)->format('d-m-Y'); // grouping by years
                });

            $csir = LogImportCSIR::where('ImportStartDate', '>=', $date)
                ->orderBy('ImportStartDate', 'DESC')
                ->get()
                ->groupBy(function($date) {
                    return Carbon::parse($date->ImportStartDate)->format('d-m-Y'); // grouping by years
                });

            return response()->json([
                'success'       => true,
                'ppo'          => $ppo,
                'csir'          => $csir
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
     * PPO
     * Get Import Details from ImportId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function importDetail(Request $request){

        try{

            $validator = Validator::make($request->all(), [
                'ImportId' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $getImportDetails = ExternalLoggerHelper::getLogDetail($request->ImportId ,$request);

            return response()->json([
                'success'       => true,
                'data'         => $getImportDetails
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
     * PPO
     * Get Import Entity Details from ImportId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function importEntity(Request $request){

        try{

            $validator = Validator::make($request->all(), [
                'ImportId' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $getImportEntity = ExternalLoggerHelper::getLogEntity($request->ImportId ,$request);

            return response()->json([
                'success'       => true,
                'data'         => $getImportEntity
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
     * CSIR
     * Get Import Facility Details from ImportId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function importFacility(Request $request){

        try{

            $validator = Validator::make($request->all(), [
                'ImportId' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $getImportEntity = ExternalLoggerHelper::getLogFacility($request->ImportId ,$request);

            return response()->json([
                'success'       => true,
                'data'         => $getImportEntity
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
     * PPO
     * Get Import Details from ImportId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function importDetailCSIR(Request $request){

        try{

            $validator = Validator::make($request->all(), [
                'ImportId' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $getImportDetails = ExternalLoggerHelper::getLogDetailCSIR( $request->ImportId ,$request);

            return response()->json([
                'success'       => true,
                'data'         => $getImportDetails
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
     * GET Error report from Date picker
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function providersReportingDatePicker(Request $request)
    {

        try{

            $validator = Validator::make($request->all(), [
                'dateFrom' => 'required',
                'dateTo'   => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $dateFrom = Carbon::createFromFormat('m/d/Y',  $request->dateFrom);
            $dateTo = Carbon::createFromFormat('m/d/Y',  $request->dateTo);

            $ppo = LogImportPPO::where('ImportStartDate', '>=', $dateFrom)
                ->where('ImportStartDate', '<=', $dateTo )
                ->orderBy('ImportStartDate', 'DESC')
                ->get()
                ->groupBy(function($date) {
                    return Carbon::parse($date->ImportStartDate)->format('d-m-Y'); // grouping by years
                });

            $csir = LogImportCSIR::where('ImportStartDate', '>=', $dateFrom)
                ->where('ImportStartDate', '<=', $dateTo )
                ->orderBy('ImportStartDate', 'DESC')
                ->get()
                ->groupBy(function($date) {
                    return Carbon::parse($date->ImportStartDate)->format('d-m-Y'); // grouping by years
                });

            return response()->json([
                'success'       => true,
                'ppo'          => $ppo,
                'csir'          => $csir,
                'provider'      => $request->provider
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
    public function reportingTest(Request $request)
    {

       event( new EventHistory( array(
             'email'     => 'george.zampetakis@syneru.com',
             'url '      => $request->fullUrl(),
             'error'     => 'TEST EVENT'
       ),'SYSTEM_ERROR') );

        return response()->json([
            'success'       => true,
            //  PLACE ESRI SERVICE PROVIDER
            'data'          => $this->customEsri->test(),
            'env'           => env('ESRI_USERNAME')
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reportingLayout(Request $request){

        try{

            //  -------------------------   RUN TRIGGER TO INITIATE TRANSFER TO MASTER DATA
            $reportsAllowed = DB::connection('pgsqlMasterApp')
                ->select("select * from app_report_by_user('".auth('sanctum')->user()->sec_user_id."')");

//        $allReports = ReportLayout::select('DisplayName')
//            ->orderBy('DisplayName', 'DESC')
//            ->get();

            return response()->json([
                'success'       => true,
                'data'          => $reportsAllowed,
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
    public function reportLayout(Request $request){

        try {

            $getReportLayout = ReportLayout::
                select('ReportId', 'DisplayName')
                ->orderBy('DisplayName', 'DESC')
                ->get();

            return response()->json([
                'success' => true,
                'data'    => $getReportLayout
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
    public function reportingDevExpress(Request $request)
    {

        try{

            $validator = Validator::make($request->all(), [
                'facility_id'   => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            //  ------------------  GET FACILITY
            $facility = HipsHealthFacility::find(str_replace(array( '{', '}' ), '', $request->facility_id));

            if(!$facility)
                return response()->json([
                    'success'       => false,
                    'message'       => 'No map.'
                ]);

            //  ------------------  GET IMAGE FROM ESRT
            //  ------------------  CHECK IF IMAGE DOWNLOADED
            $Webmap = $this->customEsri->mapImageFromEsriOptions( $facility );

            if( !\Illuminate\Support\Facades\Storage::exists( $facility->facility_id .'.jpg' )) {

                Cache::forget( 'tokenEsri' );

                $tokenKey = Cache::get( 'tokenEsri' );

                if ( !$tokenKey ) {

                    //  ------------------  GET REFRESH TOKEN FROM ESRI PROVIDER API
                    $refreshToken = $this->customEsri->getRefreshToken( env('ESRI_GENERATE_TOKEN_URL'), [ "verify" => false ], array(
                        "username" => env('ESRI_USERNAME'),
                        "password" => env('ESRI_PASSWORD'),
                        "client" => 'referer',
                        "referer" => 'http://10.73.1.4/server/',
                        "expiration" => '20160',
                        "f" => 'json'
                    ));

                    //  --------- STORE TOKEN IN CACHE
                    Cache::put( 'tokenEsri', $refreshToken, $seconds = 20000 );

                    $tokenKey = $refreshToken;

                }

                if( isset($tokenKey['token']) ){

                    $responseMap = $this->customEsri->generateMapImage( env('ESRI_GENERATE_MAP_URL' ), ["verify"=>false],
                        array(
                            "Web_Map_as_JSON" => $Webmap,
                            "Format" => 'JPG',
                            "Layout_Template" => 'MAP_ONLY',
                            "f" => 'json',
                            "token" => $tokenKey['token']
                        ));

//                    if($responseMap->message->error){
//
//                        return response()->json([
//                            'success'       => false,
//                            'message'       => $responseMap
//                        ]);
//
//                    }

                    $responseMapUrl = $responseMap['results'][0]['value']['url'];

                    if( $responseMapUrl ){

                        //  ------------    STORE IMAGE TO DISK FOR LATER USE
                        stream_context_set_default(array(
                            'ssl'                => array(
                                'peer_name'          => 'generic-server',
                                'verify_peer'        => FALSE,
                                'verify_peer_name'   => FALSE,
                                'allow_self_signed'  => TRUE
                            )));

                        $contents = file_get_contents( $responseMapUrl );
                        $name = $facility->facility_id.'.jpg';
                        Storage::put( $name, $contents );

                        $filePath = public_path($facility->facility_id);

                        $path = Storage::path($name);

                        return response()->file($path);

                    }

                }

            }else{

                $path = Storage::path( $facility->facility_id .'.jpg' );

                return response()->file($path);

            }

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => '',
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
                'email'     => '',
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }

    }

}