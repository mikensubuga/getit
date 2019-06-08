<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class JobProfile extends Model
{


    protected $fillable = [
        'details', 'available', 'price', 'user_id', 'profilePhoto', 'category_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function profileCategory(){
    //     return $this->belongsTo('App\ProfileCategory','category_id');
    // }
    public function categories()
    {
        return $this->belongsToMany('App\ProfileCategory', 'prof_cats', 'job_profile_id', 'profile_category_id');
    }
    // public function categories(){
    //     return $this->hasMany('App\ProfileCategory','jobProfile_id');
    // }

    public function reviews()
    {
        return $this->hasMany('App\Review', 'jobProfile_id');
    }

    public function order()
    {
        return $this->hasOne('App\Order', 'jobProfile_id');
    }
}
