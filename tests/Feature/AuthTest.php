<?php

namespace Partho\AdminCore\Tests\Feature;

use ParthoKar\AdminCore\Tests\TestCase;

class AuthTest extends TestCase
{
    /** @test */
    public function login_page_can_be_loaded()
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }
}