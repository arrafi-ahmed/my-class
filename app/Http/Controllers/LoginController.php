<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function root(Request $req)
    {
        if (session()->has('type')) 
        {
            return redirect()->route('dashboard.index');
        }
        
        else
        {
            return redirect()->route('login.index');
        }
    }

    public function index()
    {
        if (session()->has('type')) 
        {
            return redirect()->route('dashboard.index');
        }
        
        return view('login');
    }

    public function login(Request $req)
    {
        if ($req->role == "teacher") 
        {
            $this->validate($req, [
                'id'        => 'required|exists:teacher',
                'password'  => 'required|exists:teacher'
            ]);

            $loginTeacher = DB::table('teacher') -> where('id', $req->id)
                                                 -> where('password', $req->password)
                                                 -> where('valid', 1)
                                                 -> first();
            
            if ($loginTeacher) 
            {
                $req-> session()->put('id', $req->id);
                $req-> session()->put('type', 'teacher');

                return redirect()->route('dashboard.index')->with('success', 'Login successful!');
            }

            else
            {
                return redirect()->route('login.index')->with('error', 'Error logging in!');
            }
        }

        elseif ($req->role == "student") 
        {
            $this->validate($req, [
                'id'        => 'required|exists:student',
                'password'  => 'required|exists:student'
            ]);

            $loginStudent = DB::table('student') -> where('id', $req->id)
                                                 -> where('password', $req->password)
                                                 -> where('valid', 1)
                                                 -> first();

            if ($loginStudent) 
            {
                $req-> session()->put('id', $req->id);
                $req-> session()->put('type', 'student');

                return redirect()->route('dashboard.index')->with('success', 'Login successful!');
            }

            else
            {
                return redirect()->route('login.index')->with('error', 'Error logging in!');
            }
        }

        elseif ($req->role == "admin") 
        {
            $this->validate($req, [
                'id'        => 'required|exists:admin',
                'password'  => 'required|exists:admin'
            ]);
            
            $loginAdmin = DB::table('admin') -> where('id', $req->id)
                                             -> where('password', $req->password)
                                             -> first();

            if ($loginAdmin) 
            {
                $req-> session()->put('id', $req->id);
                $req-> session()->put('type', 'admin');

                return redirect()->route('dashboard.index')->with('success', 'Login successful!');
            }

            else
            {
                return redirect()->route('login.index')->with('error', 'Error logging in!');
            }
        }
    }

    public function logout(Request $req)
    {
        $req->session()->flush();
        return redirect()->route('login.index')->with('success', 'Logout successful!');
    }
}
