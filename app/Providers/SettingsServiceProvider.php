<?php

namespace App\Providers;

use App\Settings\Settings;
use App\Settings\SettingsContract;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SettingsContract::class, function($app) {

            $settings = new Settings(
                $app->make(Filesystem::class)
            );

            $settings->load('settings.json');

            return $settings;
        });
    }
}
