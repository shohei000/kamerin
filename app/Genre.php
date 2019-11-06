<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function users() 
    {
        return $this->belongsToMany('App\User', 'user_genres');
    }
}
