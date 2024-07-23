<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = [
            [ 'user_status' => 'INACTIVE' ],
            [ 'user_status' => 'ACTIVE' ]
        ];

        DB::table('sec_user_status')->insert($object);
    }
}
