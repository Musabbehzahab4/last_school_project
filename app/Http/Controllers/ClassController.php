<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class ClassController extends Controller
{
    public function class ()
    {
        $class = DB::table('classes')->get();
        return view('layouts.class', compact('class'));
    }
    public function classform()
    {
        $title = "Add Class";
        $url = "/class/saveclass";
        return view('layouts.class-form', compact('title', 'url'));
    }
    public function saveclass(Request $request)
    {
        $name = $request->input('class');
        DB::table('classes')->insert([
            'name' => $name,

        ]);
        return redirect('/class');
    }
    public function delete($id)
    {

        if (!is_numeric($id)) {
            return redirect('/class')->with('error', 'Invalid ID provided.');
        }
        $class = DB::table('classes')->find($id);

        if (!is_null($class)) {
            DB::table('classes')->where('id', $id)->delete();
            return redirect('/class')->with('success', 'Class deleted successfully.');
        } else {
            return redirect('/class')->with('error', 'Class not found.');
        }
    }
    public function edit($id)
    {
        $class = DB::table('classes')->find($id);
        if(is_null($class)){
            return redirect('/class');
        }else{
            $title = "Update Class";
            $url = "/class/update" . '/'. $id;
            return view('layouts.class-form',compact('class','title','url'));
        }
    }

    public function update(Request $request, $id)
    {
        $class = DB::table('classes')->where('id', $id)->first();

        if (!is_null($class)) {
            DB::table('classes')->where('id', $id)->update(['name' => $request->input('class')]);
            return redirect('/class');
        } else {
            return redirect('/class');
        }
    }
}

