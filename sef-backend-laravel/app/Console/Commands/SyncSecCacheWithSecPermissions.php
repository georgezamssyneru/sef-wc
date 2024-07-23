<?php

namespace App\Console\Commands;

use App\Models\SecRoleUser;
use App\Models\User;
use Illuminate\Console\Command;

use Enforcer;
use Illuminate\Support\Facades\DB;

class SyncSecCacheWithSecPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //  sudo docker exec -ti app_hips php artisan appSyncSecCacheWithSecPermission:run
    protected $signature = 'appSyncSecCacheWithSecPermission:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync sec_cache with sec_permissions';

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

        $users = User::select('sec_user_id')->get();

        foreach ($users as $user) {

            DB::connection('pgsqlMasterApp')
                ->select("call pop_sec_cache('".$user->sec_user_id."')");

        }

        return true;

    }

}
