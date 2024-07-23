<?php

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Console\Command;

use Enforcer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RunSuperSetChartImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //  php artisan runSuperSetChartImages:run
    //  sudo docker exec -ti backend-master_development.app_1 php artisan runSuperSetChartImages:run
    protected $signature = 'runSuperSetChartImages:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run all chart images to save to folder for display.';

    protected $superset;

    protected $workflowApi;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(\App\ExternalProviders\WorkflowApi $workflowApi, \App\ExternalProviders\Superset $superset)
    {

        parent::__construct();

        $this->workflowApi = $workflowApi;

        $this->superset = $superset;

    }

    /**
     *  SAVE IMAGES
     */
    public function saveImages( $getCharts ){

        foreach ($getCharts['ids'] as &$id ){

            $contents = file_get_contents( env('WORKLFLOW_SUPERSET') . $id );

            if($contents){

                $name = $id.'.jpg';
                //  ---------   DELETE IMAGE BEFORE UPLOADING
                Storage::disk('superset')->delete( env('WORKLFLOW_SUPERSET') . $id );
                Storage::disk('superset')->put( $name, $contents );

            }

        }

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        try {

            $page = 0;

//            $getAccessToken = $this->superset->getAccessGuestToken( env('SUPERSET_API') . '/api/v1/security/login', [], array(
//                "password" => env("SUPERSET_PASSWORD"),
//                "provider" => "db",
//                //"refresh" => "true",
//                "username" => env("SUPERSET_USERNAME"),
//            ));
//
//            $getCharts = $this->superset->getCharts( env('SUPERSET_API') . '/api/v1/chart/?q={"page": 0,"page_size": 100}', array(
//                "Authorization" => "Bearer " . $getAccessToken['access_token']
//            ), array(
//                //'force' => true
//            ));

            //  ------- ALLOW ONLY CERTAIN CHARTS
            $getCharts = array(
                'ids' => array('982','993','967','968')
            );

            if(!$getCharts['ids'])
                $this->info('NO IDS');

            //  ------  SAVE IMAGES
            self::saveImages( $getCharts );

//            $howManyTimesToRun = ceil($getCharts['count'] / 100);
//
//            while ($howManyTimesToRun >= $page + 1) {
//
//                $page++;
//
//                $runCheck = $this->superset->getCharts( env('SUPERSET_API') . '/api/v1/chart/?q={"page": '.$page.',"page_size": 100}', array(
//                    "Authorization" => "Bearer " . $getAccessToken['access_token']
//                ), array(
//                    //'force' => true
//                ));
//
//                self::saveImages( $runCheck );
//
//            }

            $this->info('The command was successful!');


        }catch (\Illuminate\Database\QueryException $e) {

            dd($e->getMessage());

        }catch(\Exception $e){

            dd($e->getMessage());

        }

    }

}
