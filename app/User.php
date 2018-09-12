<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_pic'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function routines()
    {
        return $this->hasMany('App\Routine');
    }
    public function exercises()
    {
        return $this->hasMany('App\Exercise');
    }
    public function ownachievements()
    {
        return $this->hasMany('App\Achievement');
    }
    public function achievements()
    {
        return $this->belongsToMany('App\Achievement','submissions')->withTimestamps()->wherePivot('status', 'passed');//should be true
    }
    public function nachievements()
    {
        return $this->belongsToMany('App\Achievement','submissions')->withTimestamps()->wherePivot('status', 'pending');//should be true
    }

}
