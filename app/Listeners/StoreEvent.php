<?php

namespace App\Listeners;

use App\Events\EventHistory;
use App\Models\Event;
use App\Models\EventType;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreEvent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param EventHistory $event
     * @return bool
     */
    public function handle( EventHistory $event )
    {

        $eventId = Str::uuid()->toString();

        $getKey = EventType::where('event_key', $event->typeEvent )->first();

        $userinfo = $event->user;

        if(!$getKey)
            return false;

        //  -------------   LOGIN FAIL OR NO USER INFORMATION AVAILABLE.
        if( $event->typeEvent == 'LOGIN_FAIL' || is_array($event->user) ){

            $saveHistory =  DB::table('event')->insert(
                [
                    'event_id' => $eventId,
                    'event_type_id' => $getKey->event_type_id,
                    'sec_user_id' => null,
                    'metadata'    => json_encode($event->user),
                    'created_at'  => Carbon::now()->toDateTimeString(),
                    'updated_at'  => Carbon::now()->toDateTimeString()
                ]
            );
            return $saveHistory;

        }

        $saveHistory =  DB::table('event')->insert(
            [
                'event_id' => $eventId,
                'event_type_id' => $getKey->event_type_id,
                'sec_user_id' => $userinfo->sec_user_id,
                'metadata'    => null,
                'created_at'  => Carbon::now()->toDateTimeString(),
                'updated_at'  => Carbon::now()->toDateTimeString()
            ]
        );
        return $saveHistory;

    }

}
