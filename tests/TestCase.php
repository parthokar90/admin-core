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
}