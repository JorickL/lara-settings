<?php

namespace JorickL\LaraSettings\Providers;

use Illuminate\Support\ServiceProvider;

class LaraSettingsServiceProvider extends ServiceProvider {
    
    /**
     * Bootstrap Lara-Settings services
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}