<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SecRoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objectRoles = [
            [ 'role_id' => Str::uuid()->toString(), 'role_name'   =>  "App User",  'role'  => 1,  'role_group_id' => 0, 'role_type_id' => 0, 'role_status' => 1, 'role_is_profile' => 0 ],
            [ 'role_id' => Str::uuid()->toString(), 'role_name'   =>  "Adminstrator",  'role'  => 1,  'role_group_id' => 0, 'role_type_id' => 0, 'role_status' => 1, 'role_is_profile' => 0 ]
        ];

        DB::table('sec_role')->insert($objectRoles);
    }
}
