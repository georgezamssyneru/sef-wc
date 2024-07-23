<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Jobs\RabbitMQJob as BaseJob;
use App\Jobs\ExcelJob;

class RabbitMQJob extends BaseJob
{
    /**
     * Get the decoded body of the job.
     *
     * @return array
     */
    public function payload()
    {

        $body = json_decode( $this->getRawBody(), true );

        //  --------------  CHECK IF SENDING FROM APP OR 3rd PARTY
        if(isset($body['data']['job'])){
            echo 'Event: Normal JOB' . PHP_EOL;
            return [
                'job'  => $body['data']['job'],
                'data' => json_decode( $this->getRawBody(), true )
            ];
        }else{
            return [
                'job'  => 'App\Jobs\ExcelJob@getMessage',
                'data' => json_decode( $this->getRawBody(), true )
            ];
        }

    }

}