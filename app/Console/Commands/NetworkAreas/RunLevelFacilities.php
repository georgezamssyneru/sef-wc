<?php

namespace App\Console\Commands\NetworkAreas;

use App\Models\App;
use App\Models\AppClass;
use App\Models\AppComponent;
use App\Models\AppComponentInstance;
use App\Models\AppComponentInstanceLink;
use App\Models\MasterData\HipsServiceArea;
use App\Models\MasterData\HipsServiceAreaDef;
use App\Models\MasterData\HipsServiceAreaJob;
use App\Models\MasterData\HipsServiceAreaType;
use App\Models\MasterList\Facility;
use App\Models\SecCache;
use App\Models\SecPermission;
use App\Models\SecPermissionLink;
use App\Models\SecRole;
use App\Models\SecRoleUser;
use Illuminate\Console\Command;

use App\Models\MasterList\Address;

use App\Models\User;

use Enforcer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RunLevelFacilities extends Command
{

    //  ----------  CUSTOM ESRI PROVIDER
    protected $customEsri;

    /**
     * The name and signature of the console command.
     *  todo PROCESS HAS CHANGED AND MOVED TO CONTROLLER
     * @var string
     */
    //  php artisan RunLevelFacilities:run
    //  sudo docker exec -ti backend-master-development.app-1 php artisan RunLevelFacilities:run
    protected $signature = 'RunLevelFacilities:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all facilities ready to send JOB.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct( \App\ExternalProviders\Esri $customEsri )
    {

        parent::__construct();

        $this->customEsri = $customEsri;

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        //  -------------   GET REFRESH TOKEN
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

        //  --------------  GET ALL SERVICE AREAS TO RUN
        $serviceAreas = HipsServiceAreaType::get();

        foreach($serviceAreas as $service){

            $responseServiceArea = $this->customEsri
                ->mapServerQuery( env('ESRI_SERVICE_QUERY'), array(
                    "where"             => $service->layer_filter,
                    "outFields"         => "facility_id,ESRI_OID",
                    "returnGeometry"    => "true",
                    "resultOffset"      => "0",
                    "resultRecordCount" => "100",
                    "f"                 => "pjson",
                    "token"             => $getToken['token']
                ) );

            if( !isset($responseServiceArea['data']['error']) ){

                //  ------------------  GET READY TO QUERY
                $featureFacility = array();

                if(isset($responseServiceArea['data']['features'])){

                    foreach ( $responseServiceArea['data']['features'] as $key => $value) {

                        $temp = array(

                            'attributes' => array(
                                'OBJECTID'    => $value['attributes']['ESRI_OID'],
                                'Name'        => "".$value['attributes']['facility_id'].""
                            ),
                            'geometry'   => array(
                                'x'           => $value['geometry']['x'],
                                'y'           => $value['geometry']['y']
                            )

                        );

                        array_push( $featureFacility, $temp );

                    }

                }

                //  ------------------- INITIATE SUBMIT JOB
                if( count($featureFacility) > 0 ){

                    //  ---------------------   SUBMIT JOB
                    $this->call('RunLevel:run', [
                        '--facilities'              => $featureFacility,
                        '--service_area_type_id'    => $service->service_area_type_id
                    ]);

                }

            }else{

                $getServiceArea = HipsServiceAreaDef::where('service_area_type_id', $service->service_area_type_id )
                    ->first();

                if( $getServiceArea ){

                    //  --------------- LETS SAVE THE JOB SUBMITTED
                    HipsServiceAreaJob::create([
                        'service_area_def_id' => $getServiceArea->service_area_def_id,
                        'status'              => 'failed',
                        'job_msg'             => $responseServiceArea['data']['error']['message'],
                        'start_dt'            => Carbon::now()
                    ]);

                }

            }

        }

    }

}
