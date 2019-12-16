<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    

    public function genres() 
    {
        return $this->belongsToMany('App\Genre', 'user_genres');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'opend',
        'dm_ok', 'icon_url', 'twitter', "twitter_id",
        'profile_text', 'tool', 'location', 'price',
    ];

    protected $with = ['genres', 'photos'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

}
