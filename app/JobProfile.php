<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class JobProfile extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function profileCatgeory(){
        return $this->belongsTo('App\ProfileCategory');
    }
}
