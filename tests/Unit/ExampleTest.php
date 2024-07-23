<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Providers\RouteServiceProvider;

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\DatabaseTransactions;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPassExample()
    {
        $this->assertTrue(true);
    }

    // public function testFailExample()
    // {
    //     $this->assertTrue(false);
    // }

    // public function testBasciNavigation()
    // {
    //     $response = $this->get('/');
    //     print("\n============================\n");
    //     print($response . "\n");
    //     print("\n============================\n");
    //     $response->assertStatus(200);
    // }

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('http://10.73.1.6:1337');

        $response->assertStatus(200);
    }

    public function test_login_screen_can_be_rendered_local_host()
    {
        $response = $this->get('http://localhost:3000');

        $response->assertStatus(200);
    }
}
