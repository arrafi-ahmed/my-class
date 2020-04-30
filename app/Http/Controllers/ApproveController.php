<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApproveController extends Controller
{
    public function teacherIndex()
    {
        $teachers = DB::table('teacher') -> get();

        if (count($teachers)>0) 
        {
            return view('list-teacher', ['teachers' => $teachers]);
        }

        else
        {
            return view('list-teacher');
        }   
    }

    public function teacherApprove(Request $req)
    {
        if ($req->has('approve')) 
        {
            $approve = DB::table('teacher') -> where('id', $req->approve) 
                                            -> update(['valid' => 1]);

            if($approve)
            {
                return redirect()->route('approveTeacher.index')->with('success', 'Account approved successfully!');
            }

            else
            {
                return back()->with('error', 'Error approving account!');
            }
        }

        elseif($req->has('block'))
        {
            $block = DB::table('teacher') -> where('id', $req->block) 
                                          -> update(['valid' => 0]);

            if($block)
            {
                return redirect()->route('approveTeacher.index')->with('success', 'Account blocked successfully!');
            }

            else
            {
                return back()->with('error', 'Error blocking account!');
            }
        }

        elseif($req->has('delete'))
        {
            $delete = DB::table('teacher') -> where('id', $req->delete) 
                                           -> delete();

            if($delete)
            {
                return redirect()->route('approveTeacher.index')->with('success', 'Account deleted successfully!');
            }

            else
            {
                return back()->with('error', 'Error deleting account!');
            }
        }
    }

    public function studentIndex()
    {
    	$students = DB::table('student') -> get();

        if (count($students)>0) 
        {
            return view('list-student', ['students' => $students]);
        }

        else
        {
            return view('list-student');
        }
    }

    public function studentApprove(Request $req)
    {
    	if ($req->has('approve')) 
    	{
    		$approve = DB::table('student') -> where('id', $req->approve) 
    										-> update(['valid' => 1]);

			if($approve)
            {
                return redirect()->route('approveStudent.index')->with('success', 'Account approved successfully!');
            }

            else
            {
                return back()->with('error', 'Error approving account!');
            }
    	}
    	
    	elseif($req->has('block'))
    	{
    		$block = DB::table('student') -> where('id', $req->block) 
    									  -> update(['valid' => 0]);

			if($block)
            {
                return redirect()->route('approveStudent.index')->with('success', 'Account blocked successfully!');
            }

            else
            {
                return back()->with('error', 'Error blocking account!');
            }
    	}
        
    	elseif($req->has('delete'))
    	{
    		$delete = DB::table('student') -> where('id', $req->delete) 
    									   -> delete();

			if($delete)
            {
                return redirect()->route('approveStudent.index')->with('success', 'Account deleted successfully!');
            }

            else
            {
                return back()->with('error', 'Error deleting account!');
            }
    	}
    } 
}
