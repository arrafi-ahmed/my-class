<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function search(Request $req)
    {
        if ($req->type == 'teacher') 
        {
            $teacher = DB::table('teacher')->find($req->searchId);
            if ($teacher) 
            {
                return view('profile-view', ['teacher' => $teacher]);
            }

            else
            {
                return view('profile-view');
            }
            
        }
        elseif ($req->type == 'student')
        {
            $student = DB::table('student')->find($req->searchId);
            if ($student) 
            {
                return view('profile-view', ['student' => $student]);
            }

            else
            {
                return view('profile-view');
            }
            
        }

        else
        {
            return back()->with('error', 'Access Denied!');
        }
    }

    public function view($id, Request $req)
    {
        if (session('type') == 'teacher' && session('id') == $id) 
        {
            $teacher = DB::table('teacher')->find($id);
            return view('profile-view', ['teacher' => $teacher]);
        }

        elseif (session('type') == 'student' && session('id') == $id)
        {
            $student = DB::table('student')->find($id);
            return view('profile-view', ['student' => $student]);
        }

        else{
            return back()->with('error', 'Access Denied!');
        }
    }

    public function edit(Request $req)
    {
        if (session('type') == 'teacher') 
        {
            $teacher = DB::table('teacher')->find(session('id'));
            return view('profile-edit', ['teacher' => $teacher]);
        }

        elseif (session('type') == 'student')
        {
            $student = DB::table('student')->find(session('id'));
            return view('profile-edit', ['student' => $student]);
        }
    }

    public function update(Request $req)
    {
        if (session('type') == 'teacher') 
        {
            $this->validate($req, [
                'password'      => 'required|min:5|max:50|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).+$/',
                'name'          => 'required',
                'dept'          => 'required',
                'qualification' => 'required',
                'email'         => 'required|email'
            ]);

            $teacher = DB::table('teacher') ->find(session('id'));
            $update  = DB::table('teacher') ->where('id', $teacher->id)
                                            ->update(['password'    => $req->password,
                                                    'name'          => $req->name,
                                                    'dept'          => $req->dept,
                                                    'qualification' => $req->qualification,
                                                    'email'         => $req->email]);
                                                    //'profilePhoto' => $req->profilePhoto
            if ($update) {
                return redirect()->route('profile.view', session('id'))->with('success', 'Profile updated successfully!');
            }

            else
            {
                return redirect()->route('profile.edit')->with('error', 'Error updating the profile!');
            }  
        }
        
        elseif (session('type') == 'student')
        {
            $this->validate($req, [
                'password'      => 'required|min:5|max:50|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).+$/',
                'name'          => 'required',
                'dept'          => 'required',
                'parentContact' => 'required',
                'email'         => 'required|email'
            ]);

            $student = DB::table('student') ->find(session('id'));
            $update  = DB::table('student') ->where('id', session('id'))
                                            ->update(['password'    => $req->password,
                                                    'name'          => $req->name,
                                                    'dept'          => $req->dept,
                                                    'parent_contact'=> $req->parentContact,
                                                    'email'         => $req->email]);
                                                    //'profilePhoto' => $req->profilePhoto
            if ($update) 
            {
                return redirect()->route('profile.view', session('id'))->with('success', 'Profile updated successfully!');;
            }

            else
            {
                return redirect()->route('profile.edit')->with('error', 'Error updating the profile!');
            } 
        }
    	
    }
}
