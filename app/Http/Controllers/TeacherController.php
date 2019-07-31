<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Course;
use App\Models\Classes;
use App\Models\User;
use Auth;
use DB;

class TeacherController extends Controller
{

    public function createTeacher(Request $request) {

        $validatedData = $request->validate([
        
            'first_name' => 'required',
            'last_name' => 'required',
            'specialization' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required|unique:users',

        ]);

        $first_name = $request->first_name;
        $last_name = $request->last_name;

        $teacherName = $first_name . ' ' . $last_name;

        $accessCode = mt_rand();

        DB::beginTransaction();
        try {

            $user = User::create([

                'name'        =>  $teacherName,
                'email'       =>  $request->email,
                'accessCode'  =>  $accessCode,
                'roleId'  =>  2
    
            ]);
    
            $teacher = Teacher::create([
    
                'first_name'     =>  $request->first_name,
                'last_name'      =>  $request->last_name,
                'specialization' =>  $request->specialization,
                'phoneNumber'    =>  $request->phoneNumber,
                'email'          =>  $request->email,
                'userId'         =>  $user->id,
    
            ]);
    
            $personName  = $first_name . ' ' . $last_name;

            $message = "A random message";
            $tousername = $request->email;
    
            $userId = $user->id;
    
            \Mail::send('mail',["personName "=>$personName ,"accessCode"=>$accessCode,"userId"=>$userId], function ($message) use ($tousername) {
    
                $message->from('info@fantasycricleague.online');
                $message->to($tousername)->subject('Verify Yourself');
    
           });

            DB::commit();

        } catch (Exception $e) {
            DB::rolleBack();
            throw $e;
        }

        return redirect()->action('TeacherController@listTeachers');

    }

    public function listTeachers() {

        $teachers = Teacher::all();
        return view('teacher.show_all_teachers', compact('teachers'));

    }

    public function teacherUpdate(Teacher $teacher)
    {

        $data = request()->validate([

            'first_name'   =>  'required',
            'last_name'    =>  'required',
            'address'      =>  'required',
            'description'  =>  'required'
        
        ]);
    
        DB::beginTransaction();
        try {
            $teacher->update($data);
            User::whereId($teacher->user->id)->update([
                "name" => $teacher->first_name . ' ' . $teacher->last_name,
            ]);
            DB::commit();
        } catch (Exception $th) {
            throw $te;
            DB::rollBack();
        }

        return redirect()->action('TeacherController@listTeachers');
    }

    public function deleteTeacher(Teacher $teacher) {
        
        $courses  = $teacher->courses;        
        $students = $teacher->students;
        $classes  = $teacher->classes;
        $user     = $teacher->user;
        
        $userIds = $students->map(function($user) {
            return $user['userId'];
        });
        $taachers = $teacher->classes;
        
        DB::beginTransaction();
        try {

            $courses->each->delete();
            $classes->each->delete();
            $students->each->delete();
            $teacher->delete();
            User::whereIn('id', $userIds)->delete();
            $user->delete();
            
            DB::commit();
        } catch (Exception $e) {
            throw $e;
            DB::rollBack();
        }
        
        return redirect()->action('TeacherController@listTeachers');
    }

    // Forms and Views Routes

    public function startSession(Classes $class) {
        $classId = $class->id;
        return view('whiteboard.newwhiteboard', compact('classId'));
    }

    public function teacherCourses(Request $request) {

        $teacher = Teacher::whereUserid(Auth::User()->id)->first();
        $courses = $teacher->courses;
        return view('Courses.teacher_courses', compact('courses'));

    }

    public function teacherStudents(Request $request) {

        $teacher = Teacher::whereUserid(Auth::User()->id)->first();
        $students = $teacher->students;
        return view('students.teacher_students', compact('students'));

    }

    public function teacherClasses(Request $request) {

        $teacher = Teacher::whereUserid(Auth::User()->id)->first();
        $classes = $teacher->classes;
        return view('teacher.teacher_classes', compact('classes'));
    }

    public function createTeacherForm() {
        return view('teacher.create_teacher');
    } 

    public function chatPage() {
        return view('teacher.chatPage');
    } 

    public function updateTeacherForm(Teacher $teacher) {

        return view('teacher.update_teacher', compact('teacher'));
    }
}
