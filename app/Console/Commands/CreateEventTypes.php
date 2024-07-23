<?php

namespace App\Console\Commands;

use App\Models\App;
use App\Models\AppClass;
use App\Models\AppComponent;
use App\Models\AppComponentInstance;
use App\Models\AppComponentInstanceLink;
use App\Models\EventType;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateEventTypes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //  php artisan createAppEventType:run
    //  sudo docker exec -ti backend-master_development.app_1 php artisan createAppEventType:run --eventType="LOGIN_WRONG_THROTTLE"
    protected $signature = 'createAppEventType:run {--eventType=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create event types for logging.';

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
     * Execute the console command.
     */
    public function handle()
    {

        //  TRANSACTION
        DB::transaction(function()
        {

            //  SECURE APP COMPONENT AND INSTANCE
            EventType::create([
                'event_key'  =>  $this->option('eventType')
            ]);

        });

    }

}
