<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobProfile;
use App\ProfileCategory;
use App\Review;
class JobProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProfileCategory::all();
        $profiles = JobProfile::all();
        return view('front.profiles', compact('profiles','categories'));
    }



    public function profileCategory($id){
        $categories = ProfileCategory::all();
        $category = ProfileCategory::findorFail($id);
        $categ = $category;
         $pcat = $category->profs()->get();
    
         return view('front.profileCategory', compact('pcat','categories','categ'));
    }



    public function profile($id){
      
        //$rev = Review::find($id);
        $profile = JobProfile::findorFail($id);
       $reviews = $profile->reviews()->get();
       return view('front.profile', compact('profile','reviews'));
    }

    public function user($id){
        return "hello world";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
