<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public function achievement(){
        return $this->belongsTo('App\Achievement')->orderBy('created_at','desc');
    }

}
