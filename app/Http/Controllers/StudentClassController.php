<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StudentclassController extends Controller
{
    public function studclass()
    {
        $studclass = DB::table('stduent_classes')
        ->join('classes', 'classes.id', '=', 'stduent_classes.Class_name')
        ->join('students', 'students.id', '=', 'stduent_classes.student_name')
        ->select('stduent_classes.*', 'classes.name as class_name', 'students.name as student_name')
        ->get();
          
        return view('layouts.student-class')->with(compact('studclass'));
    }
    public function studclassform()
    {
        $title = 'Add dddd';
        $url = '/student/storestud';
        $class = DB::table('classes')->get();
        $student = DB::table('students')->get();
        return view('layouts.studentclass-form')->with(compact('class', 'student','title','url'));
    }
    public function storestudent(Request $request)
    {
        $name = $request->input('class');
        $email = $request->input('student');


        DB::table('stduent_classes')->insert([
            'Class_name' => $name,
            'student_name' => $email,

        ]);

        return redirect()->route('studclass');
    }
    public function delete($id)
    {
        if (!is_numeric($id)) {
            return redirect('/studclass')->with('error', 'Invalid ID provided.');
        }
        $class = DB::table('stduent_classes')->find($id);

        if (!is_null($class)) {
            DB::table('stduent_classes')->where('id', $id)->delete();
            return redirect('/studclass')->with('success', 'Class deleted successfully.');
        } else {
            return redirect('/studclass')->with('error', 'Class not found.');
        }
    }
    public function edit($id)
    {
        $studclass = DB::table('stduent_classes')->find($id);
        $class = DB::table('classes')->get();
        $student = DB::table('students')->get();
        if (is_null($studclass)) {
            return redirect()->route('studclass');
        } else {
            $title = 'Update';
            $url = '/stud/update'. '/' . $id;
           return view('layouts.studentclass-form',compact('studclass','class','student','title','url'));
        }
    }
    public function update(Request $request, $id)
    {
        $class_name = $request->input('class');
        $student_name = $request->input('student');


        DB::table('stduent_classes')
            ->where('id', $id)
            ->update([
                'Class_name' => $class_name,
                'student_name' => $student_name,
            ]);

        return redirect()->route('studclass');
    }
}
