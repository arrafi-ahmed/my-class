<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseDashboardController extends Controller
{
    public function index($id, Request $req)
    {
    	$session        = $req->session()->all();
    	$course         = DB::table('courses')->find($id);
    	$teacher        = DB::table('teacher')->find($course->teacherId);
        $notices        = DB::table('notice') ->where('courseId', $course->id)->get();
        $notes          = DB::table('note')   ->where('courseId', $course->id)->get();
        $results        = DB::table('result') ->where('courseId', $id)->get();

        if ($session['type']=='admin' || $session['type']=='teacher' ) 
        {
            $choose_course  = DB::table('choose_course')->where('courseId', $id);
            $students       = DB::table('student')->rightJoinSub($choose_course, 'chooseCourse', function($join){
                                                    $join->on('student.id','=','chooseCourse.studentId');
                                                })->get();
        }
        elseif ($session['type']=='student') 
        {
            $students       = DB::table('result')-> where('courseId', $id)
                                                 -> where('studentId',$session['id'])
                                                 ->first();
        }

    	return view('course-dashboard', ['course'=>$course, 'teacher'=>$teacher, 'students'=>$students, 'notices'=>$notices, 'notes'=>$notes, 'results'=>$results, 'session'=>$session]);
    }

    public function createNotice($id, Request $req)
    {
    	$sessionType = $req->session()->get('type');
        if($sessionType == 'admin' || $sessionType == 'teacher'){

            $insert = DB::table('notice')->insert(
                ["content" =>$req->content,
                 "courseId"=>$id]
            );

            return redirect()->route('courseDashboard1.index', $id);
        }
    }

    public function createNote($id, Request $req)
    {
        $sessionType = $req->session()->get('type');
        if($sessionType == 'admin' || $sessionType == 'teacher')
        {

            if ($req->hasFile('uploadNote')) 
            {
                $file = $req->file('uploadNote');
                $filename = $file->getClientOriginalName();
                $filesize = $file->getSize();
                $sizeMB   = round((round(((int) $filesize/1024), 1)/1024), 3);
                
                if ($file->move('upload/note/', $filename))
                {
                    $insert = DB::table('note')->insert(
                        ["filename" =>$filename,
                         "courseId" =>$id,
                         "size"     =>$sizeMB]
                    );
                }
            }
            
            return redirect()->route('courseDashboard2.index', $id);
        }
    }

    public function downloadNote($filename, Request $req)
    {
        $filepath = public_path()."/upload/note/".$filename;
        echo $filepath;
        if (file_exists($filepath)) 
        {
            return response()->download($filepath, $filename, ['Content-Disposition' => 'attachment; filename=' . $filename]);
        }
        else
        {
            exit("File not found!");
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
        }
        else
        {
            $insert = DB::table('result')->insert(['result'    =>$req->grade,
                                                   'courseId'  =>$req->id,
                                                   'studentId' =>$req->studentId]);
        }
        
        return redirect()->route('courseDashboard3.index', $id);
    }
}