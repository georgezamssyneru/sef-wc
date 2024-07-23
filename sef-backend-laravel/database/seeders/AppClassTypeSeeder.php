<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //  php artisan db:seed --class=AppObjectTypeSeeder

    public function run()
    {
        $objectTypes = [
            ['type_description' => 'database'],
            ['type_description' => 'react_app']
        ];

        DB::table('app_class_type')->insert($objectTypes);

    }
}
