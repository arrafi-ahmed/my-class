<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class ContactController extends Controller
{
    public function index()
    {
    	$teachers = DB::table('teacher')->orderBy('dept','desc')
    									->get();

    	if(count($teachers)>0)
        {
            return view('contact', ['teachers'=>$teachers]);    
        }

        else
        {
            return view('contact');    
        }
    }

    public function content($id, Request $req)
    {
		$contact = DB::table('teacher')->where('id', $id)
								       ->first();
    	
        if($contact)
        {
            return view('contact-send', ['contact'=>$contact]);
        }

        else
        {
            return back()->with('error', 'Error contacting the account!');
        }
    }

    public function send(Request $req)
    {
    	$this->validate($req, [
    		'senderName'  => 'required',
    		'senderEmail' => 'required|email',
    		'message'	  => 'required'
    	]);

    	$data = ['senderName' 	=> $req->senderName, 
    			 'senderEmail' 	=> $req->senderEmail, 
    			 'message' 		=> $req->message ];

        Mail::to($req->email)->send(new SendMail($data));

        if (Mail::failures()) 
        {
            return back()->with('error', 'Email sending failed!');
        }
        
        else
        {
            return redirect()->route('contact.index')->with('success', 'Email sent successfully!');     
        }
    }
}
