<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $req)
    {
    	$session = $req->session()->all();

    	if ($session['type'] == "admin") 
    	{
    		return view('dashboard', ['session'=>$session]);
    	}

    	elseif ($session['type'] == "teacher") 
    	{
    		$courses = DB::table('courses') -> where('teacherId', $session['id'])
									    	-> where('status', 1)
									    	-> get();

	    	return view('dashboard', ['session'=>$session, 'courses'=>$courses]);
    	}

    	elseif ($session['type'] == "student") 
    	{
    		$studentId = $session['id'];
    		$courses = DB::table('courses')->whereIn('id', function($query) use($studentId)
											{
											    $query->select('courseId')
											    ->from('choose_course')
											    ->where('studentId', $studentId);
											})	->get();
	    	
	    	return view('dashboard', ['session'=>$session, 'courses'=>$courses]);
    	}
    }
}
