<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function courses()
    {
    	$courses = DB::table('choose_course')->join('courses', 'choose_course.courseId','=','courses.id')
											 ->select(DB::raw('courses.name, choose_course.courseId, count(choose_course.courseId) number'))
											 ->groupBy('choose_course.courseId','courses.name')
											 ->orderBy('number', 'desc')
											 ->get();

		return view('popular-courses', ['courses' => $courses]);
    }

    public function historyGet()
    {
    	return view('student-history');
    }

    public function historyPost(Request $req)
    {
    	$histories = DB::table('result')->join('courses', 'result.courseId', '=', 'courses.id')
    								    ->select('result.*', 'courses.name', 'courses.section', 'courses.teacherId')
    								    ->where('studentId', $req->studentId)
    								    ->get();

	    return view('student-history', ['histories'=>$histories]);
    }

    public function gradesGet()
    {
    	return view('good-grades');
    }

    public function gradesPost(Request $req)
    {
    	if ($req->session()->get('type') == "teacher") 
    	{
    		$course = DB::table('courses')->where('id', $req->courseId)
										   ->select('teacherId')
										   ->first();

    		if ($course->teacherId == session('id')) 
    		{
    			$results = DB::table('result')->where([['courseId', '=', $req->courseId],
													   ['result', 	'like', 'A%']])
    										  ->orderBy('result', 'desc')
										 	  ->get();

		 	    if (count($results)>0) 
		 	    {
		 	    	return view('good-grades', ['results'=>$results]);
		 	    }
		 	    else 
		 	    {
		 	    	echo "No results found!";
		 	    }
		 	}
    		else
    		{
    			echo "Course is not registered under your ID!";
    		}
    	}
    	
    	else
    	{
    		$results = DB::table('result')->where([['courseId', '=', $req->courseId],
												   ['result', 	'like', 'A%']])
    									  ->orderBy('result', 'desc')
										  ->get();
			if (count($results)>0) 
	 	    {
	 	    	return view('good-grades', ['results'=>$results]);
	 	    }
	 	    else 
	 	    {
	 	    	echo "No results found!";
	 	    }									  
    	}
    }
}
