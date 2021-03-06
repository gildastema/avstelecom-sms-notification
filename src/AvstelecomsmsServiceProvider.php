<?php

namespace Tematech\Avstelecomsms;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;

class AvstelecomsmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config-avstelecomsms.php' => config_path('avstelecomsms.php'),
            ], 'config');
        }
        $this->app->singleton(Avstelecomsms::class, function () {
           return new Avstelecomsms();
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config-avstelecomsms.php', 'avstelecomsms');

        $this->app->singleton(Client::class, function () {
            new Client();
        });
        // Register the main class to use with the facade
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('avstelecom', function () {
                return new AvsTelecomChannel;
            });
        });
    }
}
