<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Facebook\WebDriver\WebDriverBy;

class LoginTest extends DuskTestCase
{
    /**
     * @throws \Exception
     * @throws \Throwable
     */
    public function testAllMissing()
    {
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user->firstName = "";
            $user->lastName = "";
            $user->email = "";
            $user->password = "";
            $user->confirmPassword = "";

            self::navigateToLoginPage($browser);
            self::loginUser($browser, $user);

            #Ensure that the error message has appeared
            $submitEmailError = '#root > div > div > form > div:nth-child(4)';
            $browser->waitUntilEnabled($submitEmailError, 10)->assertSee('Email is required.');
            $submitPasswordError = '#root > div > div > form > div:nth-child(6)';
            $browser->waitUntilEnabled($submitPasswordError, 10)->assertSee('Password is required.');

        });
    }

    public function testMissingEmail()
    {
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user->email = "";

            self::navigateToLoginPage($browser);
            self::loginUser($browser, $user);

            #Ensure that the error message has appeared
            $submitEmailError = '#root > div > div > form > div:nth-child(4)';
            $browser->waitUntilEnabled($submitEmailError, 10)->assertSee('Email is required.');
        });
    }

    public function testMissingPassword()
    {
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user->password = "";

            self::navigateToLoginPage($browser);
            self::loginUser($browser, $user);

            #Ensure that the error message has appeared
            $submitPasswordError = '#root > div > div > form > div:nth-child(6)';
            $browser->waitUntilEnabled($submitPasswordError, 10)->assertSee('Password is required.');
        });
    }

    public function testUnauthorizedUser()
    {
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user->email = "testerjd@email.com";
            $user->password = "Password1";

            self::navigateToLoginPage($browser);
            self::loginUser($browser, $user);

            #Ensure that the error message has appeared
            $submitPasswordError = '#root > div > div > form > div:nth-child(3) > div:nth-child(2)';
            $browser->waitUntilEnabled($submitPasswordError, 60);
            $browser->waitForText('You have not been authorized to use this app.');
            $browser->assertSee("You have not been authorized to use this app.");
        });
    }

    public function testNonRegisteredLogin()
    {
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
            $user = FakeInfo::generateUser();

            self::navigateToLoginPage($browser);
            self::loginUser($browser, $user);

            #Ensure that the error message has appeared
            $submitPasswordError = '#root > div > div > form > div:nth-child(3) > div:nth-child(2)';
            $browser->waitForTextIn($submitPasswordError, 'You need to be registered to use this app.', 10);
            #$browser->waitUntilEnabled($submitPasswordError, 10)
            $browser->assertSee('You need to be registered to use this app.');

        });
    }

    public function testValidLogin()
    {
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user->email = "gzampetakis@syneru.com";
            $user->password = "Log555QXL!";

            self::navigateToLoginPage($browser);
            self::loginUser($browser, $user);

            #Ensure that the error message has appeared
            #$submitPasswordError = '#root > div > div > form > div:nth-child(3) > div:nth-child(2)';
            #$browser->waitForTextIn($submitPasswordError, 'You need to be registered to use this app.', 10);
            #$browser->pause(10000);
            
            $browser->waitForTextIn('#root > div > div > header > div > div:nth-child(2)', 'HIPS(Health Integrated Planning System)', 20);
            $browser->assertSee('HIPS(Health Integrated Planning System)');
            $browser->assertPathIs('/dashboard');
            
            #$browser->waitUntilEnabled($submitPasswordError, 10)
            #$browser->assertSee('You need to be registered to use this app.');

        });
    }

    #region Generic Repatative functions, navigate to the registration page and login a user
    private function navigateToLoginPage($browser)
    {
        #Navigate to the home page, and ensure that the page contains the text 'Health Integrated Planning System'
        $browser->visit('/');
        $browser->waitForTextIn('#root > div > div > form > h4', 'Health Integrated Planning System', 5);
        $browser->assertSee('Health Integrated Planning System');
    }

    private function loginUser($browser, $user)
    {
        #Fill in the form with the fake user data
        $passwordSelector = '#filled-email-input';
        $browser->waitUntilEnabled($passwordSelector, 10);
        $browser->clear($passwordSelector)
                ->type($passwordSelector, $user->email);

        $repasswordSelector = '#filled-password-input';
        $browser->waitUntilEnabled($repasswordSelector, 10);
        $browser->clear($repasswordSelector)
                ->type($repasswordSelector, $user->password);

        $submitBtnSelector = '#login-button';
        $browser->waitUntilEnabled($submitBtnSelector, 10)
                ->click($submitBtnSelector);

        // print("\n===========================================\n");
        // print("Entered:\n");
        // print("Email: " . $user->email . "\n");
        // print("Password: " . $user->password . "\n");
        // print("\n===========================================\n");
    }
    #endregion
}
