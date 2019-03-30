<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    public function jprofile(){
        return $this->belongsTo('App\JobProfile');
    }

    public function replies(){
        return $this->hasMany('App\Reply');
    }
}
