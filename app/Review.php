<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    public function jprofile(){
        return $this->belongsTo('App\JobProfile','jobProfile_id');
    }

    public function replies(){
        return $this->hasMany('App\Reply');
    }
}
