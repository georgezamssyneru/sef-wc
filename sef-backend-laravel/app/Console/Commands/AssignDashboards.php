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

class AssignDashboards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //  php artisan assignDashboards:run
    //  sudo docker exec -ti e2edd999d0c2 php artisan assignDashboards:run
    protected $signature = 'assignDashboards:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert manually some dashboards.';

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
        $dashboard1 = AppComponentInstance::find('587b7cd9-2ee4-4d81-bacf-1248e7b5a866');
        $dashboard2 = AppComponentInstance::find('031bdb43-897b-4864-ac67-3a4a5d1535cb');
        $dashboard3 = AppComponentInstance::find('e5b91c84-db8e-4fd7-a199-5f8aacfc54f2');

        $dashboard1->json_params = json_encode(array(
            'width'  => false,
            'height' => false,
            'id'     => 'e6f882291f9e464f9b1de68bf6822728',
            'url'    => 'https://gis.smec.co.za/portal/apps/experiencebuilder/experience/'
        ));

        $dashboard1->save();

        $dashboard2->json_params = json_encode(array(
            'width'  => false,
            'height' => false,
            'id'     => '164b66e9547640148153771f0850c0bb',
            'url'    => 'https://gis.smec.co.za/portal/apps/dashboards/'
        ));

        $dashboard2->save();

//        $dashboard3->json_params = json_encode(array(
//            'width'  => false,
//            'height' => false,
//            'id'     => 'e6f882291f9e464f9b1de68bf6822728',
//            'url'    => 'https://gis.smec.co.za/portal/apps/experiencebuilder/experience/'
//        ));
//
//        $dashboard3->save();

    }

}
