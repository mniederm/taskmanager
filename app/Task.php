<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Create relationship between two models - A single task belongs to a user
    public function user(){
        return $this->belongsTo('App\User');
    }
}
