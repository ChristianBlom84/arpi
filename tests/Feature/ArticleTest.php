<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Article;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    public function testsArticlesAreCreatedSuccessfully()
    {
        // Arrange
        $user = factory(User::class)->create();
        $token = $user->generateApiToken();
        $headers = ["Authorization" => "Bearer $token"];
        $payload = [
            "author_id" => 1,
            "title" => "Lorem"
        ];

        // Act
        $this->json("POST", "api/articles", $payload, $headers)
            ->assertStatus(201)
            ->assertJson([
                "author_id" => 1,
                "title" => "Lorem"
            ]);
    }

    public function testsArticlesAreUpdatedSuccessfully(Type $var = null)
    {
        // Arrange
        $user = factory(User::class)->create();
        $article = factory(Article::class)->create([
            "author_id" => 1,
            "title" => "First Article"
        ]);
        $token = $user->generateApiToken();
        $headers = ["Authorization" => "Bearer $token"];
        $payload = [
            "author_id" => 1,
            "title" => "Lorem"
        ];

        // Act
        $this->json("PUT", "api/articles/" . $article->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                "author_id" => 1,
                "title" => "Lorem"
            ]);
    }
}
