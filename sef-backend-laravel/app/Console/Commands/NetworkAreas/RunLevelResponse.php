<?php

namespace App\Console\Commands\NetworkAreas;

use App\Models\App;
use App\Models\AppClass;
use App\Models\AppComponent;
use App\Models\AppComponentInstance;
use App\Models\AppComponentInstanceLink;
use App\Models\MasterData\HipsServiceArea;
use App\Models\MasterData\HipsServiceAreaFacility;
use App\Models\MasterData\HipsServiceAreaJob;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RunLevelResponse extends Command
{

    //  ----------  CUSTOM ESRI PROVIDER
    protected $customEsri;

    /**
     * The name and signature of the console command.
     * todo PROCESS HAS CHANGED AND MOVED TO CONTROLLER
     * @var string
     */
    //  php artisan RunLevelResponse:run --jobId="jd597a557d95b41ab88550f7be8ddb503"
    //  sudo docker exec -ti backend-master-development.app-1 php artisan RunLevelResponse:run --jobId="jd597a557d95b41ab88550f7be8ddb503"
    protected $signature = 'RunLevelResponse:run {--jobId=} {--service_area_job_id=} {--status=}';

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

        $responseServiceAreaResponse = $this->customEsri
            ->getProgressOnJob( env('ESRI_JOB_PROGRESS').'/'.$this->option('jobId').'/results/Service_Areas', array(
                "f"                 => "pjson",
                "token"             => $getToken['token']
            ) );

        //  TRANSACTION
        DB::transaction(function() use ( $responseServiceAreaResponse ) {

            $getJob = HipsServiceAreaJob::find( $this->option('service_area_job_id') );
            $getJob->status = $this->option('status');
            $getJob->last_polled_dt = Carbon::now();
            $getJob->end_dt = Carbon::now();
            $getJob->payload = json_encode( $responseServiceAreaResponse );
            $getJob->save();

            $this->info( 'Payload and response from API ready and written to DB for JOB ID: ' . $this->option('service_area_job_id'));

            //  --------------- PROGRESS BAR
            $progressNumber = count($responseServiceAreaResponse['data']['value']['features']);

            $this->info( 'Writing facilities geometries into service area for JOB ID: ' . $this->option('service_area_job_id'));

            $this->output->progressStart($progressNumber);

            //  --------------- SAVE
            foreach( $responseServiceAreaResponse['data']['value']['features'] as $feature ){

                $getShape = DB::connection('pgsqlMasterData')->select( DB::raw("SELECT public.ST_GeomFromGeoJSON('{\"type\":\"Polygon\" , \"coordinates\" : ". json_encode($feature['geometry']['rings'])." }')") );

                HipsServiceArea::create([
                    'service_area_def_id'     => $getJob->service_area_def_id,
                    'facility_id'             => strtolower(str_replace (array('{', '}'), '' , $feature['attributes']['Name_1'])),
                    'shape'                   => $getShape[0]->st_geomfromgeojson,
                    'shape_length'            => $feature['attributes']['Shape_Length'],
                    'shape_area'              => $feature['attributes']['Shape_Area'],
                    'break_value'             => $feature['attributes']['ToBreak'],
                ]);

                $this->output->progressAdvance();

            }

            $this->output->progressFinish();

        });

    }

}
