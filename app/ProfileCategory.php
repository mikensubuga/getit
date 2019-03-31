<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProfileCategory extends Model
{
    public function profiles(){
        return $this->hasMany('App\JobProfile','category_id');
    }
}
