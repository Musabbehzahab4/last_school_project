<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teacher()
    {
        $teacher = DB::table('teachers')->get();
        return view('layouts.teacher', compact('teacher'));
    }

    public function teachform()
    {
        $title = 'Add Teacher';
        $url = '/saveteacher';
        return view('layouts.teacher_form', compact('title', 'url'));
    }

    public function saveteacher(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone_no');

        DB::table('teachers')->insert([
            'name' => $name,
            'email' => $email,
            'phone_no' => $phone,

        ]);
        return redirect('/');
    }
    public function delete($id)
    {
        if (!is_numeric($id)) {
            return redirect('/')->with('error', 'Invalid ID provided.');
        }
        $class = DB::table('teachers')->find($id);

        if (!is_null($class)) {
            DB::table('teachers')->where('id', $id)->delete();
            return redirect('/')->with('success', 'Class deleted successfully.');
        } else {
            return redirect('/')->with('error', 'Class not found.');
        }
    }
public function edit($id)
{
    $teacher = DB::table('teachers')->find($id);
    if(is_null($teacher)){
        return redirect('/');
    }else{
        $title = "Update Teacher";
        $url = '/update'.'/'. $id;
        return view("layouts.teacher_form",compact('title','teacher','url'));
    }
}
public function update(Request $request, $id)
{
    $name = $request->input('name');
    $email = $request->input('email');
    $phone_no = $request->input('phone_no');

    DB::table('teachers')
        ->where('id', $id)
        ->update([
            'name' => $name,
            'email' => $email,
            'phone_no' => $phone_no
        ]);
    return redirect('/');

}

}
