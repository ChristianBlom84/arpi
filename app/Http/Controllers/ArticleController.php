<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticlesResource;
use App\Http\Resources\ArticleResource;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return new ArticlesResource(Article::with(['author', 'comments.author'])->paginate());
    }

    public function show(Article $article)
    {
        ArticleResource::withoutWrapping();

        return new ArticleResource($article);
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }
}
