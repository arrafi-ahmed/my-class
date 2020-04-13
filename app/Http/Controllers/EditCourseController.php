<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditCourseController extends Controller
{
   	public function index($id)
    {
    	$course = DB::table('courses')->find($id);
    	return view('edit-course', ['course' => $course]);
    }

    public function update(Request $req)
    {
    	$editCourse = DB::table('courses')->update(
            ['name'     => $req->name, 
            'section'   => $req->section,
            'time'      => $req->time,
            'roomNo'    => $req->roomNo,
            'capacity'  => $req->capacity,
            'teacherId' => $req->teacherId]
        );

        if ($editCourse) {
            return redirect()->route('courseList.index');
        }else{
            return redirect()->route('editCourse.index');
        }
    }
}
