<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class ContactController extends Controller
{
    public function index(){
        return view('front.contact');
    }

    public function store(Request $request){
        
        // return $request;
        // if(isset( $_POST['name']))
        // $name = $_POST['name'];
        // if(isset( $_POST['email']))
        // $email = $_POST['email'];
        // if(isset( $_POST['message']))
        // $message = $_POST['message'];
        // if(isset( $_POST['subject']))
        // $subject = $_POST['subject'];


        
            $data = array('name'=>"Virat Gandhi");
            Mail::send('mail', $data, function($message) {
               $message->to('nsubugamike021@gmail.com', 'Tutorials Point')->subject
                  ('Laravel HTML Testing Mail');
               $message->from('xyz@gmail.com','Virat Gandhi');
            });
            echo "HTML Email Sent. Check your inbox.";
         
// $name = $request->name;
// $email = $request->email;

// $message = $request->message;

// $subject = $request->subject;

        

//         $content="From: $name \n Email: $email \n Message: $message";
//         $recipient = "nsubugamike021@gmail.com";
//         $mailheader = "From: $email \r\n";
//         mail($recipient, $subject, $content, $mailheader) or die("Error!");
//         echo "Email sent!";
        }


         public function mail()
            {
            $name = 'Krunal';
            Mail::to('nsubugamike021@gmail.com')->send(new SendMailable($name));
            
            return 'Email was sent';
            }
}


