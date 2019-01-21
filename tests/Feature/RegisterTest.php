<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    public function testRequiresPasswordEmailAndName()
    {
        $this->json('POST', 'api/register')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."]
                ]
            ]);
    }

    public function testsRequiresPasswordConfirmation()
    {
        $payload = [
            'name' => 'Bob Hope',
            'email' => 'bob@hope.com',
            'password' => 'test1234'
        ];

        $this->json('POST', 'api/register', $payload)
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "password" => ["The password confirmation does not match."]
                ]
            ]);
    }

    public function testsRegistersSuccessfully()
    {
        $payload = [
            'name' => 'Benedict Cumberbatch',
            'email' => 'imsherlock@scotlandyard.co.uk',
            'password' => 'test1234',
            'password_confirmation' => 'test1234'
        ];

        $this->json('POST', 'api/register', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "name",
                    "email",
                    "created_at",
                    "updated_at",
                    "api_token"
                ]
            ]);
    }
}
