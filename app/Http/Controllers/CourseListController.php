<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseListController extends Controller
{
    public function index(Request $req)
    {
        $courses = DB::table('courses')->orderBy('id', 'desc')->get();
    	
        if (session('type') == "student") 
        {
            $studentId = session('id');
            // $enrolled = DB::table('courses')->whereIn('id', function($query) use($studentId){$query->select('courseId')->from('choose_course')->where('studentId', $studentId);->get();
            $enrolled = DB::table('payment')->select('courseId', 'status')
                                            ->where('studentId', session('id'))
                                            ->get();

            if (count($courses)>0) {
                return view('course-list', ['courses'=>$courses, 'enrolled'=>$enrolled]);
            }
            else{
                return view('course-list');
            }
            
        }
        
        if (count($courses)>0) 
        {
            return view('course-list', ['courses'=>$courses]);  
        }

        else
        {
            return view('course-list');
        }
    	
    }

    public function open($id)
    {
    	$open = DB::table('courses') -> where('id', $id) 
    								 -> update(['status' => 1]);

		if($open)
        {
            return redirect()->route('courseList.index')->with('success', 'Course opened successfully!');
        }

        else
        {
            return back()->with('error', 'Error opening the course!');
        }
    }

    public function close($id)
    {
    	$close = DB::table('courses') -> where('id', $id) 
    								  -> update(['status' => 0]);

		if($close)
        {
            return redirect()->route('courseList.index')->with('success', 'Course closed successfully!');
        }

        else
        {
            return back()->with('error', 'Error closing the course!');
        }
    }

    public function delete($id)
    {
    	$delete = DB::table('courses') -> where('id', $id) 
    								   -> delete();

		if($delete)
        {
            return redirect()->route('courseList.index')->with('success', 'Course deleted successfully!');
        }

        else
        {
            return back()->with('error', 'Error deleting the course!');
        }
    }

    public function createGet()
    {
        return view('course-create');
    }

    public function createPost(Request $req)
    {
        $this->validate($req, [
            'name'      => 'required|max:50',
            'section'   => 'required|max:2',
            'time'      => 'required|max:20',
            'roomNo'    => 'required|max:10',
            'capacity'  => 'required|max:999|numeric',
            'teacherId' => 'required|max:10|exists:teacher,id',
            'fee'       => 'required|max:99999|numeric'
        ]);

        $createCourse = DB::table('courses')->insert(
            ['name'     => $req->name, 
            'section'   => $req->section,
            'time'      => $req->time,
            'roomNo'    => $req->roomNo,
            'capacity'  => $req->capacity,
            'teacherId' => $req->teacherId,
            'fee'       => $req->fee,
            'status'    => 0]
        );

        if ($createCourse) 
        {
            return redirect()->route('courseList.index')->with('success', 'Course created successfully!');
        }

        else
        {
            return redirect()->route('createCourse.index')->with('error', 'Error creating the course!');
        }
    }

    public function editGet($id)
    {
        $course = DB::table('courses')->find($id);
        return view('course-edit', ['course' => $course]);
    }

    public function editPost(Request $req)
    {
        $this->validate($req, [
            'name'      => 'required|max:50',
            'section'   => 'required|max:2',
            'time'      => 'required|max:20',
            'roomNo'    => 'required|max:10',
            'capacity'  => 'required|max:999|numeric',
            'teacherId' => 'required|max:10|exists:teacher,id',
            'fee'       => 'required|max:99999|numeric'
        ]);
        
        $editCourse = DB::table('courses')->where('id', $req->id)
                                          ->update(['name'      => $req->name, 
                                                    'section'   => $req->section,
                                                    'time'      => $req->time,
                                                    'roomNo'    => $req->roomNo,
                                                    'capacity'  => $req->capacity,
                                                    'teacherId' => $req->teacherId,
                                                    'fee'       => $req->fee]);
        
        if ($editCourse) 
        {
            return redirect()->route('courseList.index')->with('success', 'Course updated successfully!');
        }
        
        else
        {
            return back()->with('error', 'Error updating the course!');
        }
    }
}
