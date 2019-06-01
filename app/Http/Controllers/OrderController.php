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
         

          // Generate a random Reference
          $reference = mt_rand();
          //Total price
          $total = $request->qty*$request->price;

        $url = 'https://www.easypay.co.ug/api/'; 
        $payload = array( 'username' => 'e4098ee9210a3602', 
        'password' => 'b7ca0ca102e6286b', 
        'action' => 'mmdeposit', 
        'amount' => $request->qty*$request->price, 
        'phone'=> $request->mmnumber, 
        'currency'=>'UGX', 
        'reference'=>$reference, 
        'reason'=>'Testing MM DEPOSIT' 
        ); 
         
        
        //open connection 
        $ch = curl_init(); 
         
        //set the url, number of POST vars, POST data 
        curl_setopt($ch,CURLOPT_URL, $url); 
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($payload)); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,30); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 400); //timeout in seconds 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        //execute post 
        $result = curl_exec($ch); 
         
        // if(curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200)
        //     echo "something went wrong";
        //close connection 
        curl_close($ch); 

        $decoded_result = json_decode($result, true);

        if($decoded_result['success'] == 0){
            return redirect()->back()->with('error','Error! User did not approve the mobile money request in time');
        }
        else{
            $user = User::find($user->id);
            $user->orders()->create($data);
            return redirect()->back()->with('success','Order has been created and '.$total.' has been received');
        }



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
       // dd($orders);
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

    public function withdraw(Request $request){
      // return $request;
         // Generate a random Reference
        // $reference = mt_rand();
        
         //get amount from form
         $total = $request->amount;

       $url = 'https://www.easypay.co.ug/api/'; 
       $payload = array( 'username' => 'e4098ee9210a3602', 
       'password' => 'b7ca0ca102e6286b', 
       'action' => 'mmpayout', 
       'amount' => $request->amount, 
       'phone'=> $request->mmnumber, 
       'currency'=>'UGX'
      // 'reference'=>$reference, 
      // 'reason'=>'Withdraw' 
       ); 
        
       
       //open connection 
       $ch = curl_init(); 
        
       //set the url, number of POST vars, POST data 
       curl_setopt($ch,CURLOPT_URL, $url); 
       curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($payload)); 
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,30); 
       curl_setopt($ch, CURLOPT_TIMEOUT, 400); //timeout in seconds 
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
       //execute post 
       $result = curl_exec($ch); 
        
       // if(curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200)
       //     echo "something went wrong";
       //close connection 
       curl_close($ch); 

       $decoded_result = json_decode($result, true);

       if($decoded_result['success'] == 0){
           return redirect()->back()->with('error','An error Occured! Insufficient balance in the account');
       }
       else{
        $user = Auth::user();
        $jobprofile = $user->jobprofile()->first()->id;
        $ord = Order::where('jobProfile_id', '=',$jobprofile)->latest()->get();
        foreach($ord as $or){
            if($or->delivered == 1)
            $or->delete();
            echo $or;
        }
           return redirect()->back()->with('success','An amount of '.$total.' has been Withdrawn from account');
       }

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
