<?php

namespace ParthoKar\AdminCore;

use Illuminate\Support\ServiceProvider;

class AdminCoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        // config merge
        $this->mergeConfigFrom(
            __DIR__.'/../config/admin-core.php',
            'admin-core'
        );
    }

    public function boot()
    {
        // routes load
        $this->loadRoutesFrom(__DIR__.'/../routes/admin.php');

        // views load
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin-core');

        // migrations load
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // publish config
        $this->publishes([
            __DIR__.'/../config/admin-core.php' =>
                config_path('admin-core.php'),
        ], 'admin-core-config');

        //run command
        if ($this->app->runningInConsole()) {
            $this->commands([
                \ParthoKar\AdminCore\Console\InstallAdminCoreCommand::class,
            ]);
        }

    }
}
