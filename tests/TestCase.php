<?php

namespace Partho\AdminCore\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            \ParthoKar\AdminCore\AdminCoreServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Set valid encryption key (required for session/auth)
        $app['config']->set(
            'app.key',
            'base64:' . base64_encode(random_bytes(32))
        );

        // Use array session driver for testing
        $app['config']->set('session.driver', 'array');

        // Optional but recommended
        $app['config']->set('app.debug', true);

        // Optional database config (safe default)
        $app['config']->set('database.default', 'testing');
    }
}
