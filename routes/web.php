<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/admin', function () {
    return view('admin.admin');
});


Route::get('/home', 'HomeController@index');
Route::get('/create-teacher-form', 'TeacherController@createTeacherForm');
Route::post('/create-teacher', 'TeacherController@createTeacher');

Route::get('/list-teachers', 'TeacherController@listTeachers');
Route::get('/teacher-update-form/{id}', 'TeacherController@updateTeacherForm');
Route::post('/teacher-update', 'TeacherController@teacherUpdate');
Route::get('/teacher-delete/{id}', 'TeacherController@delete');

/* ========= Student Routes ========= */
Route::get('/all-students', 'StudentController@createStudentForm');
Route::get('/create-student-form/{id}', 'StudentController@createStudentForm');
Route::get('/list-students/{id}', 'StudentController@listStudents');
Route::post('/create-student', 'StudentController@createStudent');
Route::get('/student-update-form/{id}', 'StudentController@updateStudentForm');
Route::post('/student-update', 'StudentController@updateStudent');
Route::get('/student-delete/{id}', 'StudentController@deleteStudent');







Route::get('firebase','FirebaseController@index');

Route::get('/firebase', function () {
    return view('firebase.chat');
});

Route::get('/', function () {
    return view('welcome');
});


