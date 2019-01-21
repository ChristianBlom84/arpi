<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    public function testRequiresEmailAndLogin()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."]
                ]
        ]);
    }
    
    public function testUserLogsInSuccessfully()
    {
        $user = factory(User::class)->create([
            'email' => 'testlogin@example.com',
            'password' => bcrypt('chasacademy')
        ]);

        $payload = [
            'email' => 'testlogin@example.com',
            'password' => 'chasacademy'
        ];

        $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "name",
                    "email",
                    "email_verified_at",
                    "created_at",
                    "updated_at",
                    "api_token"
                ]
            ]);
    }
}
