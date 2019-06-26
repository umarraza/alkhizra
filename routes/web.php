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

// =========== mail Routes =========== //

Route::get('/send-mail', 'TeacherController@sendMail');

Route::post('/check-response', 'WhiteboardApiController@whiteboardApi');

// =========== Access Code Routes =========== //

Route::post('/check-access-code', 'AccessCodeController@checkAccessCode');
Route::post('/new-password', 'AccessCodeController@newPassword');
Route::get('/access-code', 'AccessCodeController@accessCodeView');

/* ========= Teacher Routes ========= */

Route::get('/create-teacher-form', 'TeacherController@createTeacherForm')->middleware('lmsRole');
Route::post('/create-teacher', 'TeacherController@createTeacher')->middleware('lmsRole');
Route::get('/teacher-update-form/{id}', 'TeacherController@updateTeacherForm')->middleware('lmsRole');
Route::get('/list-teachers', 'TeacherController@listTeachers')->middleware('lmsRole');
Route::post('/teacher-update', 'TeacherController@teacherUpdate')->middleware('lmsRole');
Route::get('/teacher-courses', 'TeacherController@teacherCourses');
Route::get('/teacher-students', 'TeacherController@teacherStudents');
Route::get('/teacher-classes', 'TeacherController@teacherClasses');
Route::get('/chat-page', 'TeacherController@chatPage');
Route::get('/teacher-delete/{id}', 'TeacherController@deleteTeacher')->middleware('lmsRole');

/* ========= Student Routes ========= */

Route::get('/add-student-form', 'StudentController@addStudentForm')->middleware('lmsRole');
Route::get('/show-students', 'StudentController@showStudents')->middleware('lmsRole');
Route::post('/create-student', 'StudentController@createStudent')->middleware('lmsRole');
Route::get('/student-update-form/{id}', 'StudentController@updateStudentForm')->middleware('lmsRole');
Route::post('/student-update', 'StudentController@updateStudent')->middleware('lmsRole');
Route::get('/student-delete/{id}', 'StudentController@deleteStudent')->middleware('lmsRole');
Route::get('/student-classes', 'StudentController@studentClasses');
Route::get('/student-courses', 'StudentController@studentCourses');
Route::get('/start-class/{id}', 'StudentController@startClass');

/* ========= Course Routes ========= */

Route::get('/add-course-form', 'CourseController@addCourseForm')->middleware('lmsRole');
Route::get('/show-courses', 'CourseController@showCourses')->middleware('lmsRole');
Route::post('/create-course', 'CourseController@createCourse')->middleware('lmsRole');
Route::get('/course-update-form/{id}', 'CourseController@updateCourseForm')->middleware('lmsRole');
Route::post('/course-update', 'CourseController@updateCourse')->middleware('lmsRole');
Route::get('/course-delete/{id}', 'CourseController@deleteCourse')->middleware('lmsRole');

/* ========= Classes Routes ========= */

Route::get('/add-class-form', 'ClassController@addClassForm')->middleware('lmsRole');
Route::get('/show-classes', 'ClassController@showClasse')->middleware('lmsRole');
Route::post('/create-class', 'ClassController@createClass')->middleware('lmsRole');
Route::get('/class-update-form/{id}', 'ClassController@updateClassForm')->middleware('lmsRole');
Route::post('/class-update', 'ClassController@updateClass')->middleware('lmsRole');
Route::get('/list-classes/{id}', 'ClassController@listClasse')->middleware('lmsRole');
Route::get('/class-delete/{id}', 'ClassController@deleteClass')->middleware('lmsRole');


Route::get('firebase','FirebaseController@index');

Route::get('/firebase', function () {
    return view('firebase.chat');
});

Route::get('/', function () {
    return view('welcome');
});


