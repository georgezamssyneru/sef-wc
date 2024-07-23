<?php

namespace App\Providers;

use App\ExternalProviders\Esri;
use Illuminate\Support\ServiceProvider;

class EsriServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('custom-esri', function () {;

            //
            return new Esri();

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
