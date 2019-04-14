<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reply extends Model
{
    protected $fillable = ['review_id','is_active','author','email','body','photo'];

    public function review(){
        return $this->belongsTo('App\Review');
    }
}
