<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class TeacherclassController extends Controller
{
    public function teahclass(Request $request)
    {
        $teachclass = DB::table('teacherclasses')
            ->join('classes', 'classes.id', '=', 'teacherclasses.Class_name')
            ->join('teachers', 'teachers.id', '=', 'teacherclasses.teacher_name')
            ->select('teacherclasses.*', 'classes.name as class_name', 'teachers.name as teacher_name')
            ->get();


        return view('layouts.teacher-class')->with(compact('teachclass'));
    }
    public function teachclassform()
    {
        $title = 'Add ';
        $url = '/teach/saveteachclass';
        $class = DB::table('classes')->get();
        $teacher = DB::table('teachers')->get();
        return view('layouts.teacherclass-form', compact('class', 'teacher','title','url'));
    }
    public function saveteachclass(Request $request)
    {
        $name = $request->input('class');
        $email = $request->input('teacher');


        DB::table('teacherclasses')->insert([
            'Class_name' => $name,
            'teacher_name' => $email,

        ]);


        return redirect()->route('teachclass');
    }

    public function delete($id)
    {

        if (!is_numeric($id)) {
            return redirect('/teachclass')->with('error', 'Invalid ID provided.');
        }
        $class = DB::table('teacherclasses')->find($id);

        if (!is_null($class)) {
            DB::table('teacherclasses')->where('id', $id)->delete();
            return redirect('/teachclass')->with('success', 'Class deleted successfully.');
        } else {
            return redirect('/teachclass')->with('error', 'Class not found.');
        }

    }
    public function edit($id)
    {
        $teachclass = DB::table('teacherclasses')->find($id);
        $class = DB::table('classes')->get();
        $teacher = DB::table('teachers')->get();
        if (is_null($teachclass)) {
            return redirect()->route('teachclass');
        } else {
            $title = 'update';
            $url = '/teach/update' . '/' . $id;
            return view('layouts.teacherclass-form', compact('teachclass', 'class', 'teacher', 'title', 'url'));
        }

    }
    public function update($id, Request $request)
    {
        $class_name = $request->input('class');
        $student_name = $request->input('teacher');


        DB::table('teacherclasses')
            ->where('id', $id)
            ->update([
                'Class_name' => $class_name,
                'teacher_name' => $student_name,
            ]);
        return redirect()->route('teachclass');
    }
}
