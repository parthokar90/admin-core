<?php

namespace ParthoKar\AdminCore\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use ParthoKar\AdminCore\AdminCoreServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            AdminCoreServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Required encryption key
        $app['config']->set(
            'app.key',
            'base64:' . base64_encode(random_bytes(32))
        );

        // Session driver for testing
        $app['config']->set('session.driver', 'array');

        // Define admin auth guard (IMPORTANT FIX)
        $app['config']->set('auth.guards.admin', [
            'driver' => 'session',
            'provider' => 'users',
        ]);

        // Define provider
        $app['config']->set('auth.providers.users', [
            'driver' => 'eloquent',
            'model' => \Illuminate\Foundation\Auth\User::class,
        ]);
    }
}