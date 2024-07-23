<?php

namespace App\Providers;

use App\ExternalProviders\WorkflowApi;
use Illuminate\Support\ServiceProvider;

class WorkFlowApiServiceProvider extends ServiceProvider
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
            return new WorkflowApi();

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
