<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    public function testsArticlesAreCreatedSuccessfully()
    {
        // Arrange
        $user = factory(User::class)->create();
        $token = $user->generateApiToken();
        $header = ["Authorization" => "Bearer $token"];
        $payload = [
            "author_id" => "1",
            "title" => "Lorem"
        ];

        // Act
        $this->json("POST", "api/articles", $payload)
            ->assertStatus(201)
            ->assertJson([
                "author_id" => "1",
                "title" => "Lorem",
            ]);
    }
}
