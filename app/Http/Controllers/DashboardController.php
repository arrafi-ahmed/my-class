<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $req)
    {
    	if (session('type') == "admin") 
    	{
            $tStudent  = DB::table('student')->count();
            $tTeacher  = DB::table('teacher')->count();
            $tCourses  = DB::table('courses')->count();

            $tnPaymentU = DB::table('payment')->where('status', 0)->count();
            $taPaymentU = DB::table('payment')->where('status', 0)->sum('amount');
            $tnPaymentP = DB::table('payment')->where('status', 1)->count();
            $taPaymentP = DB::table('payment')->where('status', 1)->sum('amount');
            $tnSalary   = DB::table('salary') ->count();
            $taSalary   = DB::table('salary') ->sum('amount');
            $tNote      = DB::table('note')   ->count();
            $tNotice    = DB::table('notice') ->count();

            $nPaymentU = DB::table('payment')->where('date', '>', Carbon::now()->subHours(24))->where('status', 0)->count();
            $aPaymentU = DB::table('payment')->where('date', '>', Carbon::now()->subHours(24))->where('status', 0)->sum('amount');
            $nPaymentP = DB::table('payment')->where('date', '>', Carbon::now()->subHours(24))->where('status', 1)->count();
            $aPaymentP = DB::table('payment')->where('date', '>', Carbon::now()->subHours(24))->where('status', 1)->sum('amount');
            $nSalary   = DB::table('salary') ->where('date', '>', Carbon::now()->subHours(24))->count();
            $aSalary   = DB::table('salary') ->where('date', '>', Carbon::now()->subHours(24))->sum('amount');
            $note      = DB::table('note')   ->where('date', '>', Carbon::now()->subHours(24))->count();
            $notice    = DB::table('notice') ->where('date', '>', Carbon::now()->subHours(24))->count();

            $data =  ['table1'=>[['text'=>'Total No of Paid Payment: ',     'value'=>$tnPaymentP],
                                 ['text'=>'Total Amount of Paid Payment: ', 'value'=>$taPaymentP],
                                 ['text'=>'Total No of Unpaid Payment: ',   'value'=>$tnPaymentU],
                                 ['text'=>'Total Amount of Unpaid Payment: ','value'=>$taPaymentU],
                                 ['text'=>'Total No of Salary: ',           'value'=>$tnSalary],
                                 ['text'=>'Total Amount of Salary: ',       'value'=>$taSalary],
                                 ['text'=>'Total Note: ',                   'value'=>$tNote],
                                 ['text'=>'Total Notice: ',                 'value'=>$tNotice]],

                      'table2'=>[['text'=>'Total No of Paid Payment: ',  'value'=>$nPaymentP],
                                 ['text'=>'Total Amount of Paid Payment: ', 'value'=>$aPaymentP],
                                 ['text'=>'Total No of Unpaid Payment: ','value'=>$nPaymentU],
                                 ['text'=>'Total Amount of Unpaid Payment: ','value'=>$aPaymentU],
                                 ['text'=>'Total No of Salary: ',        'value'=>$nSalary],
                                 ['text'=>'Total Amount of Salary: ',       'value'=>$aSalary],
                                 ['text'=>'Total Note: ',                'value'=>$note],
                                 ['text'=>'Total Notice: ',              'value'=>$notice]],

                      'table3'=>[['text'=>'Total Students: ', 'value'=>$tStudent],
                                 ['text'=>'Total Teachers: ', 'value'=>$tTeacher],
                                 ['text'=>'Total Courses: ',  'value'=>$tCourses]] ];
    		
            return view('dashboard', ['data'=>$data]);                                                                            
    	}

    	elseif (session('type') == "teacher") 
    	{
    		$courses = DB::table('courses') -> where('teacher_id', session('id'))
									    	-> where('status', 1)
									    	-> get();

	    	if(count($courses)>0)
            {
                return view('dashboard', ['courses'=>$courses]);
            }

            else
            {
                return view('dashboard');
            }
    	}

    	elseif (session('type') == "student") 
    	{
    		$studentId = session('id');
    		
            $courses = DB::table('courses')->join('payment', function($join){
                                      $join->on('courses.id', '=', 'payment.course_id')
                                           ->where('payment.status', '=', 1)
                                           ->where('payment.student_id', '=', session('id'));
                                         })->select('courses.*', 'payment.status as pstatus')
                                           ->orderBy('payment.status','desc')
                                           ->get();

	    	if(count($courses)>0)
            {
                return view('dashboard', ['courses'=>$courses]);
            }
            
            else
            {
                return view('dashboard');
            }
    	}
    }
}
