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
        $app['config']->set('app.key', 'base64:SomeRandomStringSomeRandomStringSomeRandomString=');
    }
}
