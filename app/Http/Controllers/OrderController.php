<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use App\JobProfile;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = Auth::user();

        $data = [
            'user_id'=>$user->id,
            'jobProfile_id'=>$request->profile_id,
            'delivered'=> $request->delivered,
            'unit'=> $request->price,
            'quantity'=>$request->qty,
            'total'=>$request->qty*$request->price,
          ];
          $user = User::find($user->id);
        $user->orders()->create($data);


        $url = 'https://www.easypay.co.ug/api/'; 
        $payload = array( 'username' => 'e4098ee9210a3602', 
        'password' => 'b7ca0ca102e6286b', 
        'action' => 'mmdeposit', 
        'amount' => $request->qty*$request->price, 
        'phone'=> $request->mmnumber, 
        'currency'=>'UGX', 
        'reference'=>1837, 
        'reason'=>'Testing MM DEPOSIT' 
        ); 
         
        
        //open connection 
        $ch = curl_init(); 
         
        //set the url, number of POST vars, POST data 
        curl_setopt($ch,CURLOPT_URL, $url); 
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($payload)); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,15); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout in seconds 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        //execute post 
        $result = curl_exec($ch); 
         
        //close connection 
        curl_close($ch); 
        print_r(json_decode($result)); 






    //return redirect()->back()->with('success','Order Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $orders = Order::where('user_id','=',$id)->latest()->get();
        return view('front.myOrder',compact('orders','users'));
       // return "Orders for ".$id;
    }

    public function showSelling($id)
    {

        $user = User::find($id);
        $jobprofile = $user->jobprofile()->first()->id;

        
    

      $ordersd = Order::where('jobProfile_id', '=',$jobprofile)->latest()->get();
       
        return view('front.mySelling',compact('ordersd','users'));
    }

    public function showFunds($id) {
        
        $user = User::find($id);
        $jobprofile = $user->jobprofile()->first()->id;

        
    

      $ordersd = Order::where('jobProfile_id', '=',$jobprofile)->latest()->get();
       //return $ordersd;
        return view('front.myFunds',compact('ordersd','users'));
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
