<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleRelationshipController extends Controller
{
    public function author()
    {
        return new PeopleResource($article->author);
    }

    public function comments()
    {
        return new CommentsResource($article->comments);
    }
}
