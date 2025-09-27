<?php

namespace Filterik\Providers;

use Illuminate\Support\ServiceProvider;
use Filterik\Managers\FilterManager;

class FilterikServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/filterik.php', 'filterik');

        $this->app->singleton('filterik', function($app) {
            return new FilterManager($app);
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/filterik.php' => config_path('filterik.php'),
            ], 'filterik-config');
        }
    }
}
