<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
	public function enroll($id=null, Request $req)
    {
    	//check courses->count
		if ($id != null) 
		{
    		$course = DB::table('courses')->where('id', $id)
	    								  ->select('count', 'capacity', 'status')
	    								  ->first();

		    $payment = DB::table('payment') ->where('payment.courseId', $id)
											->where('payment.studentId', session('id'))
											->first();

			if(!isset($course))
			{
				return redirect()->route('courseList.index')->with('error', 'Access Denied!');
			}
	    	elseif ($course->count > ($course->capacity - 1)) 
			{
				return redirect()->route('courseList.index')->with('error', 'Course capacity full!');
			}

			elseif($course->status == 0)
			{
				return redirect()->route('courseList.index')->with('error', 'Course is not open!');
			}

			elseif(isset($payment->status) && $payment->status == 0)
			{
				return redirect()->route('courseList.index')->with('error', 'Course payment is under processing!');
			}

			elseif(isset($payment->status) && $payment->status == 1)
			{
				return redirect()->route('courseList.index')->with('error', 'Course payment already cleared!');
			}
    	}

    	$course = $payments = null;
    	$course = DB::table('courses') -> where('id', $id) 
    								   -> first();
		$studentId = session('id');
		$payments = DB::table('payment') -> join('courses', function($join) use ($studentId)
											{
												$join-> on('payment.courseId', '=', 'courses.id')
													 -> where('payment.studentId', '=', $studentId);
											})
										 -> select('payment.*', 'courses.name', 'courses.section')
										 -> orderBy('payment.id', 'desc')
										 -> get();

		return view('payment-create', ['course'=>$course, 'payments'=>$payments]);	
    } 

    public function create(Request $req)
    {
    	$this->validate($req, [
    		'amount'	=>	'required|numeric',
    		'method'	=>	'required',
    		'refNo'		=>	'required'
    	]);

    	//check courses->count
		$course = DB::table('courses')->where('id', $req->courseId)
    								 ->select('count', 'capacity')
    								 ->first();

    	if ($course->count > ($course->capacity - 1)) 
		{
			return back()->with('error', 'Access Denied!');
		}
		
    	//insert into tables
    	$payment = DB::table('payment') -> insert(['amount' 	=> $req->amount,
    											   'method' 	=> $req->method,
    											   'refNo'  	=> $req->refNo,
    											   'courseId' 	=> $req->courseId,
    											   'status' 	=> 0,
    											   'studentId' 	=> session('id')]); 

    	$choose_course = DB::table('choose_course') -> insert(['courseId' 	=> $req->courseId,
			    											   'studentId' 	=> session('id')]); 

    	$updateCount = DB::table('courses') -> where('id', $req->courseId)
											->update(['count' => $course->count + 1]);

		$studentId = session('id');
		$payments = DB::table('payment') -> join('courses', function($join) use ($studentId)
											{
												$join-> on('payment.courseId', '=', 'courses.id')
													 -> where('payment.studentId', '=', $studentId);
											})
										 -> select('payment.*', 'courses.name', 'courses.section')
										 -> orderBy('payment.id', 'desc')
										 -> get(); 	

		if ($payment && $choose_course && $updateCount)
		{
			return view('payment-create', ['payments'=>$payments]);				
	   	}	

	   	else
	   	{
	   		return redirect()->route('payment.enroll', $req->courseId);
	   	}							 
    }

	public function modify(Request $req)
    {
    	$find = null;

    	if ($req->has('find') || $req->has('update')) 
		{
			if ($req->has('update'))
    		{
    			$this->validate($req, [
		    		'amount'	=>	'required|numeric',
		    		'method'	=>	'required',
		    		'refNo'		=>	'required'
		    	]);

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

		if ($req->has('delete')) 
		{
			$delete = DB::table('payment')->where('id', $req->paymentId)
										  ->delete();

		    $course = DB::table('courses')->where('id', $req->courseId)
		    							   ->select('count')
		    							   ->first();
			if ($course->count > 0) 
			{
				$update = DB::table('courses')->where('id', $req->courseId)
											 ->update(['count' => $course->count - 1]);

				if ($update) 
				{
					return back()->with('success', 'Payment entry deleted successfully!');
				}

				else
				{
					return back()->with('error', 'Error deleting entry!');
				}
				
			}
		}

		$payments = DB::table('payment')-> join('courses', 'payment.courseId', '=', 'courses.id')
    								    -> select('payment.*', 'courses.name', 'courses.section')
    								    -> orderBy('payment.id', 'desc')
    								    -> limit(100)
								   		-> get(); 

		if (count($payments)>0) 
		{
			return view('payment-modify', ['payments'=>$payments, 'find'=>$find]);
		}

		else
		{
			return view('payment-modify', ['find'=>$find]);
		}
	}
}
