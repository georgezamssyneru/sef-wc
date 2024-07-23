<?php

namespace App\Console\Commands;

use App\Jobs\ExcelJob;
use Hip\CustomAuth\Http\Controllers\AuthController;
use Illuminate\Console\Command;

use Enforcer;
use Illuminate\Queue\Queue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PingOomCalculator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ping:oom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fire a Job on rabbitMq.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function handle()
    {

        //ExcelJob::dispatch(array('success' =>  true))->onQueue('oomCalculatorReceiver');

        //  --------------- RUN STATE MACHINE
        $informationUser = array(
            'provider'  =>  '1',
            'expiry' => Carbon::now('UTC')->addMinutes( 20 )->format('Y-m-d H:i:s')
        );

        $sendUserSecure = AuthController::encryptWithData( $informationUser );

        //  ------------    DATA TO SEND
        $sendMessage = array(
            'correlation_id' => Str::uuid(),
            'token'          => $sendUserSecure,
            'SUB_ACUTE'  => '10',
            'LEVEL_1'    => '10',
            'TB'         => '10',
            'LEVEL_2'    => '10',
            'LEVEL_3_T1' => '10',
            'LEVEL_3_T2' => '10',
            'LEVEL_3_T3' => '10',
        );

        $queueManager = app('queue');
        $queue = $queueManager->connection('rabbitmq');
        $queue->pushRaw( json_encode($sendMessage), 'oomCalculatorReceiver');

    }

}
