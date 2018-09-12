<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    public $timestamps = true;
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function exercises()
    {
        return $this->belongsToMany('App\Exercise','routine_exercise')->withPivot('day_id');
    }
}
