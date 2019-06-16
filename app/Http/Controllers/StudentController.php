<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;




class StudentController extends Controller
{
    public function createStudentForm($id) {

        return view('students.create_student', compact('id'));
    } 

    public function listStudents(Request $request) {
       
        $id = $request->id;
        $students = Student::where('teacherId', '=', $request->id)->get();
        return view('students.show_students', compact('students', 'id'));

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

        $teacherId = $request->teacherId;

        $student = Student::create([

            'first_name'  =>  $request->first_name,
            'last_name'   =>  $request->last_name,
            'gender'      =>  $request->gender,
            'grade'       =>  $request->grade,
            'email'       =>  $request->email,
            'teacherId'   =>  $teacherId,

        ]);

        $student->save();

        return redirect("list-students/$teacherId");

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
        return $student;
        $student->delete();

        return redirect("list-students/$id");
    }

    public function allStudents(Request $request) {

        $students = Student::all();

    }

}
