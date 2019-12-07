<?php

namespace Tematech\Avstelecomsms;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AvstelecomsmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('avstelecomsms.php'),
            ], 'config');
        }
        $this->app->bind(Client::class, function () {
            new Client();
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'avstelecomsms');

        // Register the main class to use with the facade
        $this->app->singleton('avstelecomsms', function () {
            return new Avstelecomsms;
        });
    }
}
