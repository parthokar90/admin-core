<?php

namespace Partho\AdminCore\Tests\Feature;

use ParthoKar\AdminCore\Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_package_service_provider_loads()
    {
        $this->assertTrue(class_exists(
            \ParthoKar\AdminCore\AdminCoreServiceProvider::class
        ));
    }
}