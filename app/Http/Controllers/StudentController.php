<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student()
    {
       
        $student = DB::table('students')->get();
        return view('layouts.student',compact('student'));
    }
    public function studentform()
    {
        $title = 'Add Student';
        $url = '/student/savestudent';
        return view('layouts.student-form',compact('title','url'));
    }

    public function savestudent(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone_no');

        DB::table('students')->insert([
            'name' => $name,
            'email' => $email,
            'phone_no' => $phone,

        ]);

        return redirect('/student');

    }
    public function delete($id)
    {
        if (!is_numeric($id)) {
            return redirect('/student')->with('error', 'Invalid ID provided.');
        }
        $class = DB::table('students')->find($id);

        if (!is_null($class)) {
            DB::table('students')->where('id', $id)->delete();
            return redirect('/student')->with('success', 'Class deleted successfully.');
        } else {
            return redirect('/student')->with('error', 'Class not found.');
        }
    }

    public function edit($id)
    {

        $student = DB::table('students')->find($id);
        if(is_null($student)){
            return redirect('/student');
        }else{
            $title = 'Update Student';
            $url = '/student/update'.'/'.$id;
            return view('layouts.student-form',compact('student','title','url'));
        }
    }
    public function update(Request $request, $id)
{
    $name = $request->input('name');
    $email = $request->input('email');
    $phone_no = $request->input('phone_no');

    DB::table('students')
        ->where('id', $id)
        ->update([
            'name' => $name,
            'email' => $email,
            'phone_no' => $phone_no
        ]);

    return redirect('/student');
}
}
