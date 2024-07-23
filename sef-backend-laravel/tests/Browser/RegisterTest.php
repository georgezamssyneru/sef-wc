<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A collection of tests for the Registration page
     * 
     * @return void
     */
    #region Tests
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

            self::navigateToRegistrationPage($browser);
            self::registerUser($browser, $user);

            #Ensure that the error message has appeared
            $submitFirstNameError = '#root > div > div > form > div:nth-child(3)';
            $browser->waitUntilEnabled($submitFirstNameError, 10);
            $browser->assertSee('First name is required.');

            $submitLastNameError = '#root > div > div > form > div:nth-child(4)';
            $browser->waitUntilEnabled($submitLastNameError, 10);
            $browser->assertSee('Last name is required.');

            $submitEmailError = '#root > div > div > form > div:nth-child(5)';
            $browser->waitUntilEnabled($submitEmailError, 10);
            $browser->assertSee('Email is required.');

            $submitPasswordError = '#root > div > div > form > div:nth-child(8)';
            $browser->waitUntilEnabled($submitPasswordError, 10);
            $browser->assertSee('Confirm password is required.');
        });
    }

    public function testMissingFirstName()
    {
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user->firstName = "";

            self::navigateToRegistrationPage($browser);
            self::registerUser($browser, $user);

            #Ensure that the error message has appeared
            $submitFirstNameError = '#root > div > div > form > div:nth-child(3)';
            $browser->waitUntilEnabled($submitFirstNameError, 10);
            $browser->assertSee('First name is required.');
        });
    }

    public function testMissingLastName()
    {        
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, last name is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user->lastName = "";

            self::navigateToRegistrationPage($browser);
            self::registerUser($browser, $user);
        
            #Ensure that the error message has appeared
            $submitLastNameError = '#root > div > div > form > div:nth-child(4)';
            $browser->waitUntilEnabled($submitLastNameError, 10);
            $browser->assertSee('Last name is required.');
        });
    }

    public function testMissingEmail()
    {        
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, email is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user->email = "";

            self::navigateToRegistrationPage($browser);
            self::registerUser($browser, $user);
            
            #Ensure that the error message has appeared
            $submitEmailError = '#root > div > div > form > div:nth-child(5)';
            $browser->waitUntilEnabled($submitEmailError, 10);
            $browser->assertSee('Email is required.');
        });
    }

    public function testMissingPassword()
    {        
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, email is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user->password = "";

            self::navigateToRegistrationPage($browser);
            self::registerUser($browser, $user);
            
            #Ensure that the error message has appeared
            $submitPasswordError = '#root > div > div > form > div:nth-child(9)';
            $browser->waitUntilEnabled($submitPasswordError, 10);
            $browser->assertSee('Password is required.');
        });
    }

    public function testMissingConfirmationPassword()
    {        
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, email is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user->confirmPassword = "";

            self::navigateToRegistrationPage($browser);
            self::registerUser($browser, $user);
            
            #Ensure that we are on the register page
            #$browser->assertPathIs('/register');
            $submitPasswordError = '#root > div > div > form > div:nth-child(8)';
            $browser->waitUntilEnabled($submitPasswordError, 10);
            $browser->assertSee('Confirm password is required.');
        });
    }

    // public function testInvalidFirstName()
    // {
    //     $this->browse(function (Browser $browser) {
    //         #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
    //         $user = FakeInfo::generateUser();
    //         $user = FakeInfo::invalidateFisrtName($user);

    //         self::navigateToRegistrationPage($browser);
    //         self::registerUser($browser, $user);

    //         #Ensure that the error message has appeared
    //         $browser->assertSee('First name is required.');
    //     });
    // }

    // public function testInvalidLastName()
    // {
    //     $this->browse(function (Browser $browser) {
    //         #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
    //         $user = FakeInfo::generateUser();
    //         $user = FakeInfo::invalidateLastName($user);

    //         self::navigateToRegistrationPage($browser);
    //         self::registerUser($browser, $user);

    //         #Ensure that the error message has appeared
    //         $browser->assertSee('Last name is required.');
    //     });
    // }

    public function testInvalidEmail()
    {
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user = FakeInfo::invalidateEmail($user);

            self::navigateToRegistrationPage($browser);
            self::registerUser($browser, $user);

            #Ensure that the error message has appeared
            $submitEmailError = '#root > div > div > form > div:nth-child(5)';
            $browser->waitUntilEnabled($submitEmailError, 10);
            $browser->waitForText('Invalid email entered, please double check.');
            $browser->assertSee('Invalid email entered, please double check.');
        });
    }

    public function testInvalidPasswordLength()
    {
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user = FakeInfo::invalidatePassword($user, $validLength=False);
            $user->confirmPassword = $user->password;

            self::navigateToRegistrationPage($browser);
            self::registerUser($browser, $user);

            #Ensure that the error message has appeared
            $submitPasswordError = '#root > div > div > form > div:nth-child(6)';
            $browser->waitUntilEnabled($submitPasswordError, 10);
            $browser->assertSee('Password must have at least 8 characters');
        });
    }

    public function testNonMatchingPassword()
    {
        $this->browse(function (Browser $browser) {
            #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
            $user = FakeInfo::generateUser();
            $user->password = 'v@lid_P@SS1845'; #Simply changing the password, this way both passwords are not the same.
            
            self::navigateToRegistrationPage($browser);
            self::registerUser($browser, $user);

            #Ensure that the error message has appeared
            $submitPasswordError = '#root > div > div > form > div:nth-child(8)';
            $browser->waitUntilEnabled($submitPasswordError, 10);
            $browser->assertSee('The passwords do not match');
        });
    }

    // public function testValidAccount()
    // {
    //     $this->browse(function (Browser $browser) {
    //         #Generate a fake user for testing purposes, first name is empty for the purpose of this test.
    //         $user = FakeInfo::generateUser();
            
    //         self::navigateToRegistrationPage($browser);
    //         self::registerUser($browser, $user);

    //         #Ensure that the success message has appeared
    //         $browser->assertSee('You have registered successfully, you shall soon be sent an email to verify your email.');
    //     });
    // }
    #endregion

    #region Generic Repatative functions, navigate to the registration page and register a user
    private function navigateToRegistrationPage($browser)
    {
        #Navigate to the home page, and ensure that the page contains the text 'Health Integrated Planning System'
        $browser->visit('/');
        $browser->waitForTextIn('#root > div > div > form > h4', 'Health Integrated Planning System', 5);
        $browser->assertSee('Health Integrated Planning System');

        #Click on the register button
        $registerBtnSelector = '#root > div > div > form > a > button';
        $registerBtn = $browser->element($registerBtnSelector);
        $registerBtn->click();

        #Ensure that the page contains the text 'Register' and assrt that the path is '/register'
        $browser->waitForTextIn('#root > div > div > form > h3', 'Register', 5);           
        $browser->assertPathIs('/register');
    }

    private function registerUser($browser, $user)
    {
        #Fill in the form with the fake user data
        $firstNameSelector = '#mui-1';
        $browser->waitUntilEnabled($firstNameSelector, 10)
            ->clear($firstNameSelector)
            ->type($firstNameSelector, $user->firstName);
            
        $lastNameSelector = '#mui-2';
        $browser->waitUntilEnabled($lastNameSelector, 10)
            ->clear($lastNameSelector)
            ->type($lastNameSelector, $user->lastName);
            
        $emailSelector = '#mui-3';
        $browser->waitUntilEnabled($emailSelector, 10)
            ->clear($emailSelector)
            ->type($emailSelector, $user->email);

        $passwordSelector = '#root > div > div > form > div:nth-child(5) > div > input';
        $browser->waitUntilEnabled($passwordSelector, 10)
            ->clear($passwordSelector)
            ->type($passwordSelector, $user->password);

        $repasswordSelector = '#root > div > div > form > div:nth-child(6) > div > input';
        $browser->waitUntilEnabled($repasswordSelector, 10)
            ->clear($repasswordSelector)
            ->type($repasswordSelector, $user->confirmPassword);

        $submitBtnSelector = '#root > div > div > form > div.css-1ap1f79 > button';
        $browser->waitUntilEnabled($submitBtnSelector, 10)->click($submitBtnSelector);

        // print("\n===========================================\n");
        // print("Entered:\n");
        // print("Email: " . $user->email . "\n");
        // print("Password: " . $user->password . "\n");
        // print("\n===========================================\n");
    }
    #endregion
}
