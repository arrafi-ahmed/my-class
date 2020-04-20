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

    	return view('contact', ['teachers'=>$teachers]);
    }

    public function contact(Request $req)
    {
		$contact = DB::table('teacher')->where('id', $req->teacherId)
								       ->first();

    	return view('contact', ['contact'=>$contact]);
    }

    public function content($id, Request $req)
    {
		$contact = DB::table('teacher')->where('id', $id)
								       ->first();
    	
    	return view('send-email', ['contact'=>$contact]);
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
    	
    	return back()->with('success', 'Message sent successfully!');
    }
}
