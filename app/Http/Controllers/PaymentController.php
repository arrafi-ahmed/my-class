<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function enroll($id, Request $req)
    {
    	$session = $req->session()->all();
    	$course = DB::table('courses') -> where('id', $id) 
    								   -> first();
		$studentId = $session['id'];
		$payments = DB::table('payment') -> join('courses', function($join) use ($studentId)
											{
												$join-> on('payment.courseId', '=', 'courses.id')
													 -> where('payment.studentId', '=', $studentId);
											})
										 -> select('payment.*', 'courses.name', 'courses.section')
										 -> orderBy('payment.id', 'desc')
										 -> get();

		return view('make-payment', ['course'=>$course, 'payments'=>$payments, 'session'=>$session]);
    } 

    public function create($id, Request $req)
    {
    	$session = $req->session()->all();
    	$payment = DB::table('payment') -> insert(['amount' 	=> $req->amount,
    											   'method' 	=> $req->method,
    											   'refNo'  	=> $req->refNo,
    											   'courseId' 	=> $id,
    											   'status' 	=> 0,
    											   'studentId' 	=> $session['id']]); 
		$studentId = $session['id'];
		$payments = DB::table('payment') -> join('courses', function($join) use ($studentId)
											{
												$join-> on('payment.courseId', '=', 'courses.id')
													 -> where('payment.studentId', '=', $studentId);
											})
										 -> select('payment.*', 'courses.name', 'courses.section')
										 -> orderBy('payment.id', 'desc')
										 -> get(); 	
		if ($payment)
		{
			return view('make-payment', ['payments'=>$payments, 'session'=>$session]);				
	   	}	
	   	else
	   	{
	   		return redirect()->route('payment.enroll', $id);
	   	}							 
		
    }

	public function modify(Request $req)
    {
    	$session = $req->session()->all();
    	if ($session['type'] == 'admin') 
    	{
    		$find = null;

			if (isset($req->find) || isset($req->update)) 
    		{
    			if (isset($req->update))
	    		{
	    			$update = DB::table('payment') -> where('id', $req->paymentId)
	    										   -> update(['amount' => $req->amount,
	    										   			  'method' => $req->method,
	    										   			  'refNo'  => $req->refNo,
	    										   			  'status' => $req->status ]);
	    		}

    			$paymentId = $req->paymentId;
    			$find = DB::table('payment')-> join('courses', function($join) use ($paymentId)
												{
													$join-> on('payment.courseId', '=', 'courses.id')
													 	 -> where('payment.id', '=', $paymentId);
												})
												-> select('payment.*', 'courses.fee')
												-> first(); 	
    		}

    		$payments = DB::table('payment')-> join('courses', 'payment.courseId', '=', 'courses.id')
	    								    -> select('payment.*', 'courses.name', 'courses.section')
	    								    -> orderBy('payment.id', 'desc')
	    								    -> limit(50)
									   		-> get(); 

    		return view('modify-payment', ['payments'=>$payments, 'find'=>$find]);
    	}
    }
}
