<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->post('api/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {

        $userData = [
            "email" => "gzampetakis@syneru.com",
            "password" => "Log555QXL!"
        ];

        $this->json('POST',
            'api/login',
            $userData,
            ['Accept' => 'application/json'])->assertStatus(200);

//        $user = User::factory()->create();
//
//        $response = $this->post('api/login', [
//            'email' => $user->email,
//            'password' => 'password',
//        ]);
//
//        $this->assertAuthenticated();
//        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $userData = [
            "email" => "gzampetakis@syneru.com",
            'password' => 'wrong-password'
        ];

        $response = $this->json('POST',
            'api/login',
            $userData,
            ['Accept' => 'application/json'])->assertStatus(200);
        
        // print($response);
        // print_r($response);
        

        // $response->assertJson([
        //     'message' => 'The given data was invalid.',
        //     'errors' => [
        //         'email' => ['These credentials do not match our records.']
        //     ]
        // ]);

        // $response = $this->post('api/login', [
        //     'email' => $user->email,
        //     'password' => 'wrong-password',
        // ]);

        //Assert html code is unauthorized
        #print response
        
        // print_r($response->getContent());

        // $this->assertGuest();
    }

    public function test_users_can_not_authenticate_with_missing_password()
    {
        $user = User::factory()->create();

        $this->post('api/login', [
            'email' => $user->email,
            'password' => '',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_not_authenticate_with_missing_email()
    {
        $user = User::factory()->create();

        $this->post('api/login', [
            'email' => '',
            'password' => 'Password@1234',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_not_authenticate_with_missing_email_and_password()
    {
        $user = User::factory()->create();

        $this->post('api/login', [
            'email' => '',
            'password' => '',
        ]);

        $this->assertGuest();
    }

}
