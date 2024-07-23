<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecLogRegistrationOutcome extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = [
            [ 'outcome' => 'APPROVED' ],
            [ 'outcome' => 'DENIED' ]
        ];

        DB::table('sec_log_registration_outcome')->insert($object);
    }
}
