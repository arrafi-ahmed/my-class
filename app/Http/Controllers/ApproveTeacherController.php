<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApproveTeacherController extends Controller
{
    public function index()
    {
    	$teachers = DB::table('teacher') -> get();
    	return view('teacher-list', ['teachers' => $teachers]);
    }

    public function approve(Request $req)
    {
    	if (isset($_REQUEST['approve'])) 
    	{
    		$approve = DB::table('teacher') -> where('id', $req->approve) 
    										-> update(['valid' => 1]);

			return redirect()->route('approveTeacher.index');
    	}

    	elseif(isset($_REQUEST['block']))
    	{
    		$block = DB::table('teacher') -> where('id', $req->block) 
    									  -> update(['valid' => 0]);

			return redirect()->route('approveTeacher.index');
    	}
    	elseif(isset($_REQUEST['delete']))
    	{
    		$delete = DB::table('teacher') -> where('id', $req->delete) 
    									   -> delete();

			return redirect()->route('approveTeacher.index');
    	}
    } 
}
