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

		if (count($courses)>0) 
        {
            return view('report-popular-courses', ['courses' => $courses]);
        }

        else
        {
            return view('report-popular-courses');
        }
    }

    public function historyGet()
    {
    	return view('report-student-history');
    }

    public function historyPost(Request $req)
    {
        $this->validate($req, [
            'studentId' => 'required|exists:student,id'
        ]);

    	$histories = DB::table('result')->join('courses', 'result.courseId', '=', 'courses.id')
    								    ->select('result.*', 'courses.name', 'courses.section', 'courses.teacherId')
    								    ->where('studentId', $req->studentId)
    								    ->get();

	    if (count($histories)>0) 
        {
            return view('report-student-history', ['histories'=>$histories]);
        }

        else
        {
            return view('report-student-history');
        }
    }

    public function gradesGet()
    {
    	return view('report-good-grades');
    }

    public function gradesPost(Request $req)
    {
    	if ($req->session()->get('type') == "teacher") 
    	{
            $course = DB::table('courses')->where('id', $req->courseId)
										   ->select('teacherId')
										   ->first();

    		if (isset($course) && $course->teacherId == session('id')) 
    		{
                $this->validate($req, [
                    'courseId' => 'required|exists:courses,id'
                ]);

    			$results = DB::table('result')->where([['courseId', '=', $req->courseId],
													   ['result', 	'like', 'A%']])
    										  ->orderBy('result', 'desc')
										 	  ->get();

		 	    if (count($results)>0) 
		 	    {
		 	    	return view('report-good-grades', ['results'=>$results]);
		 	    }

		 	    else 
		 	    {
		 	    	return view('report-good-grades');
		 	    }
		 	}
    		else
    		{
    			return back()->with('error', 'Course is not registered under your ID!');
    		}
    	}
    	
    	else
    	{
            $this->validate($req, [
                'courseId' => 'required|exists:courses,id'
            ]);

    		$results = DB::table('result')->where([['courseId', '=', $req->courseId],
												   ['result', 	'like', 'A%']])
    									  ->orderBy('result', 'desc')
										  ->get();
			if (count($results)>0) 
	 	    {
	 	    	return view('report-good-grades', ['results'=>$results]);
	 	    }
            
	 	    else 
	 	    {
	 	    	return view('report-good-grades');
	 	    }									  
    	}
    }
}
