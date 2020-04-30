<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function index()
    {
    	return view('salary');
    }

    public function modify(Request $req)
    {
    	if (isset($req->find) || isset($req->pay) || isset($req->save)) 
    	{
            $this->validate($req, [
                'teacherId' => 'required|exists:teacher,id'
            ]);

            $teacher  = DB::table('teacher')->where('id', $req->teacherId)
                                            ->first();
            
            if (isset($req->pay) && isset($teacher))
            {
                $pay = DB::table('salary')->insert(['amount'   =>$teacher->salary,
                                             'status'   =>1,
                                             'teacherId'=>$req->teacherId]);

                $salaries = DB::table('salary')->where('teacherId', $req->teacherId)
                                           ->orderBy('id', 'desc')
                                           ->get();
            
                if(count($salaries)<0 && $pay)
                {
                    return view('salary', ['teacher'=>$teacher, 'success'=>'Action performed successfully!']);
                }

                elseif (count($salaries)>0 && $pay)
                {
                    return view('salary', ['teacher'=>$teacher, 'salaries'=>$salaries, 'success'=>'Action performed successfully!']); 
                }

                elseif(count($salaries)<0 && !$pay)
                {
                    return view('salary', ['teacher'=>$teacher, 'error'=>'Error performing the action!']);
                }

                elseif (count($salaries)>0 && !$pay)
                {
                    return view('salary', ['teacher'=>$teacher, 'salaries'=>$salaries, 'error'=>'Error performing the action!']); 
                }

                else
                {
                    return view('salary', ['teacher'=>$teacher]); 
                }   
            }

            elseif (isset($req->save))
            {
                $this->validate($req, [
                    'amount' => 'required|numeric'
                ]);

                $save = DB::table('salary') ->where('id', $req->salaryId)
                                    ->update(['amount'  =>$req->amount,
                                              'status'   =>$req->status]);

                $salaries = DB::table('salary')->where('teacherId', $req->teacherId)
                       ->orderBy('id', 'desc')
                       ->get();
            
                if(count($salaries)<0 && $save)
                {
                    return view('salary', ['teacher'=>$teacher, 'success'=>'Action performed successfully!']);
                }

                elseif (count($salaries)>0 && $save)
                {
                    return view('salary', ['teacher'=>$teacher, 'salaries'=>$salaries, 'success'=>'Action performed successfully!']); 
                }

                elseif(count($salaries)<0 && !$save)
                {
                    return view('salary', ['teacher'=>$teacher, 'error'=>'Error performing the action!']);
                }

                elseif (count($salaries)>0 && !$save)
                {
                    return view('salary', ['teacher'=>$teacher, 'salaries'=>$salaries, 'error'=>'Error performing the action!']); 
                }

                else
                {
                    return view('salary', ['teacher'=>$teacher]); 
                }   
            }

            $salaries = DB::table('salary')->where('teacherId', $req->teacherId)
                       ->orderBy('id', 'desc')
                       ->get();

            if (count($salaries)>0)
            {
                return view('salary', ['teacher'=>$teacher, 'salaries'=>$salaries]); 
            }

            else
            {
                return view('salary', ['teacher'=>$teacher]); 
            }   
    	}
    }
}
