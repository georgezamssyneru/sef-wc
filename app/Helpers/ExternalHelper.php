<?php

namespace App\Helpers;

use App\Events\EventHistory;
use App\ExternalProviders\Esri;
use App\Models\MasterData\HipsScenarioDriveTime;
use App\Models\MasterData\HipsScenarioDrivingAnalysis;
use App\Models\MasterData\HipsServiceAreaEa;
use App\Models\MasterData\ScenarioPlanning\HipsScenarioFacility;
use App\Models\MasterData\Views\HipsScenarioEaVw;
use App\Models\SecCache;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Nette\Schema\ValidationException;

class ExternalHelper{

    /**
     * GET USERS WITH ROLES
     * @param Request $request
     * @return mixed
     */
    public static function getUsersWithRoles( Request $request ){

        return User::where(function ($query) use( $request ) {
                $query->where('email', 'ILIKE', '%' . $request->userSearch . '%')
                    ->orWhere('first_name', 'ILIKE', '%' . $request->userSearch . '%')
                    ->orWhere('last_name', 'ILIKE', '%' . $request->userSearch . '%');
            })
            ->with('secRoleUser.secRole')
            ->orderBy('user_status_id', 'ASC')
            ->get();

    }

    /**
     * GET USER WITH ROLES
     * @param Request $request
     * @return mixed
     */
    public static function getUserWithRoles( Request $request ){

        return User::where('email', $request->userSearch )
            ->with('secRoleUser.secRole')
            ->get();

    }

    /**
     * GET REPORT FOR USER
     * @param $placeholders
     * @return mixed
     * @todo will be rewritten from db and also changed to provider facade and class
     */
    public static function getReport( $placeholders, $request ){

        return DB::connection('pgsqlReport')->select("SELECT row_number() OVER ()::integer AS unique_id,
            a.facilityguid,
            a.facilitycodemfl,
            a.facilitycodendoh,
            a.facilitycodepcns,
            a.primaryfacilityname,
            a.secondaryfacilityname,
            a.latitude,
            a.longitude,
            a.areatype,
            a.facilitytype,
            a.gazetted_beds,
            a.relevantfacilitytype,
            a.smec_facility_category,
            a.geom,
            e.criticalcare,
            e.gynaecology,
            e.highcare,
            e.intensivecareunit,
            e.mate,
            e.maternity,
            e.medicine,
            e.neonatalhighcare,
            e.neonatalintensivecareunit,
            e.orthopaedic,
            e.paediatric,
            e.psychiatry,
            e.surgery,
            e.withoxygen,
            e.total AS inpatients_total,
            f.medicines,
            f.privatebeds,
            f.scanners,
            f.testkits,
            f.approvedbeds,
            f.availablebeds,
            f.totalbeds AS inventory_total_beds,
            b.facility_id AS p_id,
            b.facility_key AS p_facility_key,
            b.facility_name AS p_facility_name,
            b.facility_type AS p_facility_type,
            b.facility_category AS p_facility_category,
            b.facility_owner AS p_facility_owner,
            b.units_of_measure AS p_unit_of_measure,
            b.designed_capacity AS p_design_capacity,
            b.usable_capacity AS as_p_usable_capacity,
            b.net_building_area AS p_net_building_area,
            b.gross_building_area_sqm AS p_gross_building_area,
            b.population_catchment AS p_catchment_population,
            b.nhi_status AS p_nhi_status,
            b.status AS p_status,
                CASE
                    WHEN a.primaryfacilityname::text = b.facility_name THEN 'Matched to MFL'::text
                    ELSE 'Not Matched to MFL'::text
                END AS pmis_matched_to_mfl,
            d.id AS ten_id,
            d.name AS ten_facility_name,
            d.category AS ten_facility_category,
            d.l1_total AS ten_l1_beds,
            d.l2_total AS ten_l2_beds,
            d.l3_total AS ten_l3beds,
            d.total_beds AS ten_total_beds,
            d.condition_rating AS ten_condition_rating,
            d.dataset AS ten_dataset,
                CASE
                    WHEN d.name = a.primaryfacilityname::text THEN 'Matched to MFL'::text
                    ELSE 'Not Matched to MFL'::text
                END AS ten_year_matched_to_mfl,
            g.province,
            g.district_n AS district_municipality
           FROM master_data.facilities_mfl_staging_esri a
             LEFT JOIN master_data.facilities_pmis_staging b ON a.primaryfacilityname::text = b.facility_name
             LEFT JOIN master_data.ten_year_plan_facilities_staging d ON a.primaryfacilityname::text = d.name
             LEFT JOIN master_data.ext_inpatientbeds_view e ON a.facilityguid = e.facility_guid
             LEFT JOIN master_data.ext_inventory_view f ON a.facilityguid = f.facility_guid
             LEFT JOIN master_data.hips_district_municipalities g ON st_contains(g.geom, a.geom)
            WHERE g.district_n= :district AND b.facility_name IN ( '" . $placeholders . "' )
            LIMIT :limit", ['district' => $request->district, 'limit' => $request->limit]);

    }

    /**
     * @param $validator
     */
    public static function failedValidation( $validator )
    {

        throw new HttpResponseException(
            response()->json([
                'success'=>false,
                'error' => $validator->errors()
            ], 422)
        );

    }

    /**
     * CHECK TO SEE IF ROLE IN THE SELECTED NATIONAL PLANNERS
     * @param $role_id
     * @return bool
     */
    public static function plannersByProvince( $role_id ){

        $allPlannerRoles = [
            '239b1799-2ded-4c50-a7e0-89bad0db74f6',
            '44322a06-1507-4f9d-a44b-047b72e67ac2',
            '3ec3588f-5c50-407a-b93c-31287a9c55d0',
            'f92cbaef-d105-4c86-a6d2-a857e83848c2',
            '4addf576-d107-4b91-bfef-7ce292abb2ae',
            '1eb6958b-5dad-44c3-b4ab-e3f79b6831d6',
            'b8b7febc-28a8-4cfc-bde9-f52c6bce1ed9',
            'f5fc8fad-992e-4051-8ce3-cd2bc2a56534',
            '66f48a53-2da2-46f6-82f6-2357801bbe74'
        ];

        $checkToSeeIfRole = in_array($role_id, $allPlannerRoles);

        if($checkToSeeIfRole)
            switch ($role_id) {
                //    WESTERN CAPE
                case '66f48a53-2da2-46f6-82f6-2357801bbe74':
                    return 1;
                    break;
                //    EASTERN CAPE
                case '44322a06-1507-4f9d-a44b-047b72e67ac2':
                    return 2;
                    break;
                //    NORTHEN CAPE
                case 'f5fc8fad-992e-4051-8ce3-cd2bc2a56534':
                    return 3;
                    break;
                //    FREE STATE
                case '239b1799-2ded-4c50-a7e0-89bad0db74f6':
                    return 4;
                    break;
                //    KWAZULU NATAL
                case 'f92cbaef-d105-4c86-a6d2-a857e83848c2':
                    return 5;
                    break;
                //    NORTH WEST
                case 'b8b7febc-28a8-4cfc-bde9-f52c6bce1ed9':
                    return 6;
                    break;
                //    GAUTENG
                case '3ec3588f-5c50-407a-b93c-31287a9c55d0':
                    return 7;
                    break;
                //    MPUMALANGA
                case '1eb6958b-5dad-44c3-b4ab-e3f79b6831d6':
                    return 8;
                    break;
            }

        return false;

    }

    /**
     * CHECK TO SEE IF ROLE IN THE SELECTED NATIONAL PLANNERS
     * @param $role_id
     * @return bool
     */
    public static function infrastructurePlanner( $role_id ){

        $allPlannerRoles = [
            '69480e73-2a6a-4c51-bcaf-a264833586d6'
        ];

        $checkToSeeIfRole = in_array($role_id, $allPlannerRoles);

        if( $checkToSeeIfRole ){
            return $checkToSeeIfRole;
        }else{
            return false;
        }

    }

    /**
     * @param $role_id
     * @return bool
     */
    public static function strategicPlanner( $role_id ){

        $allPlannerRoles = [
            'd8b742fe-2ca8-4e47-99c9-09a8d64e8d48'
        ];

        $checkToSeeIfRole = in_array($role_id, $allPlannerRoles);

        if( $checkToSeeIfRole ){
            return $checkToSeeIfRole;
        }else{
            return false;
        }

    }

    /**
     * @param $x
     * @param $y
     * @param $scenario_id
     * @param $distance
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public static function solveODCostMatrix( $x, $y, $scenario_id, $distance, $skip, $take  ){

        try{

            $Esri = new Esri;

            if( !$x && !$y )
                return false;

            //  -------------------------   RUN TRIGGER TO INITIATE TRANSFER TO MASTER DATA
            $getEA = HipsScenarioEaVw::select('ea_code', 'latitude','longitude')
                ->where( 'scenario_id', $scenario_id )
                ->orderBy('ea_code', 'desc')
                ->skip($skip)
                ->take($take)
                ->get();

            $eaFeatures = array();

            //  -------------------------   BUILD FEATURES
            foreach($getEA as $v){

                array_push($eaFeatures, array(
                    "geometry" => array(
                        "x" => $v->latitude,
                        "y" => $v->longitude
                    ),
                    "attributes" => array(
                        "OBJECTID" => (int)$v->ea_code,
                        "Name"     => (int)$v->ea_code
                    )
                ));

            }

            //  -------------   GET REFRESH TOKEN
            $getToken = $Esri->getRefreshToken(
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

            $responseMatrix = $Esri
                ->originDestinationCostMatrix( env('ESRI_COST_MATRIX'), [], array(
                    "origins" => '{
                         "spatialReference": {
                            "wkid": 4326
                          },
                          "features" => '. json_encode($eaFeatures) .'
                    }',
                    "destinations"  => '{
                      "spatialReference": {
                        "wkid": 4326
                      },
                      "features": [
                        {
                          "geometry": {
                            "x": ' . json_encode($x) . ',
                            "y":' . json_encode($y) . '
                          },
                          "attributes": {
                            "OBJECTID": ' . json_encode($scenario_id) . ',
                            "Name": ' . json_encode($scenario_id) . '
                          }
                        }
                      ]
                    }',
                    "barriers"          => "",
                    "polylineBarriers"      => "",
                    "polygonBarriers"      => "",
                    "defaultCutoff"      => "",
                    "defaultTargetDestinationCount" => "",
                    "outSR" => "",
                    "ignoreInvalidLocations" => "true",
                    "accumulateAttributeNames" => "Kilometers,+Minutes",
                    "impedanceAttributeName" => "Minutes",
                    "restrictionAttributeNames" => "Oneway,+RestrictedTurns,+Avoid+Service+Roads,+Avoid+Pedestrian+Zones,+Avoid+Walkways,+Avoid+Roads+for+Authorities,+Avoid+Private+Roads,+Avoid+Roads+Under+Construction,+Through+Traffic+Prohibited",
                    "attributeParameterValues" => "",
                    "restrictUTurns" => "esriNFSBAtDeadEndsAndIntersections",
                    "useHierarchy" => "true",
                    "outputType" => "esriNAODOutputSparseMatrix",
                    "returnOrigins" => "false",
                    "returnDestinations" => "false",
                    "returnBarriers" => "false",
                    "returnPolylineBarriers" => "false",
                    "returnPolygonBarriers" => "false",
                    "geometryPrecision" => "",
                    "geometryPrecisionZ" => "",
                    "timeOfDay" => "",
                    "timeOfDayIsUTC" => "false",
                    "returnZ" => "false",
                    "travelMode" => "",
                    "overrides" => "",
                    "f"   => "pjson",
                    "token" => $getToken['token']
                ));

            //  ----------------    SAVE TO
            if( isset( $responseMatrix['data']['odCostMatrix'] ) && is_array( $responseMatrix['data']['odCostMatrix'] ) ){

                //  ---------   GET THE SCENARIO FACILITY ID
                $getScenarioFacilityId = HipsScenarioFacility::where('scenario_id', (int)$scenario_id)->where('is_request_facility', true)->first();

                foreach ( $responseMatrix['data']['odCostMatrix'] as $v => $k){

                    if( $v != 'costAttributeNames'){

                        HipsScenarioDriveTime::create([
                            "ea_code"       =>  $v,
                            "scenario_facility_id"   =>  $getScenarioFacilityId->scenario_facility_id,
                            "total_km"      =>  ($k[$scenario_id][0]) ? $k[$scenario_id][0]: null,
                            "total_minutes" =>  ($k[$scenario_id][1]) ? $k[$scenario_id][1]: null
                        ]);

                    }

                };

                //  -------------   ERROR PROVIDER CHECK
                if( isset($responseMatrix['data']['odCostMatrix']['original']['success'] )){

                    if($responseMatrix['data']['odCostMatrix']['original']['success'] == false){

                        //  --------------- LOG ERROR TO DB
                        event( new EventHistory( array(
                            'email'     => auth('sanctum')->user()->email,
                            'url '      => env('ESRI_COST_MATRIX'),
                            'error'     => $responseMatrix['data']['odCostMatrix']['original']['message']
                        ),'ESRI_DRIVE_TIME') );

                    }

                }

                return $responseMatrix['data']['odCostMatrix'];

            }else{

                $responseMatrix['data'];

            }

        }catch (\Illuminate\Database\QueryException $e){

            //  LOG TO DB
            event( new EventHistory( array(
                'email'     => auth('sanctum')->user()->email,
                'url '      => null,
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
                'url '      => null,
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }

    }

    /**
     * @param $x
     * @param $y
     * @param $originPoints
     * @param $queue_id
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public static function driveTimeAnalysis( $x, $y, $originPoints, $queue_id  ){

        try{

            $Esri = new Esri;

            if( !$x && !$y )
                return false;

            //  -------------   GET REFRESH TOKEN
            $getToken = $Esri->getRefreshToken(
                env('ESRI_GENERATE_TOKEN_URL'),
                array(),
                array(
                    "username" => env('ESRI_USERNAME'),
                    "password" => env('ESRI_PASSWORD'),
                    "client" => 'referer',
                    "referer" => env('ESRI_REFERER'),
                    "expiration" => '20160',
                    "f" => 'json'
                ));

            $responseMatrix = $Esri
                ->originDestinationCostMatrix( env('ESRI_COST_MATRIX'), [], array(
                    "origins" => '{
                         "spatialReference": {
                            "wkid": 4326
                          },
                          "features" => '. json_encode($originPoints) .'
                    }',
                    "destinations"  => '{
                      "spatialReference": {
                        "wkid": 4326
                      },
                      "features": [
                        {
                          "geometry": {
                            "x": ' . json_encode($x) . ',
                            "y":' . json_encode($y) . '
                          },
                          "attributes": {
                            "OBJECTID": ' . $queue_id . ',
                            "Name": ' . $queue_id . '
                          }
                        }
                      ]
                    }',
                    "barriers"          => "",
                    "polylineBarriers"      => "",
                    "polygonBarriers"      => "",
                    "defaultCutoff"      => "",
                    "defaultTargetDestinationCount" => "",
                    "outSR" => "",
                    "ignoreInvalidLocations" => "true",
                    "accumulateAttributeNames" => "Kilometers,+Minutes",
                    "impedanceAttributeName" => "Minutes",
                    "restrictionAttributeNames" => "Oneway,+RestrictedTurns,+Avoid+Service+Roads,+Avoid+Pedestrian+Zones,+Avoid+Walkways,+Avoid+Roads+for+Authorities,+Avoid+Private+Roads,+Avoid+Roads+Under+Construction,+Through+Traffic+Prohibited",
                    "attributeParameterValues" => "",
                    "restrictUTurns" => "esriNFSBAtDeadEndsAndIntersections",
                    "useHierarchy" => "true",
                    "outputType" => "esriNAODOutputSparseMatrix",
                    "returnOrigins" => "false",
                    "returnDestinations" => "false",
                    "returnBarriers" => "false",
                    "returnPolylineBarriers" => "false",
                    "returnPolygonBarriers" => "false",
                    "geometryPrecision" => "",
                    "geometryPrecisionZ" => "",
                    "timeOfDay" => "",
                    "timeOfDayIsUTC" => "false",
                    "returnZ" => "false",
                    "travelMode" => "",
                    "overrides" => "",
                    "f"   => "pjson",
                    "token" => $getToken['token']
                ));

            //  ----------------    SAVE TO
            if( isset( $responseMatrix['data']['odCostMatrix'] ) && is_array( $responseMatrix['data']['odCostMatrix'] ) ){


                return $responseMatrix['data']['odCostMatrix'];

            }else{

                $responseMatrix['data'];

            }

        }catch (\Illuminate\Database\QueryException $e){

            //  LOG TO DB
            event( new EventHistory( array(
                //'email'     => auth('sanctum')->user()->email,
                'url '      => null,
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                //'email'     => auth('sanctum')->user()->email,
                'url '      => null,
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }

    }

    /**
     * @param $role_id
     * @return bool
     */
    public static function getAllPermissions(){

         return SecCache::select('ref3')
            ->distinct()
            ->where('user_id', auth('sanctum')->user()->sec_user_id)
            ->get()
            ->toArray();

    }

}