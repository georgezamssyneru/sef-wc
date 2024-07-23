<?php

namespace App\Console\Commands\NetworkAreas;
use App\Models\MasterData\HipsServiceAreaJob;
use Illuminate\Console\Command;

use Enforcer;
class RunLevelProgress extends Command
{

    //  ----------  CUSTOM ESRI PROVIDER
    protected $customEsri;

    /**
     * The name and signature of the console command.
     * todo PROCESS HAS CHANGED AND MOVED TO CONTROLLER
     * @var string
     */
    //  php artisan RunLevelProgress:run --jobId="j240f4653c83b4295b989d4d959bda130"
    //  sudo docker exec -ti backend-master-development.app-1 php artisan RunLevelProgress:run --jobId="jd597a557d95b41ab88550f7be8ddb503"
    protected $signature = 'RunLevelProgress:run {--jobId=}';

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

        $runStatusSubmitted = HipsServiceAreaJob::where('status', 'esriJobSubmitted')->get();

        foreach($runStatusSubmitted as $job){

            if($job->job_token){

                $responseServiceAreaProgress = $this->customEsri
                    ->getProgressOnJob( env('ESRI_JOB_PROGRESS').'/'.$job->job_token, array(
                        "f"                 => "pjson",
                        "token"             => $getToken['token']
                    ) );

                if( $responseServiceAreaProgress['success'] ){

                    //  ------------------- CHECK IF JOB SUCCEEDED
                    if( $responseServiceAreaProgress['data']['jobStatus'] == 'esriJobSucceeded' ){

                        //  ---------------------   SUBMIT JOB
                        $this->call('RunLevelResponse:run', [
                            '--jobId'               => $responseServiceAreaProgress['data']['jobId'],
                            '--service_area_job_id' => $job->service_area_job_id,
                            '--status'              => $responseServiceAreaProgress['data']['jobStatus']
                        ]);

                    }

                }

            }

        }

    }

}