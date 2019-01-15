<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function author()
    {
        return $this->belongsTo('App\People');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
