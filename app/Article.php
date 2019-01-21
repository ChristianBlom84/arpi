<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'author_id', 'title'
    ];

    public function author()
    {
        return $this->belongsTo('App\People');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
