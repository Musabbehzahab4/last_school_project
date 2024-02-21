<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherclassController;
use App\Http\Controllers\StudentclassController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//==================================TeacherController===============================//
Route::get('/',[TeacherController::class,'teacher'])->name('teacher');
Route::get('/teachform',[TeacherController::class,'teachform'])->name('teachform');
Route::post('/saveteacher',[TeacherController::class,'saveteacher']);
Route::get('/delete/{id}',[TeacherController::class,'delete'])->name('delete-teacher');
Route::get('/edit/{id}',[TeacherController::class,'edit'])->name('edit-teacher');
Route::post('/update/{id}',[TeacherController::class,'update']);

// =================================StudentController===============================//
Route::get('/student',[StudentController::class,'student'])->name('student');
Route::get('/studnet/studentform',[StudentController::class,'studentform'])->name('studentform');
Route::post('/student/savestudent',[StudentController::class,'savestudent']);
Route::get('/student/delete/{id}',[StudentController::class,'delete'])->name('delete-student');
Route::get('/student/edit/{id}',[StudentController::class,'edit'])->name('edit-student');
Route::post('/student/update/{id}',[StudentController::class,'update']);

//===============================ClassController==================================//
Route::get('/class',[ClassController::class,'class'])->name('classes');
Route::get('/class/classform',[ClassController::class,'classform'])->name('classform');
Route::post('/class/saveclass',[ClassController::class,'saveclass']);
Route::get('/class/delete/{id}',[ClassController::class,'delete'])->name('delete-Class');
Route::get('/class/edit/{id}',[ClassController::class,'edit'])->name('edit-class');
Route::post('/class/update/{id}',[ClassController::class,'update']);

//------------------------------TeacherclassContoller-----------------------------------//
Route::get('/teachclass',[TeacherclassController::class,'teahclass'])->name('teachclass');
Route::get('/teachclass/form',[TeacherclassController::class,'teachclassform'])->name('teachclass-form');
Route::post('/teach/saveteachclass',[TeacherclassController::class,'saveteachclass'])->name('save-teachclass');
Route::get('/teach/delete/{id}',[TeacherclassController::class,'delete'])->name('delete-teach');
Route::get('/teach/edit/{id}',[TeacherclassController::class,'edit'])->name('edit-teach');
Route::post('/teach/update/{id}',[TeacherclassController::class,'update'])->name('update-teach');

//-----------------------------StudentclassController----------------------------------//
Route::get('/studclass',[StudentclassController::class,'studclass'])->name('studclass');
Route::get('/stud-form',[StudentclassController::class,'studclassform'])->name('stud-form');
Route::post('/student/storestud',[StudentclassController::class,'storestudent'])->name('store-stud');
Route::get('/stud/delete/{id}',[StudentclassController::class,'delete'])->name('delete-stud');
Route::get('/stud/edit/{id}',[StudentclassController::class,'edit'])->name('edit-stud');
Route::post('/stud/update/{id}',[StudentclassController::class,'update'])->name('update-stud');








