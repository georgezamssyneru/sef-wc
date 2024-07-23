<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Log;

class InfoHelper
{
    #Create a static variable to hold the application URI
    private static $website_link;
    private static $browser;

    public static function getWebsiteURI()
    {
        if (is_null(self::$website_link))
        {
            $currentRoute = $browser->driver->getCurrentURL();
            $parts = explode('/', $currentRoute);
            $last = array_pop($parts);
            $website_link = array(implode('/', $parts), $last)[0];
        }
        return self::$website_link;
    }

    public static function scrollTo($x, $y)
    {
        self::$browser->driver->executeScript("window.scrollTo($x, $y)");
    }

    public static function scrollBy($x, $y)
    {
        self::$browser->driver->executeScript("window.scrollBy($x, $y)");
    }

    public static function scrollToElement($element)
    {
        self::$browser->driver->executeScript("arguments[0].scrollIntoView(true);", $element);
    }

    public static function scrollToBottom()
    {
        self::$browser->driver->executeScript("window.scrollTo(0, document.body.scrollHeight)");
    }

    public static function scrollToTop()
    {
        self::$browser->driver->executeScript("window.scrollTo(0, 0)");
    }

    #$browser->maximize();
    #$browser->driver->executeScript('window.scrollTo(0, 400);');
    #$browser->click('input#button-selector');

    // $website_link = InfoHelper::getWebsiteURI();
    // Log::info('Current route:  ' . $currentRoute);
    // Log::info('Detected route: ' . $website_link.'/register');
    // Log::info($currentRoute == $website_link.'/register');

    // public static function generateUser()
    // {
    //     $user = new \stdClass();
    //     $user->firstName = 'Justintester';
    //     $user->lastName = 'Justintester';
    //     $user->email = 'Justintester.Justintester@email.com';
    //     $user->password = 'v@lid_P@SS1945';
    //     $user->confirmPassword = 'v@lid_P@SS1945';
    //     return $user;
    // }
}