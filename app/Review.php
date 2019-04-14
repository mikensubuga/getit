<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Review extends Model
{

    protected $fillable = ['jobProfile_id','is_active','author','email','body','photo','rating'];


    public function jprofile(){
        return $this->belongsTo('App\JobProfile','jobProfile_id');
    }

    public function replies(){
        return $this->hasMany('App\Reply');
    }
}
