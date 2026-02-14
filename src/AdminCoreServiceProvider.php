<?php

namespace ParthoKar\AdminCore;

use Illuminate\Support\ServiceProvider;

class AdminCoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Merge package config
        $this->mergeConfigFrom(
            __DIR__.'/../config/admin-core.php',
            'admin-core'
        );
    }

    public function boot()
    {
        /*
        |--------------------------------------------------------------------------
        | Load Package Core Files
        |--------------------------------------------------------------------------
        */
        $this->loadRoutesFrom(__DIR__.'/../routes/admin.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin-core');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        /*
        |--------------------------------------------------------------------------
        | Publishable Resources
        |--------------------------------------------------------------------------
        */
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../config/admin-core.php' => config_path('admin-core.php'),
            ], 'admin-core-config');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/admin-core'),
            ], 'admin-core-views');

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'admin-core-migrations');

            $this->publishes([
                __DIR__.'/../routes/admin.php' => base_path('routes/admin-core.php'),
            ], 'admin-core-routes');
        }

        /*
        |--------------------------------------------------------------------------
        | Register Middleware
        |--------------------------------------------------------------------------
        */
        $router = $this->app['router'];
        $router->aliasMiddleware(
            'permission',
            \ParthoKar\AdminCore\Http\Middleware\PermissionMiddleware::class
        );

        /*
        |--------------------------------------------------------------------------
        | Register Console Commands
        |--------------------------------------------------------------------------
        */
        if ($this->app->runningInConsole()) {
            $this->commands([
                \ParthoKar\AdminCore\Console\InstallAdminCoreCommand::class,
            ]);
        }
    }
}
