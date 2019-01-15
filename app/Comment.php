<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function author()
    {
        return $this->belongsTo('App\People');
    }
    
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
