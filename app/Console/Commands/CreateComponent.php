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

class CreateComponent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //  php artisan createComponent:run
    //  sudo docker exec -ti backend-master_development.app_1 php artisan createComponent:run --componentName="Grid Editing" --componentRoute='/grid-editing' --permission_name=component_grid_editing --componentDisplayName="Grid Editing" --contentName=GridEditing --componentIcon=editing --componentKey=gridEditing --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=7e711a11-16cb-49fb-a43a-20a0226c8947 --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  sudo docker exec -ti backend-master_development.app_1 php artisan createComponent:run --componentName=ScenarioPlanning --componentRoute='/scenario-planning' --permission_name=component_scenario --componentDisplayName=ScenarioPlanning --contentName=ScenarioPlanning --componentIcon=scenario --componentKey=scenario --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=1c9f632c-2160-4744-b6d1-965ddfe5122b --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  sudo docker exec -ti app_hips php artisan createComponent:run --componentName=Classes --componentRoute='/classes' --permission_name=grid_classes --componentDisplayName=Classes --contentName=Classes --componentIcon=classes --componentKey=classes --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=f702f382-3bbc-4df7-872a-657def6da1c9 --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  @todo push sudo docker exec -ti app_hips php artisan createComponent:run --componentName=Grids --componentRoute='/grids' --permission_name=grids --componentDisplayName=Grids --contentName=Grids --componentIcon=grids --componentKey=grids --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=f702f382-3bbc-4df7-872a-657def6da1c9 --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  @todo push sudo docker exec -ti backend-master_development.app_1 php artisan createComponent:run --componentName="App version" --componentRoute='/app-version' --permission_name=component_app_version --componentDisplayName="App version" --contentName=AppVersion --componentIcon=appVersion --componentKey=appVersion --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=1c9f632c-2160-4744-b6d1-965ddfe5122b --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  @todo push sudo docker exec -ti app_hips php artisan createComponent:run --componentName="App version" --componentRoute='/app-version' --permission_name=component_app_version_admin --componentDisplayName="App version Admin" --contentName=AppVersionAdmin --componentIcon=appVersion --componentKey=appVersion --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=f702f382-3bbc-4df7-872a-657def6da1c9 --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  @todo push sudo docker exec -ti app_hips php artisan createComponent:run --componentName="Data manager" --componentRoute='/data-manager' --permission_name=component_data_manager --componentDisplayName="Data Manager" --contentName="Data Manager" --componentIcon=dataManager --componentKey=dataManager --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id= --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  @todo push sudo docker exec -ti app_hips php artisan createComponent:run --componentName="Role manager" --componentRoute='/role-manager' --permission_name=component_role_manager --componentDisplayName="Role Manager" --contentName="Role Manager" --componentIcon=roleManager --componentKey=roleManager --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=f702f382-3bbc-4df7-872a-657def6da1c9 --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  @todo push sudo docker exec -ti app_hips php artisan createComponent:run --componentName="Backup manager" --componentRoute='/backup-manager' --permission_name="Backup Manager" --componentDisplayName="Backup Manager" --contentName="Backup Manager" --componentIcon=backupManager --componentKey=backupManager --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=f702f382-3bbc-4df7-872a-657def6da1c9 --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  @todo push sudo docker exec -ti app_hips php artisan createComponent:run --componentName="Facility Request" --componentRoute='/facility-request' --permission_name=component_facility_request --componentDisplayName="Facility request" --contentName="Facility Request" --componentIcon=facilityRequest --componentKey=facilityRequest --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=1c9f632c-2160-4744-b6d1-965ddfe5122b --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  @todo push sudo docker exec -ti app_hips php artisan createComponent:run --componentName="Forms manager" --componentRoute='/forms-manager' --permission_name="Forms Manager" --componentDisplayName="Forms Manager" --contentName="Forms Manager" --componentIcon=formsManager --componentKey=formsManager --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=f702f382-3bbc-4df7-872a-657def6da1c9 --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  @todo push sudo docker exec -ti app_hips php artisan createComponent:run --componentName="Reports manager" --componentRoute='/reports-manager' --permission_name="Reports Manager" --componentDisplayName="Reports Manager" --contentName="Reports Manager" --componentIcon=reportsManager --componentKey=reportsManager --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=f702f382-3bbc-4df7-872a-657def6da1c9 --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  php artisan createComponent:run --componentName='workflow_process' --componentRoute='/workflow' --permission_name=workflow_process --componentDisplayName='Workflow process' --contentName='Workflow process' --componentIcon=workflow --componentKey=workflow --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=f702f382-3bbc-4df7-872a-657def6da1c9 --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  php artisan createComponent:run --componentName='facility_request' --componentRoute='/facility-request' --permission_name=facility_request --componentDisplayName='Facility Request' --contentName='Facility Request' --componentIcon=facilityRequest --componentKey=facilityRequest --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=f702f382-3bbc-4df7-872a-657def6da1c9 --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  @todo push sudo docker exec -ti app_hips php artisan createComponent:run --componentName="Uamp" --componentRoute='/uamp' --permission_name=uamp --componentDisplayName="Uamp" --contentName="Uamp" --componentIcon=uamp --componentKey=uamp --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=1c9f632c-2160-4744-b6d1-965ddfe5122b --user_id=25613db8-3691-415d-b171-e8d8e3336d92
    //  @todo push sudo docker exec -ti app_wc php artisan createComponent:run --componentName="Map manager" --componentRoute='/mapManager' --permission_name=Map_Manager --componentDisplayName="Map Manager" --contentName="Map Manager" --componentIcon=mapManager --componentKey=mapManager --app_id=fbb419db-626c-4b02-9882-c50ad4b9f9df --class_id=e73e3d6b-2cf9-4ef0-bb94-18489735f4cd --role_id=f702f382-3bbc-4df7-872a-657def6da1c9 --user_id=992f833c-ba5d-437d-b314-7676f4d2d990

    protected $signature = 'createComponent:run 
    {--componentName=} 
    {--componentRoute=} 
    {--componentDisplayName=} 
    {--contentName=}
    {--permission_name=}
    {--componentIcon=}
    {--componentKey=} 
    {--app_id=} 
    {--class_id=} 
    {--role_id=} 
    {--user_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Component Section.';

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

            $appComponentIdReports = Str::uuid()->toString();

            //  SECURE APP COMPONENT AND INSTANCE
            $appComponentReports = AppComponent::create([
                'app_component_id'  =>  $appComponentIdReports,
                'component_name'    =>  $this->option('componentName'),
                'route'             =>  $this->option('componentRoute'),
                'display_name'      =>  $this->option('componentDisplayName'),
                'icon'              =>  $this->option('componentIcon'),
                'json_params'       =>  json_encode(array('key' => $this->option('componentKey'), 'url' => $this->option('componentRoute')))
            ]);

            $appComponentInstanceReports = AppComponentInstance::create([
                'app_component_instance_id'  =>  Str::uuid()->toString(),
                'component_id'  =>  $appComponentIdReports,
                'content_name'  =>  $this->option('contentName'),
                'json_params'   =>  '{}'
            ]);

            AppComponentInstanceLink::create([
                'app_component_instance_id'     =>  $appComponentInstanceReports->app_component_instance_id,
                'app_id'                        =>  $this->option('app_id')
            ]);

            $permissionId = Str::uuid()->toString();

            $secPermissionReports = SecPermission::create([
                'permission_id'    =>  $permissionId,
                'permission_name'  =>  $this->option('permission_name'),
                'class_id'      =>  $this->option('class_id'),
                'ref1'          =>  null,
                'ref2'          =>  null,
                'ref3'          =>  $appComponentIdReports,
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
                'role_id'   =>  $this->option('role_id'),
                'permission_id' =>  $secPermissionReports->permission_id
            ]);

            //  CREATE CACHE
            SecCache::create([
                'user_id'           => $this->option('user_id'),
                'permission_id'     =>  $permissionId,
                'permission_name'   =>  $this->option('permission_name'),
                'class_id'      =>  $this->option('class_id'),
                'ref1'          =>  null,
                'ref2'          =>  null,
                'ref3'          =>  $appComponentIdReports,
                'ref_type'      =>  '3',
                'can_view'      =>  '1',
                'can_edit'      =>  '1',
                'can_delete'    =>  '1',
                'can_execute'   =>  '1',
                'can_custom'    =>  '0',
                'role_id'       => $this->option('role_id')
            ]);

        });

    }

}
