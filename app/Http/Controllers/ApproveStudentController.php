<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApproveStudentController extends Controller
{
    public function index()
    {
    	$students = DB::table('student') -> get();
    	return view('student-list', ['students' => $students]);
    }

    public function approve(Request $req)
    {
    	if (isset($_REQUEST['approve'])) 
    	{
    		$approve = DB::table('student') -> where('id', $req->approve) 
    										-> update(['valid' => 1]);

			return redirect()->route('approveStudent.index');
    	}
    	
    	elseif(isset($_REQUEST['block']))
    	{
    		$block = DB::table('student') -> where('id', $req->block) 
    									  -> update(['valid' => 0]);

			return redirect()->route('approveStudent.index');
    	}
    	elseif(isset($_REQUEST['delete']))
    	{
    		$delete = DB::table('student') -> where('id', $req->delete) 
    									   -> delete();

			return redirect()->route('approveStudent.index');
    	}
    } 
}
