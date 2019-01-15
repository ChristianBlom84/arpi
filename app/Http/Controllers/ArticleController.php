<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    public function index()
    {
        return new ArticleResource(Article::all());
    }

    public function show(Article $article)
    {
        ArticleResource::withoutWrapping();
        return new ArticleResource($article);
    }
}
