<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseDashboardController extends Controller
{
    public function index($id, Request $req)
    {
        if (session('type') =='student') 
        {
            $studentId = session('id');
            $validCourses       = DB::table('student')->join('payment', function($join) use($studentId){
                                         $join->on('student.id', '=', 'payment.studentId')
                                              ->where('payment.studentId', '=', $studentId)
                                              ->where('payment.status', '=', 1);
                                            })->get();
            
            $found = false;
            foreach ($validCourses as $validCourse) 
            {
                if ($validCourse->courseId == $id) 
                {
                    $found = true; break;
                }

                if ($found) 
                {
                    $course         = DB::table('courses')->find($id);
                    $teacher        = DB::table('teacher')->find($course->teacherId);
                    $notices        = DB::table('notice') ->where('courseId', $course->id)->get();
                    $notes          = DB::table('note')   ->where('courseId', $course->id)->get();
                    $studentResult  = DB::table('result') ->where('courseId', $id)
                                                          ->where('studentId',session('id'))
                                                          ->first();
                    return view('course-dashboard', ['course'=>$course, 'teacher'=>$teacher, 'studentResult'=>$studentResult, 'notices'=>$notices, 'notes'=>$notes]);
                }

                else
                {
                    return back()->with('error', 'Access denied!');
                }
            }
        }

    	$course         = DB::table('courses')->find($id);
    	$teacher        = DB::table('teacher')->find($course->teacherId);
        $notices        = DB::table('notice') ->where('courseId', $course->id)->get();
        $notes          = DB::table('note')   ->where('courseId', $course->id)->get();
        $results        = DB::table('result') ->where('courseId', $id)->get();
        
        $students       = DB::table('student')->join('payment', function($join) use($id){
                                         $join->on('student.id', '=', 'payment.studentId')
                                              ->where('payment.courseId', '=', $id)
                                              ->where('payment.status', '=', 1);
                                            })->get();
        
    	return view('course-dashboard', ['course'=>$course, 'teacher'=>$teacher, 'students'=>$students, 'notices'=>$notices, 'notes'=>$notes, 'results'=>$results]);
    }

    public function createNotice($id, Request $req)
    {
    	if(session('type') == 'admin' || session('type') == 'teacher')
        {
            $insert = DB::table('notice')->insert(["content" =>$req->content,
                                                     "courseId"=>$id]);
            if ($insert) 
            {
                return redirect()->route('courseDashboard1.index', $id)->with('success', 'Notice created succesfully!');
            }

            else
            {
                return back()->with('error', 'Error creating the notice!');
            }
            
        }
    }

    public function createNote($id, Request $req)
    {
        $sessionType = $req->session()->get('type');
        if($sessionType == 'admin' || $sessionType == 'teacher')
        {
            $this->validate($req, [
                'uploadNote' => 'required|file|max:20000'
            ]);

            if ($req->hasFile('uploadNote')) 
            {
                $file = $req->file('uploadNote');
                $filename = $file->getClientOriginalName();
                $filesize = $file->getSize();
                $sizeMB   = round((round(((int) $filesize/1024), 1)/1024), 3);
                
                if ($file->move('upload/note/', $filename))
                {
                    $insert = DB::table('note')->insert(["filename" =>$filename,
                                                         "courseId" =>$id,
                                                         "size"     =>$sizeMB]);
                    if ($insert) {
                        return redirect()->route('courseDashboard2.index', $id)->with('success', 'Note uploaded succesfully!');
                    }

                    else
                    {
                        return back()->with('error', "Error uploading the note!");
                    }
                    
                }
            }
            
            return redirect()->route('courseDashboard2.index', $id);
        }
    }

    public function downloadNote($name, Request $req)
    {
        $filepath = public_path()."/upload/note/".$name;
        
        if (file_exists($filepath)) 
        {
            return response()->download($filepath, $name, ['Content-Disposition' => 'attachment; name=' . $name]);
        }

        else
        {
            return back()->with('error', 'Downloading note failed!'); //exit("File not found!");
        }
    }

    public function saveResult($id, Request $req)
    {   
        
        if ($req->update) 
        {
            $update = DB::table('result')->where('id', $req->resultId)
                                         ->update(['result'    =>$req->grade,
                                                   'courseId'  =>$req->id,
                                                   'studentId' =>$req->studentId]);
            if ($update) 
            {
                return redirect()->route('courseDashboard3.index', $id)->with('success', 'Result saved successfully!');   
            }  

            else
            {
                return back()->with('error', 'Result updating failed!');
            }                           
        }

        else
        {
            $insert = DB::table('result')->insert(['result'    =>$req->grade,
                                                   'courseId'  =>$req->id,
                                                   'studentId' =>$req->studentId]);
            if ($insert) 
            {
                return redirect()->route('courseDashboard3.index', $id)->with('success', 'Result saved successfully!');
            }

            else
            {
                return back()->with('error', 'Result updating failed!');
            }
        }
    }
}