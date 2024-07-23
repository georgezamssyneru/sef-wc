<?php

namespace App\Console\Commands;

use App\Models\App;
use App\Models\AppClass;
use App\Models\AppComponent;
use App\Models\AppComponentInstance;
use App\Models\AppComponentInstanceLink;
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

class CreateRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //  php artisan createRole:run
    //  sudo docker exec -ti backend-master_development.app_1 php artisan createAppRole:run --roleName="Facility Editor"
    protected $signature = 'createAppRole:run {--roleName=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create roles on hips table.';

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
     *
     * @return int
     */
    public function handle()
    {

        //  TRANSACTION
        DB::transaction(function()
        {

            $role_id = Str::uuid()->toString();

            //  SECURE APP COMPONENT AND INSTANCE
            $appRole = SecRole::create([
                'role_id'  =>  $role_id,
                'role_name'    =>  $this->option('roleName'),
                'role'              =>  '1',
                'role_group_id'     =>  '0',
                'role_type_id'      =>  '0',
                'role_status'       =>  '1',
                'role_is_profile'   =>  '0'
            ]);

        });

    }

}
