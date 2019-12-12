<?php

namespace JorickL\LaraSettings;

use Illuminate\Support\ServiceProvider;

class LaraSettingsServiceProvider extends ServiceProvider {
    
    /**
     * Bootstrap Lara-Settings services
     *
     * @return void
     */
    public function boot()
    {
        // Migration files
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations')
        ], 'migrations');

        // Configuration file
        $this->publishes([
            __DIR__.'/config/larasettings.php' => config_path('larasettings.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/larasettings.php',
            'larasettings'
        );
    }
}