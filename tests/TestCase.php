<?php

namespace Partho\AdminCore\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            \Partho\AdminCore\AdminCoreServiceProvider::class,
        ];
    }
}