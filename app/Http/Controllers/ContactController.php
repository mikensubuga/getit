<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.contact');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);
        Mail::send(new ContactMail($request));

        return redirect()->back()->with('success', 'Message has been Sent');
    }
}
