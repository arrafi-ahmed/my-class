<?php

namespace App\Http\Controllers;
    	

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentDashboardController extends Controller
{
    public function index(Request $req)
    {
    	$studentId = $req->session()->get('id');
    	$courses = DB::table('courses')->whereIn('id', function($query) use($studentId)
										{
										    $query->select('courseId')
										    ->from('choose_course')
										    ->where('studentId', $studentId);
										})	->get();
    	
    	return view('student-dashboard', ['sessionId'=>$studentId, 'courses'=>$courses]);
    }
}
