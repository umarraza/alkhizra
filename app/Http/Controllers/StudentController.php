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

        $course = Course::find($request->course_id);
        
        $teacher = Teacher::find($course->teacherId);

        $first_name = $request->first_name;
        $last_name = $request->last_name;

        $studentName = $first_name . ' ' . $last_name;
        
        $accessCode = mt_rand();

        DB::beginTransaction();
        try {
            
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
                'teacher_id'  =>  $teacher->id,
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
            'gender' => 'required',
            'grade' => 'required',
            'course_id' => 'required',
        ]);

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
        $class =  Classes::where('course_id', '=', $course->id)->first();
        if (isset($class)) {
            return view('students.student_classes', compact('class'));
        } else {
            return \Redirect::back()->with('msg', 'The Message');
        }
    }

    public function studentCourses(Request $request) {

        $student = Student::whereUserid(Auth::User()->id)->first();
        $course = $student->course;
        return view('students.student_courses', compact('course'));

    }


    public function startClass(Classes $class) {

        $class_id = $class->id;
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
