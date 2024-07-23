<?php

namespace App\Console\Commands;

use App\Models\SecRoleUser;
use App\Models\User;
use Illuminate\Console\Command;

use Enforcer;
use Illuminate\Support\Facades\DB;

class SyncSecCacheWithSecPermissionsAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //  sudo docker exec -ti app_hips php artisan appSyncSecCacheWithSecPermissionAll:run
    protected $signature = 'appSyncSecCacheWithSecPermissionAll:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync sec_cache with sec_permissions for all users.';

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
     * Run command and trigger.
     */
    public function handle()
    {

        DB::connection('pgsqlMasterApp')
            ->select("call pop_all_sec_cache()");

        return true;

    }

}
