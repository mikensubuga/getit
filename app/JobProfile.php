<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class JobProfile extends Model
{


    protected $fillable = [
        'details', 'price', 'user_id','profilePhoto','category_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function profileCategory(){
        return $this->belongsTo('App\ProfileCategory','category_id');
    }
    public function reviews(){
        return $this->hasMany('App\Review','jobProfile_id');
    }
    
    public function order(){
        return $this->hasOne('App\Order','jobProfile_id');
    }
}
