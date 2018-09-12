<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Conner\Tagging\Taggable;

class Exercise extends Model
{
    use Taggable;
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function routines()
    {
        return $this->belongsToMany('App\Routine','routine_exercise')->withPivot('day_id');
    }
}
