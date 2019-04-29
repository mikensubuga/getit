<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfileCategory;
use App\JobProfile;
class TestController extends Controller
{
    public function insert(){
        $jprofile = JobProfile::find(10);
        $category = new ProfileCategory(['name'=>'Marketing','name'=>'Askaris','House Maids']);
        $jprofile->categories()->save($category);
    }
}
