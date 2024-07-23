<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDashboardHomeAccess()
    {
        $this->browse(function (Browser $browser) {
            $user = FakeInfo::generateUser();
            $user->email = "gzampetakis@syneru.com";
            $user->password = "Log555QXL!";

            self::navigateToLoginPage($browser);
            self::loginUser($browser, $user);
            $browser->assertPathIs('/dashboard');
            
            $browser->pause(1000);
            $profileBtnSelector = '#root > div > div > header > div > div:nth-child(3) > button';
            $browser->click($profileBtnSelector);
            
            $browser->pause(1000);
            $logoutBtnSelector = '#account-menu > div:nth-child(3) > ul > li > div > svg';
            $browser->waitUntilEnabled($logoutBtnSelector, 10)
                    ->click($logoutBtnSelector);
        });
    }

    /*
    public function testDashboardFacilitiesCount()
    {
        $this->browse(function (Browser $browser) {
            $user = FakeInfo::generateUser();
            $user->email = "gzampetakis@syneru.com";
            $user->password = "Log555QXL!";

            self::navigateToLoginPage($browser);
            self::loginUser($browser, $user);
            $browser->assertPathIs('/dashboard');

            // $browser->waitUntilEnabled('#initialLoadingContainer > div');
            // $browser->waitUntilMissing("#initialLoadingContainer > div");

            #$browser->driver->switchTo()->frame($iframeSelector);
            
            #$browser->with('iframe', function ($iframe) {
                // Wait for the iframe's load event...
            $browser->pause(8000);
                #$iframe->waitForEvent('load');
                
                
            $iframeSelector = "#root > div > div > main > div:nth-child(2) > div > div > iframe";
            $browser->withinFrame($iframeSelector, function($browser) {
                $facilitiesCountSelector = "> div > div > div > div > div:nth-child(2) > div > div > margin-container > full-container > div:nth-child(1) > margin-container > full-container > div > div > div > div:nth-child(2) > svg > g:nth-child(2) > text";
                #$value = $browser->driver->findElements(WebDriverBy::xpath('/html/body/div/div/div/div/div[2]/div/div/margin-container/full-container/div[1]/margin-container/full-container/div/div/div/div[2]/svg/g[2]/text'))->getAttribute('innerHTML');
                #$elem = $browser->element($facilitiesCountSelector);
                #print($elem);
                $value = $browser->attribute($facilitiesCountSelector, 'value');

                #$value = $browser->value($facilitiesCountSelector);
                print("\n============================================\n");
                print($value);
                print("\n============================================\n");              
                
                $browser->assertValueIsNot($facilitiesCountSelector, 0);
            });

            $browser->pause(1000);
            #$browser->driver->switchTo()->defaultContent();

            $logoutBtnSelector = '#root > div > div > div > div > ul:nth-child(4) > div > div:nth-child(1) > svg';
            $browser->waitUntilEnabled($logoutBtnSelector, 10)
                    ->click($logoutBtnSelector);
        });
    }
    */
    
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
        #$browser->pause(10000);
        
        $browser->waitForTextIn('#root > div > div > header > div > div:nth-child(2)', 'HIPS(Health Integrated Planning System)', 20);
        $browser->assertSee('HIPS(Health Integrated Planning System)');
    }
    #endregion
}
