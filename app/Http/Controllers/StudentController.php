<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Classes;


use App\Models\User;
use Auth;
use DB;


class StudentController extends Controller
{


    public function addStudentForm(Request $request) {

        $courses = Course::all();

        return view('students.create_student', compact('courses'));
    } 

    public function showStudents(Request $request) {
       
        $students = Student::all();
        return view('students.show_students', compact('students'));

    }

















    public function listStudents(Request $request) {
       
        $id = $request->id;
        $students = Student::where('teacherId', '=', $request->id)->get();
        return view('students.show_students', compact('students', 'id'));

    }















    public function createStudentForm($id) {

        return view('students.create_student', compact('id'));
    } 

    public function createStudent(Request $request) {


        $first_name = $request->first_name;
        $last_name = $request->last_name;

        $studentName = $first_name . ' ' . $last_name;

        $user = User::create([

            'name'    =>  $studentName,
            'email'   =>  $request->email,
            'roleId'  =>  3

        ]);

        $user->save();

        // $teacherId = $request->teacherId;

        $student = Student::create([

            'first_name'  =>  $request->first_name,
            'last_name'   =>  $request->last_name,
            'gender'      =>  $request->gender,
            'grade'       =>  $request->grade,
            'email'       =>  $request->email,
            'course_id'   =>  $request->course_id,
            'userId'      =>  $user->id,

            // 'teacherId'   =>  $teacherId,

        ]);

        $student->save();

        return redirect("show-students");

        // return redirect("list-students/$teacherId");

    }

    public function updateStudentForm($id) {

        $student = Student::find($id);

        return view('students.update_student', compact('student'));
    } 

    public function updateStudent(Request $request)
    {

        $student = Student::find($request->id);

        $id = $student->teacherId;

        $student->first_name  =  $request->first_name;
        $student->last_name   =  $request->last_name;
        $student->gender      =  $request->gender;
        $student->grade       =  $request->grade;

        $student->save();

        return redirect("list-students/$id"); // remember sending id in that case only work in double quotations marks
    }

    public function deleteStudent($id) {

        $student = Student::find($id);
        $student->delete();

        return redirect("list-students/$id");
    }

    public function allStudents(Request $request) {

        $students = Student::all();

    }


    public function studentClasses(Request $request) {

        $userId = Auth::User()->id;

        $student = Student::where('userId', '=', $userId)->first();

        $course_id = $student->course_id;

        $course = Course::find($course_id);

        $course_name = $course->course_name;

        $class = Classes::where('course_id', '=', $course_id)->first();

        $class['course_name'] = $course_name;

        return view('students.student_classes', compact('class'));

    }

    public function startClass(Request $request) {

        $class_id = $request->class_id;

        return view('teacher.chatPage', compact('class_id'));

    }

}
