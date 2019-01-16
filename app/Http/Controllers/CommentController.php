<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentsResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return new CommentsResource(Comment::with(['author'])->paginate());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment $comment
     *
     * @return CommentResource
     */
    public function show(Comment $comment)
    {
        CommentResource::withoutWrapping();

        return new CommentResource($comment);
    }
}
