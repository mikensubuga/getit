<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\JobProfile;
use App\ProfileCategory;
class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function user($name){
        $user = User::where('name','=',$name)->get()->first();
       
       $profile = $user->jobprofile()->get()->first();
     //$profile = JobProfile::where('user_id','=',$user->id)->get();
      
       
       return view('front.user',compact('user','profile')); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        $categories = ProfileCategory::all();
        $user = User::where('name','=',$name)->get()->first();

        return view('front.createProfile', compact('user','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
        //$formInput = $request->except('profilePhoto','category');
        $profile = new JobProfile();

        //validation
        $this->validate($request,[
            'user_id'=>'required',
            'shortDesc' => 'required',
            'longDesc' => 'required',
            'price' => 'required',
            'categories'=>'required',
            'profilePhoto'=>'required',
        ]);

        $image = $request->profilePhoto;
        if($image){
            $imageName = $image->getClientOriginalName();
            
            $image->move('storage/job-profiles/userprofiles',$imageName);
          //  $formInput['profilePhoto']=$imageName;
          $profile->profilePhoto = "job-profiles\\userprofiles\\" .$imageName;

           // $profile->profilePhoto = $imageName;
        }

      //  JobProfile::create($formInput);
    
        




        /*new approach*/
        $profile->shortDesc = $request->shortDesc;
        $profile->user_id = $request->user_id;
        $profile->longDesc = $request->longDesc;
        $profile->price = $request->price;
      
        if($profile->save()){
        foreach(request('categories') as $category){
            $profile->categories()->attach($category);
        }
    }
        return back()->with('success', 'Job Profile successfully created');

        /*end*/

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

        $this->validate($request,[
            'details' => 'required',
            'price' => 'required'
        ]);
        
        $profile = JobProfile::where('id', '=', $id)->get()->first();
	    $profile->details = $request->details;
        $profile->price = $request->price;
	    $profile->save();
	    return back()->with('success', 'Job Profile successfully updated');
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
