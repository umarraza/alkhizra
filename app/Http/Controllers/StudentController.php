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
    public function createStudent(Request $request) {

        $validatedData = $request->validate([

            'email' => 'required|unique:users',
            'course_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'grade' => 'required',
        ]);

        
        $first_name = $request->first_name;
        $last_name = $request->last_name;

        $studentName = $first_name . ' ' . $last_name;
        
        $accessCode = mt_rand();

        $user = User::create([

            'name'    =>  $studentName,
            'email'   =>  $request->email,
            'accessCode'  =>  $accessCode,
            'roleId'  =>  3

        ]);

        $user->save();

        $student = Student::create([

            'first_name'  =>  $request->first_name,
            'last_name'   =>  $request->last_name,
            'gender'      =>  $request->gender,
            'grade'       =>  $request->grade,
            'email'       =>  $request->email,
            'course_id'   =>  $request->course_id,
            'userId'      =>  $user->id,
        ]);

        $student->save();

        $personName = $first_name . ' ' . $last_name;
        $message = "A random message";
        $tousername = $request->email;

        $userId = $user->id;

        \Mail::send('mail',["personName "=>$personName ,"accessCode"=>$accessCode,"userId"=>$userId], function ($message) use ($tousername) {
    
            $message->from('info@fantasycricleague.online');
            $message->to($tousername)->subject('Verify Yourself');

       });

        return redirect("show-students");
    }

    public function updateStudentForm($id) {

        $courses = Course::all();
        
        $student = Student::find($id);
        return view('students.update_student', compact('student','courses'));
    } 

    public function updateStudent(Request $request)
    {

        $student = Student::find($request->id);

        $id = $student->teacherId;

        $student->first_name  =  $request->first_name;
        $student->last_name   =  $request->last_name;
        $student->gender      =  $request->gender;
        $student->grade       =  $request->grade;
        $student->course_id   =  $request->course_id;

        $student->save();

        return redirect("show-students"); // remember sending id in that case only work in double quotations marks
    }

    public function deleteStudent($id) {

        $student = Student::find($id);
        $userId = $student->userId;
        $userData = User::find($userId);

        DB::beginTransaction();

        try {

            $student->delete();
            $userData->delete();

            DB::commit();

        } catch (Eception $e) {

            DB::rollBack();
            throw $e;

        }

        return redirect("show-students");
    }

    public function allStudents(Request $request) {

        $students = Student::all();

    }

    public function studentClasses(Request $request) {

        $userId     =  Auth::User()->id;
        $student    =  Student::where('userId', '=', $userId)->first();
        $course_id  =  $student->course_id;

        $course       =  Course::find($course_id);
        $course_name  =  $course->course_name;
        $class        =  Classes::where('course_id', '=', $course_id)->first();

        $class['course_name'] = $course_name;

        return view('students.student_classes', compact('class'));

    }

    public function studentCourses(Request $request) {

        $userId     =  Auth::User()->id;
        $student    =  Student::where('userId', '=', $userId)->first();
        $course_id  =  $student->course_id;

        $course       =  Course::find($course_id);

        return view('students.student_courses', compact('course'));

    }


    public function startClass($id) {

        $class_id = $id;

        return view('teacher.chatPage', compact('class_id'));

    }

    public function addStudentForm(Request $request) {

        $courses = Course::all();
        return view('students.create_student', compact('courses'));
    } 

    public function showStudents(Request $request) {
       
        $students = Student::all();
        return view('students.show_students', compact('students'));

    }

}
