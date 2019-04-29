<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProfileCategory extends Model
{

    protected $fillable = ['name'];

    // public function profiles(){
    //     return $this->hasMany('App\JobProfile','category_id');
    // }

    public function profs(){
        return $this->belongsToMany('App\JobProfile','prof_cats','profile_category_id','job_profile_id');
    }
}
