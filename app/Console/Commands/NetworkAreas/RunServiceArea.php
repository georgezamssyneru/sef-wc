<?php

namespace App\Console\Commands\NetworkAreas;

use App\Models\App;
use App\Models\AppClass;
use App\Models\AppComponent;
use App\Models\AppComponentInstance;
use App\Models\AppComponentInstanceLink;
use App\Models\MasterData\HipsFacilityTl;
use App\Models\MasterData\HipsFacilityTlServiceArea;
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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RunServiceArea extends Command
{

    //  ----------  CUSTOM ESRI PROVIDER
    protected $customEsri;

    protected $workflowApi;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'RunServiceArea:run {--features=} {--service_area_def_id=} {--service_area_job_id=} {--getServiceAreatype}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run all features on a Job.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct( \App\ExternalProviders\Esri $customEsri, \App\ExternalProviders\WorkflowApi $workflowApi  )
    {

        parent::__construct();

        $this->customEsri = $customEsri;

        $this->workflowApi = $workflowApi;

    }

    /**
     * Execute the console command.
     */
    public function handle()
    {

        //  ------------------- TRANSACTION
        if($this->option('features')){

            //  Log::channel('info', count($this->option('features')));

            //  --------------- SAVE
            foreach( $this->option('features') as $feature ) {

                $getGeomWkt = $this->workflowApi->getGeomWkt( env('PYTHON_CALC_FEATURE'), [], array(
                    "feature" => $feature['geometry']['rings'],
                ));

                $getShape = DB::connection('pgsqlMasterData')
                    ->select(DB::raw("SELECT public.ST_GeomFromText('".$getGeomWkt['data']."',4326)"));

                $isValid = DB::connection('pgsqlMasterData')
                    ->select(DB::raw("SELECT public.ST_IsValid('".$getShape[0]->st_geomfromtext."')"));

                if( $isValid[0]->st_isvalid ){

                    HipsServiceArea::create([
                        'service_area_def_id'     => $this->option('service_area_def_id'),
                        'service_area_job_id'     => $this->option('service_area_job_id'),
                        'facility_id'             => strtolower(str_replace (array('{', '}'), '' , $feature['attributes']['Name_1'])),
                        'shape'                   => $getShape[0]->st_geomfromtext,
                        'shape_length'            => $feature['attributes']['Shape_Length'],
                        'shape_area'              => $feature['attributes']['Shape_Area'],
                        'break_value'             => $feature['attributes']['ToBreak']
                    ]);

                }

            }

        }

    }

}