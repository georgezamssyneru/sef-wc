<?php
namespace Hip\PackageMapsManagment\Http\Controllers;

use App\Events\EventHistory;
use App\ExternalProviders\Esri;
use App\Helpers\ExternalHelper;
use App\Http\Controllers\Controller;
use App\Models\AppDashboard;
use App\Models\MasterData\HipsFacilityComment;
use App\Models\MasterData\HipsHealthFacility;
use App\Models\MasterData\HipsHealthFacilityBed;
use App\Models\MasterData\HipsHealthFacilityBedType;
use App\Models\MasterData\HipsHealthFacilityStatus;
use App\Models\MasterData\HipsHealthFacilityType;
use App\Models\PPO\ProjectPPO;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Psy\Readline\Hoa\Console;
use Validator;
use Enforcer;
use PDF;

class PackageMapsController extends Controller
{

    //  ----------  CUSTOM ESRI PROVIDER
    protected $customEsri;

    //  ----------  IS ERROR ON DB TRANSACTION
    public static $isError = false;

    public function __construct( \App\ExternalProviders\Esri $customEsri )
    {

        $this->customEsri = $customEsri;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFacilitiesFromPolygon( Request $request ){

        $validator = Validator::make( $request->all(), [
            'coordinates' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json( $validator->errors() );
        }

        try {

            $nearByQuery = "SELECT *
                FROM hips_facility
                RIGHT JOIN mfl_facility ON hips_facility.mfl_facility_code = mfl_facility.facility_code_mfl
                RIGHT JOIN hips_facility_type_link ON hips_facility_type_link.facility_id = mfl_facility.facility_guid
                RIGHT JOIN hips_facility_type ON hips_facility_type.facility_type_code = hips_facility_type_link.facility_type_code 
                WHERE mfl_facility.area_type != ''
                AND hips_facility_type.is_relevant = '1'
                AND hips_facility.facility_status_id = '1'
                AND public.ST_INTERSECTS( hips_facility.shape, public.ST_TRANSFORM( public.ST_GeomFromGeoJSON('{
                    \"type\":\"Polygon\",
                    \"coordinates\": [ $request->coordinates ],
                    \"crs\":{\"type\":\"name\",\"properties\":{\"name\":\"EPSG:4326\"}}
                }'),4326))";

            $facilities = DB::connection('pgsqlMasterData')->select(DB::raw($nearByQuery));

            return response()->json([
                'success'   => true,
                'data'      => $facilities
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
    public function getServiceAreas( Request $request ){

        $validator = Validator::make( $request->all(), [
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {

            $getToken = $this->customEsri->getRefreshToken(
                env('ESRI_GENERATE_TOKEN_URL'),
                array(),
                array(
                "username" => env('ESRI_USERNAME'),
                "password" => env('ESRI_PASSWORD'),
                "client" => 'referer',
                "referer" => 'https://gis.smec.co.za/server/',
                "expiration" => '20160',
                "f" => 'json'
            ));

            $facilities = array(
                'spatialReference' => array('wkid' => 4326),
                'features'         => array(
                    array(
                        'geometry' => array(
                            "x" => $request->longitude,
                            "y" => $request->latitude
                        ),
                        // @todo get more information on Attributes
//                        'attributes' => array(
//                            "OBJECTID" => 99,
//                            "Name"     => "ODI Community Hospital"
//                        )
                    )
                ),
                'doNotLocateOnRestrictedElements' => false
            );

            $responseMap = $this->customEsri->getServiceAreas(
                env('ESRI_SERVICE_AREAS'),
                array(),
                array(
                    "facilities" => json_encode( $facilities ),
                    "defaultBreaks" => 5,
                    "overlapPolygons" => true,
                    "preserveObjectID" => true,
                    "restrictionAttributeNames" => 'Avoid Carpool Roads, Avoid Express Lanes, Avoid Gates, Avoid Private Roads, Avoid Unpaved Roads, Driving an Automobile, Roads Under Construction Prohibited, Through Traffic Prohibited',
                    "outputPolygons" => 'esriNAOutputPolygonSimplified',
                    "travelDirection" => 'esriNATravelDirectionFromFacility',
                    "outputGeometryPrecision" => 10,
                    "outputGeometryPrecisionUnits" => 'esriMeters',
                    "f" => 'pjson',
                    "token" => $getToken['token']
                ));

            return response()->json([
                'success'   => true,
                'data'      =>      $responseMap
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
    public function getServiceAreasQueryFacilities( Request $request ){

        $validator = Validator::make( $request->all(), [
            'xmin' => 'required',
            'xmax' => 'required',
            'ymin' => 'required',
            'ymax' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {

            $getToken = $this->customEsri->getRefreshToken(
                env('ESRI_GENERATE_TOKEN_URL'),
                array(),
                array(
                    "username" => env('ESRI_USERNAME'),
                    "password" => env('ESRI_PASSWORD'),
                    "client" => 'referer',
                    "referer" => 'https://gis.smec.co.za/server/',
                    "expiration" => '20160',
                    "f" => 'json'
                ));

            $facilities = array(
                'url' => 'https://gis.smec.co.za//server/rest/services/Health/MFL_Facilities_Update/MapServer/0/query?f=json&where=facility_type%20=%20%27Clinic%27&geometry={xmin:'.$request->xmin.',ymin:'.$request->ymin.',xmax:'. $request->xmax .',ymax:'. $request->ymax .'}&geometryType=esriGeometryEnvelope&inSR=4326&spatialRel=esriSpatialRelIntersects&outFields=facility_guid,primary_facility_name,facility_type&returnGeometry=true&outSR=4326',
            );

            $responseMap = $this->customEsri->getServiceAreas(
                env('ESRI_SERVICE_AREAS'),
                array(),
                array(
                    "facilities" => json_encode( $facilities ),
                    "defaultBreaks" => 5,
                    "overlapPolygons" => false,
                    "preserveObjectID" => true,
                    "restrictionAttributeNames" => 'Avoid Carpool Roads, Avoid Express Lanes, Avoid Gates, Avoid Private Roads, Avoid Unpaved Roads, Driving an Automobile, Roads Under Construction Prohibited, Through Traffic Prohibited',
                    "outputPolygons" => 'esriNAOutputPolygonSimplified',
                    "travelDirection" => 'esriNATravelDirectionFromFacility',
                    "outputGeometryPrecision" => 10,
                    "outputGeometryPrecisionUnits" => 'esriMeters',
                    "f" => 'pjson',
                    "token" => $getToken['token']
                ));

            return response()->json([
                'success'   => true,
                'data'      =>      $responseMap
            ]);

        } catch (\Illuminate\Database\QueryException $e){

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
    public function getComments( Request $request ){

        try{

            $validator = Validator::make($request->all(), [
                'facilityId' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            //  GET THE FACILITY INFORMATION
            $facility = HipsHealthFacility::find( $request->facilityId );

            $getComments = HipsFacilityComment::where( 'facility_guid', $request->facilityId )
                ->with('user')
                ->orderBy('comment_dt', 'DESC')
                ->get();

            return response()->json([
                'success'       => true,
                'facility'      => $facility,
                'comments'      => $getComments,
                'user'          => auth()->user()->sec_user_id
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
    public function makeComment( Request $request ){

        try{

            $validator = Validator::make($request->all(), [
                'facilityId' => 'required',
                'comment'    => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $newfacility = new HipsFacilityComment;
            $newfacility->hips_comment_id = Str::uuid()->toString();
            $newfacility->user_id = auth()->user()->sec_user_id;
            $newfacility->comment_dt =  Carbon::now();
            $newfacility->facility_guid =  $request->facilityId;
            $newfacility->comment =  $request->comment;
            $newfacility->save();

            return response()->json([
                'success'       => true,
                'comment'       => $request->comment,
                'comment_dt'    => Carbon::parse($newfacility->comment_dt)->format('Y-m-d h:m:s'),
                'first_name'    => auth()->user()->first_name,
                'last_name'     => auth()->user()->last_name,
                'hips_comment_id' => $newfacility->hips_comment_id
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
    public function getFacilityWithMeta( Request $request ){

        try{

            //  --------    FACILITY TYPE
            $facilityTypesMeta =  HipsHealthFacilityType::orderBy('facility_type', 'DESC')->get();

            //  --------    FACILITY STATUS
            $facilityStatusMeta = HipsHealthFacilityStatus::get();

            //  --------    FACILITY BED TYPES USED FOR GRID EDITING COMPONENT
            $getFacilityBedTypes = HipsHealthFacilityBedType::whereIn('bed_type_cat_id', [1,5,6])
                ->orderBy('bed_type_id', 'asc')
                ->get();

            return response()->json([
                'success'               => true,
                'facilityTypeMeta'      => $facilityTypesMeta,
                'facilityStatusMeta'    => $facilityStatusMeta,
                'facilityBedTypes'      => $getFacilityBedTypes
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
    public function updateFacility( Request $request ){

        try{

            $validator = Validator::make($request->all(), [
                'sec_user_id'   => 'required',
                'facility_id'   => 'required'
            ]);

            $jsonFacilityTypeId = json_decode($request->facility_type_id, true);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            //  TRANSACTION
            DB::transaction(function() use( $request, $jsonFacilityTypeId )
            {

                try
                {

                    //  --------------  UPDATE FACILITY
                    $getFacility = HipsHealthFacility::where('facility_id', $request->facility_id )->first();

                    $getRequest = $request->all();
                    $getRequest['level_1_bed'] = ($request->level_1_bed == 'null') ? null : $request->level_1_bed;
                    $getRequest['level_2_bed'] = ($request->level_2_bed == 'null') ? null : $request->level_2_bed;
                    $getRequest['level_3_bed'] = ($request->level_3_bed == 'null') ? null : $request->level_3_bed;
                    $getRequest['gazetted_bed'] = ($request->gazetted_bed == 'null') ? null : $request->gazetted_bed;
                    $getRequest['design_bed'] = ($request->design_bed == 'null') ? null : $request->design_bed;
                    $getRequest['usable_bed'] = ($request->usable_bed == 'null') ? null : $request->usable_bed;
                    $getRequest['sec_user_id'] = auth('sanctum')->user()->sec_user_id;

                    $getFacility->update($getRequest);
                    $getFacility->save();

                    //  --------------  UPDATE FACILITY TYPE
//                if( $request->facility_type_id ){
//
//                    if( is_array($jsonFacilityTypeId ) ){
//
//                        $getDbValues = HipsHealthFacilityTypeLink::where('facility_guid',$request->mfl_facility_guid)
//                            ->get();
//
//                        //  FIND ALREADY SAVED VALUES
//                        if( count($getDbValues) > 0){
//
//                            foreach ( $getDbValues as $key => &$value) {
//
//                                $found = false;
//
//                                //  DO A COMPARE WITH VALUES ON RECORD TO SEE WHAT WAS DELETED WITH THE ARRAY
//                                foreach ( $jsonFacilityTypeId as $k => &$v ) {
//
//                                    if( $value['facility_type_code'] == $v['value']){
//
//                                        $found = true;
//
//                                    }
//
//                                    //  CHECK THE FACILITY CODE TO UPDATE OR CREATE
//                                    $checkAvailable = HipsHealthFacilityTypeLink::where('facility_guid', $request->mfl_facility_guid )
//                                        ->where('facility_type_code', $v['value'])
//                                        ->first();
//
//                                    if($checkAvailable){
//
//                                        $checkAvailable->type_order = $k;
//                                        $checkAvailable->save();
//
//                                    }else{
//
//                                        $newLink = new HipsHealthFacilityTypeLink;
//                                        $newLink->facility_guid = $request->mfl_facility_guid;
//                                        $newLink->facility_type_code = $v['value'];
//                                        $newLink->type_order = $k;
//                                        $newLink->save();
//
//                                    }
//
//                                }
//
//                                //  --------------  DELETE IF REMOVED FROM UI
//                                if(!$found){
//
//                                    HipsHealthFacilityTypeLink::find($value->facility_type_link_id)
//                                        ->delete();
//
//                                }
//
//                            }
//
//                        }else{
//
//                            //  DO A COMPARE WITH VALUES ON RECORD TO SEE WHAT WAS DELETED WITH THE ARRAY
//                            foreach ( $jsonFacilityTypeId as $key => &$value ) {
//
//                                $newLink = new HipsHealthFacilityTypeLink;
//                                $newLink->facility_guid = $request->facility_id;
//                                $newLink->facility_type_code = $value['value'];
//                                $newLink->type_order = $key;
//                                $newLink->save();
//
//                            }
//
//                        }
//
//                    }
//
//                }

                }
                catch (\Illuminate\Database\QueryException $e)
                {

                    self::$isError = true;

                }

            });

            //  -------------   CHECK IF DB TRANSACTION HAS AN ERROR
            if(self::$isError){

                //  ------- SET BACK TO NORMAL
                self::$isError = false;

                return response()->json([
                    'success'    => false,
                ]);
            }else{
                return response()->json([
                    'success'    => true,
                ]);
            }

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
     * UPDATE BEDS
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateBeds( Request $request ){

        try{

            foreach ( $request->all() as $key=>$value) {

                $explode = explode("_", $key);
                $hipsFacilityBedId = end($explode);

                //  TRANSACTION
                DB::transaction(function() use($hipsFacilityBedId, $value)
                {

                    try
                    {

                        $facilityBed = HipsHealthFacilityBed::find($hipsFacilityBedId);
                        $facilityBed->bed_count = $value;
                        $facilityBed->save();

                    }
                    catch (\PDOException $e)
                    {
                        return response()->json([
                            'success'    => false
                        ]);
                    }

                });

            }

            return response()->json([
                'success'    => true,
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
    public function getFacilityByID( Request $request ){

        try{

            $validator = Validator::make($request->all(), [
                'facilityID' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $projectPPO = [];

            //  GET FACILITY WITH RELATIONS
            try
            {

                //  GET THE FACILITY INFORMATION
                $getFacilityByMflCode = HipsHealthFacility::where( 'facility_id', str_replace(array( '{', '}' ), '', $request->facilityID ) )
                    ->with('facilityBed.bedType')
                    ->with('facilityLink.facilityType.facilityTypeCategory')
                    ->with('mflFacility')
                    ->with('facilityType')
                    ->first();

                //  GET PROJECT FROM FACILITY
                if($getFacilityByMflCode->pmis_facility_key){
                    $projectPPO = ProjectPPO::where('facility_key', $getFacilityByMflCode->pmis_facility_key )->get();
                }

                return response()->json([
                    'success'       => true,
                    'data'          => $getFacilityByMflCode,
                    'projects'      => $projectPPO,
                    'facility_id'   => str_replace(array( '{', '}' ), '', $request->facilityID )
                ]);

            }
            catch ( \Throwable $e )
            {
                return response()->json([
                    'success'    => false,
                    'message'    => $e->getMessage()
                ]);
            }

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
    public function filterProject( Request $request ){

        try{

            $validator = Validator::make($request->all(), [
                'facilityKey' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            //  GET PROJECT FROM FACILITY
            $project = ProjectPPO::query();

            $project->where('facility_key', $request->facilityKey );

            if( $request->status != null && $request->status != 'ALL' ){
                $project->where('active', $request->status );
            }

            return response()->json([
                'success'       => true,
                'data'          => $project->get(),
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
    public function getDashboards(Request $request)
    {

        try {

            $dashboards = AppDashboard::orderBy('sort_order', 'ASC')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $dashboards
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

}