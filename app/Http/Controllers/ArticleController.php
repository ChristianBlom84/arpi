<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticlesResource;
use App\Http\Resources\ArticleResource;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return new ArticlesResource(Article::with(['author', 'comments'])->paginate());
    }

    public function show(Article $article)
    {
        ArticleResource::withoutWrapping();
        return new ArticleResource($article);
    }
}
