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

class AssignAdminRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //  php artisan assignAdminRole:run --adminUser=gzampetakis@syneru.com
    //  sudo docker exec -ti 9ce3afe2cdd2 php artisan assignAdminRole:run  --adminUser=gzampetakis@syneru.com
    protected $signature = 'assignAdminRole:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign admin role to a specific user.';

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

            $adminComponentId = Str::uuid()->toString();

            $permissionId = Str::uuid()->toString();

            //  GET ROLE
            $getRole = SecRole::where('role_name', 'Adminstrator')->first();

            //  GET USER
            $getUser = User::where('email', $this->option('adminUser') )->first();

            SecPermission::create([
                'permission_id'    =>  $permissionId,
                'permission_name'  =>  'component_adminstrator',
                'class_id'      =>  env('APP_MAIN_APP_INSTANCE'),
                'ref1'          =>  null,
                'ref2'          =>  null,
                'ref3'          =>  $adminComponentId,
                'ref_type'      =>  '3',
                'can_view'      =>  '1',
                'can_edit'      =>  '1',
                'can_delete'    =>  '1',
                'can_execute'   =>  '1',
                'can_custom'    =>  '0',
            ]);

            if($getRole){

                //  LINK PERMISSION WITH ROLE
                SecPermissionLink::create([
                    'p_link_id' =>  Str::uuid()->toString(),
                    'role_id'   =>  $getRole->role_id,
                    'permission_id' =>  $permissionId
                ]);

            }

            if($getUser){

                //  BIND USER TO ROLE
                SecRoleUser::create([
                    'role_user_id'  =>  Str::uuid()->toString(),
                    'user_id'       =>  $getUser->sec_user_id,
                    'role_id'       =>  $getRole->role_id
                ]);

            }

            //  SECURE APP COMPONENT AND INSTANCE
            $appComponentAdminstrator = AppComponent::create([
                'app_component_id'  =>  $adminComponentId,
                'component_name'    =>  'Adminstrator',
                'route'             =>  '/administrator',
                'display_name'      =>  'Administrator',
                'icon'              =>  'adminstrator',
                'json_params'       =>  json_encode(array('key' => 'administrator', 'url' => '/administrator'))
            ]);

            SecCache::create([
                'user_id'           => $getUser->sec_user_id,
                'permission_id'     =>  $permissionId,
                'permission_name'   =>  'component_adminstrator',
                'class_id'      =>  env('APP_MAIN_APP_INSTANCE'),
                'ref1'          =>  null,
                'ref2'          =>  null,
                'ref3'          =>  $adminComponentId,
                'ref_type'      =>  '3',
                'can_view'      =>  '1',
                'can_edit'      =>  '1',
                'can_delete'    =>  '1',
                'can_execute'   =>  '1',
                'can_custom'    =>  '0',
                'role_id'       => $getRole->role_id
            ]);

            $appComponentInstanceAdminstrator = AppComponentInstance::create([
                'app_component_instance_id'  =>  Str::uuid()->toString(),
                'component_id'  =>  $adminComponentId,
                'content_name'  =>  'Adminstrator',
                'json_params'   =>  '{}'
            ]);

            AppComponentInstanceLink::create([
                'app_component_instance_id'     =>  $appComponentInstanceAdminstrator->app_component_instance_id,
                'app_id'                        =>  env('APP_MAIN_REACT_APP')
            ]);

        });

    }

}
