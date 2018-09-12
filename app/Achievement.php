<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Achievement extends Model
{
    public function owner()
    {
        return $this->belongsTo('App\User');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','submissions')->withTimestamps()->withPivot('status','created_at');
    }
//    public function users_sub(){
//        return $this->hasMany('App\Submission')->orderBy('created_at','desc');
//    }

}
