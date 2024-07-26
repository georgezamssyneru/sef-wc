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

        try {
            
            // Execute the stored procedure within the specified schema
            DB::executeProcedure('MASTER_APP.POP_ALL_SEC_CACHE');
            
            // Return true if the procedure executes successfully
            return true;

        } catch (\Exception $e) {
            // Log the error message
            //Log::error('Error executing stored procedure MASTER_APP.POP_ALL_SEC_CACHE: ' . $e->getMessage());
            
            // Optionally, handle the exception (e.g., return false or throw the exception)
            return false; // or throw $e; if you want to propagate the exception
        }

    }

}
