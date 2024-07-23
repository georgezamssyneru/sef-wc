<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GridEditingTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testScenarioPlanning()
    {
        #grid-editing
        $this->browse(function (Browser $browser) {
            $user = FakeInfo::generateUser();
            $user->email = "gzampetakis@syneru.com";
            $user->password = "Log555QXL!";

            self::navigateToLoginPage($browser);
            self::loginUser($browser, $user);
            $browser->visit('/grid-editing');
            $browser->pause(1000);
            $browser->assertPathIs('/grid-editing');
            self::testGridEditing($browser);
        });
    }

    
    #region Generic Repetative functions, navigate to the registration page and login a user
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

        #Ensure that the error message has appeared
        $submitPasswordError = '#root > div > div > form > div:nth-child(3) > div:nth-child(2)';
        $browser->pause(1000);
        
        $browser->waitForTextIn('#root > div > div > header > div > div:nth-child(2)', 'HIPS (Facility grid editing)', 10);
        $browser->assertSee('HIPS (Facility grid editing)');
    }

    private function testGridEditing($browser)
    {

    }
    #endregion
}
