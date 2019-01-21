<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    public function testsSuccessfullyLogsOut()
    {
        $this->json('POST', 'api/logout')
            ->assertStatus(200)
            ->assertJson([
                "data" => "User successfully logged out"
            ]);
    }
}
