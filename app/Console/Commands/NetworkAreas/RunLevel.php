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
use Carbon\Carbon;
use Illuminate\Console\Command;

use App\Models\MasterList\Address;

use App\Models\User;

use Enforcer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class RunLevel extends Command
{

    //  ----------  CUSTOM ESRI PROVIDER
    protected $customEsri;

    /**
     * The name and signature of the console command.
     * todo PROCESS HAS CHANGED AND MOVED TO CONTROLLER
     * @var string
     */
    //  php artisan RunLevel:run --facilities="" --service_area_type_id=""
    //  sudo docker exec -ti backend-master-development.app-1 php artisan RunLevel:run
    protected $signature = 'RunLevel:run {--facilities=} {--service_area_type_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run level service area for network planner.';

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

        $getServiceArea = HipsServiceAreaDef::where('service_area_type_id', $this->option('service_area_type_id'))
            ->first();

        //  --------------  DONT RUN IF THERE IS NOTHING
        if(!$getServiceArea)
            return;

        //  GET COLUMN SCHEMA
        $hipsServiceAreaTableColumn = new HipsServiceAreaDef;

        $columns = $hipsServiceAreaTableColumn->getTableColumns();

        $fixedFiltered = array(
            "facilities"  => '{
                        "displayFieldName": "",
                        "geometryType": "esriGeometryPoint",
                        "spatialReference": {
                            "wkid": 4326,
                            "latestWkid": 4326
                        },
                        "fields": [{
                                "name": "OBJECTID",
                                "type": "esriFieldTypeOID",
                                "alias": "OBJECTID"
                            },
                            {
                                "name": "Name",
                                "type": "esriFieldTypeString",
                                "alias": "Name",
                                "length": 500
                            }
                        ],
                        "features": ' . json_encode($this->option('facilities')) . ',
                        "exceededTransferLimit": false
                    }',
            "f"          => 'pjson',
            "token"      => $getToken['token']
        );

        //  -------------   BUILD QUERY
        foreach( $columns as $column ){

            if( $column != 'service_area_id' || $column != 'service_area_type_id' ){

                $fixedFiltered[$column] = $getServiceArea[$column];

            }

        }

        $responseServiceArea = $this->customEsri
            ->networkAnalysisServiceAreas( env('ESRI_SUBMIT_JOB'),
                [],
                $fixedFiltered);

        //  ------------    RESPONSE SERVICE AREA.
        if( $responseServiceArea['success'] ){

            DB::transaction(function() use ($responseServiceArea, $getServiceArea)
            {

                //  --------------- LETS SAVE THE JOB SUBMITTED
                HipsServiceAreaJob::create([
                    'service_area_def_id' => $getServiceArea->service_area_def_id,
                    'status'              => $responseServiceArea['data']['jobStatus'],
                    'job_token'             => $responseServiceArea['data']['jobId'],
                    'start_dt'            => Carbon::now()
                ]);

            });

            $this->info( $responseServiceArea['data']['jobId'] );

        }

    }

}
