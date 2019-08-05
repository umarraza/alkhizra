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
Route::get('/teacher', function () {
    return view('teacher.teacher');
});
Route::get('/student', function () {
    return view('Students.student');
});


Route::get('/admin', function () {
    return view('admin.admin');
});

Route::get('/screenshare', function() {
    return view('whiteboard.screenshare');
});

Route::get('/whiteboard', function() {
    return view('whiteboard.whiteboard');
});


// Zoom API Routes


Route::get('/create-account-form','AccountController@createAccountForm');

Route::get('/get-autorization-code','AccountController@createAccount');


Route::get('/home', 'HomeController@index');
Route::get('/access-token', 'VideoController@getAccessToken');

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
Route::get('/list-teachers', 'TeacherController@listTeachers')->middleware('lmsRole');
Route::get('/teacher-courses', 'TeacherController@teacherCourses');
Route::get('/teacher-students', 'TeacherController@teacherStudents');
Route::get('/teacher-classes', 'TeacherController@teacherClasses');
Route::get('/chat-page', 'TeacherController@chatPage');
Route::get('/teacher-delete/{teacher}', 'TeacherController@deleteTeacher')->middleware('lmsRole');
Route::post('/teacher-update/{teacher}', 'TeacherController@teacherUpdate')->middleware('lmsRole');
Route::get('/teacher-update-form/{teacher}', 'TeacherController@updateTeacherForm')->middleware('lmsRole');
Route::get('/start-session/{class}', 'TeacherController@startSession');

/* ========= Student Routes ========= */

Route::get('/add-student-form', 'StudentController@addStudentForm')->middleware('lmsRole');
Route::get('/show-students', 'StudentController@showStudents')->middleware('lmsRole');
Route::post('/create-student', 'StudentController@createStudent')->middleware('lmsRole');
Route::get('/student-classes', 'StudentController@studentClasses');
Route::get('/student-courses', 'StudentController@studentCourses');
Route::get('/student-update-form/{student}', 'StudentController@updateStudentForm')->middleware('lmsRole');
Route::post('/student-update/{student}', 'StudentController@updateStudent')->middleware('lmsRole');
Route::get('/student-delete/{student}', 'StudentController@deleteStudent')->middleware('lmsRole');
Route::get('/start-class/{class}', 'StudentController@startClass');
Route::get('/start-student-session/{class}', 'StudentController@startSession');
Route::get('/student-confrences', 'StudentController@studentConfrences');
Route::get('/student-tests', 'StudentController@studentTests');

/* ========= Course Routes ========= */

Route::get('/add-course-form', 'CourseController@addCourseForm')->middleware('lmsRole');
Route::get('/show-courses', 'CourseController@showCourses')->middleware('lmsRole');
Route::post('/create-course', 'CourseController@createCourse')->middleware('lmsRole');
Route::get('/course-update-form/{course}', 'CourseController@updateCourseForm')->middleware('lmsRole');
Route::post('/course-update/{course}', 'CourseController@updateCourse')->middleware('lmsRole');
Route::get('/course-delete/{course}', 'CourseController@deleteCourse')->middleware('lmsRole');

/* ========= Classes Routes ========= */

Route::get('/add-class-form', 'ClassController@addClassForm')->middleware('lmsRole');
Route::get('/show-classes', 'ClassController@showClasse')->middleware('lmsRole');
Route::post('/create-class', 'ClassController@createClass')->middleware('lmsRole');
Route::get('/list-classes/{id}', 'ClassController@listClasse')->middleware('lmsRole');
Route::get('/class-delete/{class}', 'ClassController@deleteClass')->middleware('lmsRole');
Route::get('/class-update-form/{class}', 'ClassController@updateClassForm')->middleware('lmsRole');
Route::post('/class-update/{class}', 'ClassController@updateClass')->middleware('lmsRole');


/* ========= Conferences Routes ========= */
Route::get('/add-conference-form', 'ConferenceController@confereneceForm')->middleware('lmsRole');
Route::post('/create-conferenece', 'ConferenceController@createConferenec')->middleware('lmsRole');
Route::get('/show-conferenece', 'ConferenceController@showConfreneces')->middleware('lmsRole');
Route::get('/teacher-conferences', 'ConferenceController@teacherConferences');
Route::get('/conference-update-form/{conference}', 'ConferenceController@updateConfereneceForm')->middleware('lmsRole');
Route::post('/conference-update/{conference}', 'ConferenceController@updateConferenece')->middleware('lmsRole');
Route::get('/conference-delete/{conference}', 'ConferenceController@deleteConferenece')->middleware('lmsRole');

/* ========= Conferences Routes ========= */
Route::get('/create-test-form', 'TestController@testForm');
Route::post('/create-test', 'TestController@createTest');
Route::get('/teachers-tests', 'TestController@teacherTests');
Route::get('/test-update-form/{test}', 'TestController@updateTestForm');
Route::post('/test-update/{test}', 'TestController@updateTest');
Route::get('/test-delete/{test}', 'TestController@deleteTest');
Route::get('/show-tests', 'TestController@listsTests');






Route::get('firebase','FirebaseController@index');

Route::get('/firebase', function () {
    return view('firebase.chat');
});

Route::get('/', function () {
    return view('welcome');
});


