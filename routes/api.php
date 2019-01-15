<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('articles', 'ArticleController');

Route::get(
    'articles/{article}/relationships/author',
    [
        'uses' => \App\Http\Controllers\ArticleRelationshipController::class . '@author',
        'as' => 'articles.relationships.author',
    ]
);

Route::get(
    'articles/{article}/author',
    [
        'uses' => \App\Http\Controllers\ArticleRelationshipController::class . '@author',
        'as' => 'articles.author',
    ]
);

Route::get(
    'articles/{article}/relationships/comments',
    [
        'uses' => \App\Http\Controllers\ArticleRelationshipController::class . '@comments',
        'as' => 'articles.relationships.comments',
    ]
);

Route::get(
    'articles/{article}/comments',
    [
        'uses' => \App\Http\Controllers\ArticleRelationshipController::class . '@comments',
        'as' => 'articles.comments',
    ]
);
