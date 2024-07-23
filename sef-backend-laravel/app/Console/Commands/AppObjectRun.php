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

class AppObjectRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //  php artisan appObjectRun:run --mainUser=gzampetakis@syneru.com
    //  sudo docker exec -ti 9ce3afe2cdd2 php artisan appObjectRun:run --mainUser=gzampetakis@syneru.com
    protected $signature = 'appObjectRun:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create necessary roles and components.';

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

            //  CREATE APP TO PROTECT
            $app = App::create([
                'app_id'    =>  Str::uuid()->toString(),
                'app_name'  =>  'react',
                'type'      =>  1
            ]);

            //  CREATE A CLASS TO PROTECT
            $appClass = AppClass::create([
                'class_id'   => Str::uuid()->toString(),
                'class_type' => '2',
                'class_schema' => 'etl_mfl_dev',
                'class_name'   => 'app',
                'display_name'  => 'app',
                'pk_field'      => null
            ]);

            //  SEC PERMISSION CREATE
            $secPermission = SecPermission::create([
                'permission_id'  =>  Str::uuid()->toString(),
                'permission_name'  =>  'Main React App',
                'class_id'     =>  $appClass->class_id,
                'ref1'          =>  null,
                'ref2'          =>  null,
                'ref3'          =>  $app->app_id,
                'ref_type'      =>  '3',
                'can_view'      =>  '1',
                'can_edit'      =>  '0',
                'can_delete'    =>  '0',
                'can_execute'   =>  '0',
                'can_custom'    =>  '0',
            ]);

            //  GET ROLE
            $getRole = SecRole::where('role_name', 'App User')->first();

            if($getRole){

                //  LINK PERMISSION WITH ROLE
                SecPermissionLink::create([
                    'p_link_id' =>  Str::uuid()->toString(),
                    'role_id'   =>  $getRole->role_id,
                    'permission_id' =>  $secPermission->permission_id
                ]);

            }

            //  GET USER
            $getUser = User::where('email', $this->option('mainUser') )->first();

            //  GET ROLE
            $getRole = SecRole::where('role_name', 'App User')->first();

            if($getUser){

                //  BIND USER TO ROLE
                SecRoleUser::create([
                    'role_user_id'  =>  Str::uuid()->toString(),
                    'user_id'       =>  $getUser->sec_user_id,
                    'role_id'       =>  $getRole->role_id
                ]);

            }

            $appComponentIdDashboard = Str::uuid()->toString();

            //  SECURE APP CLASS
            $appClassComponent = AppClass::create([
                'class_id'      => Str::uuid()->toString(),
                'class_type'    => '1',
                'class_schema'  => 'master_app',
                'class_name'    => 'app_component_instance',
                'display_name'  => 'App Component Instance',
                'pk_field_name' => 'app_component_instance_id'
            ]);

            //  SECURE APP COMPONENT AND INSTANCE
            $appComponentDashBoard = AppComponent::create([
                'app_component_id'  =>  $appComponentIdDashboard,
                'component_name'    =>  'Dashboard',
                'route'             =>  '/dashboard',
                'display_name'      =>  'Dashboard',
                'icon'              =>  'dashboard',
                'json_params'       =>  json_encode(array('key' => 'dashboard', 'url' => '/dashboard'))
            ]);

            //  SEC PERMISSION CREATE
            $secPermissionDashboard = SecPermission::create([
                'permission_id'    =>  Str::uuid()->toString(),
                'permission_name'  =>  'component_dashboard',
                'class_id'         =>  $appClassComponent->class_id,
                'ref1'             =>  null,
                'ref2'             =>  null,
                'ref3'             =>  $appComponentIdDashboard,
                'ref_type'         =>  '3',
                'can_view'         =>  '1',
                'can_edit'         =>  '1',
                'can_delete'       =>  '1',
                'can_execute'      =>  '1',
                'can_custom'       =>  '0',
            ]);

            //  LINK PERMISSION WITH ROLE
            SecPermissionLink::create([
                'p_link_id' =>  Str::uuid()->toString(),
                'role_id'   =>  $getRole->role_id,
                'permission_id' =>  $secPermissionDashboard->permission_id
            ]);

            SecCache::create([
                'user_id'       => $getUser->sec_user_id,
                'permission_id'  =>  Str::uuid()->toString(),
                'permission_name' =>  'component_dashboard',
                'class_id'     =>  $appClassComponent->class_id,
                'ref1'          =>  null,
                'ref2'          =>  null,
                'ref3'          =>  $appComponentIdDashboard,
                'ref_type'      =>  '3',
                'can_view'      =>  '1',
                'can_edit'      =>  '1',
                'can_delete'    =>  '1',
                'can_execute'   =>  '1',
                'can_custom'    =>  '0',
                'role_id'       => $getRole->role_id
            ]);

            $appComponentInstanceDashBoard1 = AppComponentInstance::create([
                'app_component_instance_id'  =>  Str::uuid()->toString(),
                'component_id'  =>  $appComponentIdDashboard,
                'content_name'  =>  'DashBoard 1',
                'json_params'   =>  '{}'
            ]);

            AppComponentInstanceLink::create([
                'app_component_instance_id'     =>  $appComponentInstanceDashBoard1->app_component_instance_id,
                'app_id'                        =>  $app->app_id
            ]);

            $appComponentInstanceDashBoard2 = AppComponentInstance::create([
                'app_component_instance_id'  =>  Str::uuid()->toString(),
                'component_id'  =>  $appComponentIdDashboard,
                'content_name'  =>  'DashBoard 2',
                'json_params'   =>  '{}'
            ]);

            AppComponentInstanceLink::create([
                'app_component_instance_id'     =>  $appComponentInstanceDashBoard2->app_component_instance_id,
                'app_id'                        =>  $app->app_id
            ]);

            $appComponentInstanceDashBoard3 = AppComponentInstance::create([
                'app_component_instance_id'  =>  Str::uuid()->toString(),
                'component_id'  =>  $appComponentIdDashboard,
                'content_name'  =>  'DashBoard 3',
                'json_params'   =>  '{}'
            ]);

            AppComponentInstanceLink::create([
                'app_component_instance_id'     =>  $appComponentInstanceDashBoard3->app_component_instance_id,
                'app_id'                        =>  $app->app_id
            ]);

            //  STEP 3, SECURE APP COMPONENT AND INSTANCE WITH PERMISSION
            $appComponentIdMap = Str::uuid()->toString();

            $appComponentMap = AppComponent::create([
                'app_component_id'  =>  $appComponentIdMap,
                'component_name'    =>  'Map',
                'route'             =>  '/map',
                'display_name'      =>  'Map',
                'icon'              =>  'map',
                'json_params'       =>  json_encode(array('key' => 'map', 'url' => '/map'))
            ]);

            $secPermissionMap = SecPermission::create([
                'permission_id'    =>  Str::uuid()->toString(),
                'permission_name'  =>  'component_map',
                'class_id'      =>  $appClassComponent->class_id,
                'ref1'          =>  null,
                'ref2'          =>  null,
                'ref3'          =>  $appComponentIdMap,
                'ref_type'      =>  '3',
                'can_view'      =>  '1',
                'can_edit'      =>  '1',
                'can_delete'    =>  '1',
                'can_execute'   =>  '1',
                'can_custom'    =>  '0',
            ]);

            //  LINK PERMISSION WITH ROLE
            SecPermissionLink::create([
                'p_link_id' =>  Str::uuid()->toString(),
                'role_id'   =>  $getRole->role_id,
                'permission_id' =>  $secPermissionMap->permission_id
            ]);

            //  CREATE CACHE
            SecCache::create([
                'user_id'           => $getUser->sec_user_id,
                'permission_id'     =>  Str::uuid()->toString(),
                'permission_name'   =>  'component_map',
                'class_id'      =>  $appClassComponent->class_id,
                'ref1'          =>  null,
                'ref2'          =>  null,
                'ref3'          =>  $appComponentIdMap,
                'ref_type'      =>  '3',
                'can_view'      =>  '1',
                'can_edit'      =>  '1',
                'can_delete'    =>  '1',
                'can_execute'   =>  '1',
                'can_custom'    =>  '0',
                'role_id'       => $getRole->role_id
            ]);

            $appComponentInstanceMap = AppComponentInstance::create([
                'app_component_instance_id'  =>  Str::uuid()->toString(),
                'component_id'  =>  $appComponentIdMap,
                'content_name'  =>  'Map',
                'json_params'   =>  '{}'
            ]);

            AppComponentInstanceLink::create([
                'app_component_instance_id'     =>  $appComponentInstanceMap->app_component_instance_id,
                'app_id'                        =>  $app->app_id
            ]);

        });

    }

}
