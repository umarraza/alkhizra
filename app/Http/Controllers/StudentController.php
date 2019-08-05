<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Classes;
use App\Models\Conference;
use App\Models\Test;
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
            'dateOfBirth' => 'required',
            'phoneNumber' => 'required',
        ]);

        $course = Course::find($request->course_id);
        $teacher = Teacher::find($course->teacher_id);
        
        $accessCode = mt_rand();

        DB::beginTransaction();
        try {
            
            $user = User::create([

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'accessCode' => $accessCode,
                'roleId' => 3
    
            ]);
    
            $user->save();
    
            $student = Student::create([
    
                'first_name'  =>  $request->first_name,
                'last_name'   =>  $request->last_name,
                'dateOfBirth' =>  $request->dateOfBirth,
                'phoneNumber' =>  $request->phoneNumber,
                'email'       =>  $request->email,
                'course_id'   =>  $request->course_id,
                'teacher_id'  =>  $teacher->id,
                'userId'      =>  $user->id,
            ]);
    
            $student->save();
    
            $personName  = $request->first_name . ' ' . $request->last_name;

            $message = "A random message";
            $tousername = $request->email;
    
            $userId = $user->id;
    
            \Mail::send('mail',["personName "=>$personName ,"accessCode"=>$accessCode,"userId"=>$userId], function ($message) use ($tousername) {
        
                $message->from('info@fantasycricleague.online');
                $message->to($tousername)->subject('Verify Yourself');
    
           });
    
           DB::commit();

        } catch (Exception $e) {
            throw $e;
            DB::rollBack();
        }

        return redirect()->action('StudentController@showStudents');
    }

    public function updateStudentForm(Student $student) {
        
        $courses = Course::all();
        return view('students.update_student', compact('student','courses'));
    } 

    public function updateStudent(Student $student)
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'dateOfBirth' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
        ]);

        // $student->user->email = $student->email; latter update user email and user first_name last_name as well for all users

        $student->update($data);



        return redirect()->action('StudentController@showStudents');
    }

    public function deleteStudent(Student $student) {
        
        DB::beginTransaction();

        try {
            $student->delete();
            $student->user->delete();
            DB::commit();
        } catch (Eception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->action('StudentController@showStudents');
    }

    public function allStudents(Request $request) {

        $students = Student::all();

    }

    public function startSession(Classes $class) {
        $username = Auth::User()->name;
        $email = Auth::User()->email;

        $class_id = $class->id;
        return view('whiteboard.e', compact('class_id','username', 'email'));
    }

    public function studentClasses(Request $request) {

        $student = Student::whereUserid(Auth::User()->id)->first();
        $course = $student->course;
        $course_name  =  $course->course_name;

        $classes =  Classes::where('courseId', '=', $course->id)->get();
        if (isset($classes)) {
            return view('students.student_classes', compact('classes'));
        } else {
            return \Redirect::back()->with('msg', 'No claases are set');
        }
    }

    public function studentCourses(Request $request) {

        $student = Student::whereUserid(Auth::User()->id)->first();
        // $courses = $student->course;
        // return $courses;
        $courses = Course::whereId($student->course_id)->get();
        return view('students.student_courses', compact('courses'));

    }

    public function startClass(Classes $class) {

        $class_id = $class->id;
        return view('teacher.chatPage', compact('class_id'));

    }

    public function addStudentForm(Request $request) {

        $courses = Course::all();
        return view('Students.create_student', compact('courses'));
    } 

    public function showStudents(Request $request) {
        $students = Student::all();
        return view('students.show_students', compact('students'));
    }

    public function studentConfrences(Request $request) {
        $confrences = Conference::all();    // latter change to student confrences
        return view('Conference.student_confrences', compact('confrences'));
    }

    public function studentTests(Request $request) {
        $tests = Test::all();    // latter change to student tests
        return view('Tests.student_tests', compact('tests'));
    }

}
