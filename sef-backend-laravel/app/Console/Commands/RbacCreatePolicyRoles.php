<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\MasterList\Address;

use App\Models\User;

use Enforcer;

class RbacCreatePolicyRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //  php artisan createPolicyRoles:run
    protected $signature = 'createPolicyRoles:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create necessary Policy Roles to Casbin.';

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

        $getAllDistricts = Address::distinct('District')->get();

        foreach ( $getAllDistricts as &$address ) {

            if(!$getAllDistricts || !$address){
                return;
            }

            //  Run ADD ROLE TO DISTRICT
            //Enforcer::addRoleForUser( $address->FacilityGUID, $address->District );

            //  RUN ROLE ON EACH USER
            $getAllUsers = User::get();

            foreach( $getAllUsers as $user ){

                Enforcer::addRoleForUser( $user->id, $address->District );
                //Enforcer::addRoleForUser( $user->id, $address->FacilityGUID );

            }

            //  ADD POLICY TO DISTRICT TO VIEW MAPS
            Enforcer::addPolicy( $address->FacilityGUID, $address->District, 'view');

        }

    }

}
