<?php

namespace Hip\PackageTree\Providers;

use Illuminate\Support\ServiceProvider;

class TreeServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->loadRoutesFrom(__DIR__.'/../../routes/routes.php');
        // $this->loadViewsFrom(__DIR__.'/../../resources/views', 'custom-auth');

    }

    public function register()
    {

    }

}
