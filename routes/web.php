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


/* ========= Teacher Routes ========= */

Route::get('/create-teacher-form', 'TeacherController@createTeacherForm')->middleware('lmsRole');
Route::post('/create-teacher', 'TeacherController@createTeacher');

Route::get('/list-teachers', 'TeacherController@listTeachers');
Route::get('/teacher-update-form/{id}', 'TeacherController@updateTeacherForm');
Route::post('/teacher-update', 'TeacherController@teacherUpdate');
Route::get('/teacher-delete/{id}', 'TeacherController@delete');




/* ========= Student Routes ========= */

Route::get('/create-student-form/{id}', 'StudentController@createStudentForm');
Route::get('/list-students/{id}', 'StudentController@listStudents');
Route::post('/create-student', 'StudentController@createStudent');
Route::get('/student-update-form/{id}', 'StudentController@updateStudentForm');
Route::post('/student-update', 'StudentController@updateStudent');
Route::get('/student-delete/{id}', 'StudentController@deleteStudent');




/* ========= Course Routes ========= */

Route::get('/create-course-form/{id}', 'CourseController@createCourseForm');
Route::get('/list-courses/{id}', 'CourseController@listCourses');
Route::post('/create-course', 'CourseController@createCourse');
Route::get('/course-update-form/{id}', 'CourseController@updateCourseForm');
Route::post('/course-update', 'CourseController@updateCourse');
Route::get('/course-delete/{id}', 'CourseController@deleteCourse');


/* ========= Classes Routes ========= */

Route::get('/create-class-form/{id}', 'ClassController@createClassForm');
Route::post('/create-class', 'ClassController@createClass');
Route::get('/class-update-form/{id}', 'ClassController@updateClassForm');
Route::post('/class-update', 'ClassController@updateClass');
Route::get('/list-classes/{id}', 'ClassController@listClasse');
Route::get('/class-delete/{id}', 'ClassController@deleteClass');



Route::get('firebase','FirebaseController@index');

Route::get('/firebase', function () {
    return view('firebase.chat');
});

Route::get('/', function () {
    return view('welcome');
});


