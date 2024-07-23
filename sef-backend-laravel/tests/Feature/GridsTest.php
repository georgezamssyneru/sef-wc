<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class GridsTest extends TestCase
{
    /**
     * TESTING A UAMP GRID IS FUNCTIONING
     *
     * @return void
     */
    public function test_check_that_grid_loads()
    {

        $userData = [
            "email"     => env('USERNAME_TEST_USER'),
            "password"  => env('PASSWORD_TEST_USER')
        ];

        $this->json('POST',
            'http://10.73.1.6:9002/api/login',
            $userData,
            ['Accept' => 'application/json']);

        $response = $this->get('http://10.73.1.6:9002/api/gridEditing?skip=0&take=30&requireTotalCount=true&sort=[{"selector":"uamp_id","desc":false}]&gridId="dd40c655-fa3a-4d41-8d3b-ba3064165a41"');

        $getResponseData = $response->getContent();

        $res_array = (array)json_decode($getResponseData);

        // Log:info(json_encode($getResponseData));

        $this->assertArrayHasKey('data', $res_array);

    }

    /**
     * TESTING META DATA TYPES
     *
     * @return void
     */
    public function test_meta_data_types()
    {

        $userData = [
            "email"     => env('USERNAME_TEST_USER'),
            "password"  => env('PASSWORD_TEST_USER')
        ];

        $this->json('POST',
            'http://10.73.1.6:9002/api/login',
            $userData,
            ['Accept' => 'application/json']);

        $response = $this->get('http://10.73.1.6:9002/api/getAllMetaDataTypesFromLookups?gridId=dd40c655-fa3a-4d41-8d3b-ba3064165a41');

        $getResponseData = $response->getContent();

        $res_array = (array)json_decode($getResponseData);

        //Log:info(json_encode($getResponseData));

        $this->assertArrayHasKey('data', $res_array);

    }

}
