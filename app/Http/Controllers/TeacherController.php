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
            'description' => 'required',
            'address' => 'required',
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
    
                'first_name'   =>  $request->first_name,
                'last_name'    =>  $request->last_name,
                'address'      =>  $request->address,
                'description'  =>  $request->description,
                'email'        =>  $request->email,
                'userId'       =>  $user->id,
    
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

    public function teacherUpdate(Request $request)
    {

        $teacher = Teacher::find($request->id);
        DB::beginTransation();
        try {

            $teacher->first_name   =  $request->first_name;
            $teacher->last_name    =  $request->last_name;
            $teacher->address      =  $request->address;
            $teacher->description  =  $request->description;

            DB::commit();

        } catch (Exception $e) {

            throw $e;
            DB::rollBack();

        }
        return redirect()->action('TeacherController@listTeachers');
    }

    public function deleteTeacher($id) {

        DB::beginTransaction();
        try{

            $teacher = Teacher::find($id);
            $courses = Course::where('teacherId', '=', $teacher->id)->pluck('id');
            $students = Student::whereIn('course_id', $courses)->get();
           
            $user = User::where('id', $teacher->userId)->first();

            $userIds = $students->map(function($user) {
                return $user['userId'];
              });

            Course::whereIn('id', $courses)->delete();
            Classes::whereIn('course_id', $courses)->delete();
            Student::whereIn('course_id', $courses)->delete();
            User::whereIn('id', $userIds)->delete();
            $user->delete();
            
            DB::commit();

        } catch(Exception $e) {

            throw $e;
            DB::rolleBack();
        }

        return redirect()->action('TeacherController@listTeachers');

    }

    public function teacherCourses(Request $request) {

        $userId = Auth::User()->id;
        $teacher = Teacher::where('userId', '=', $userId)->first();
        $teacherId = $teacher->id;
        $courses = Course::where('teacherId', '=', $teacherId)->get();

        return view('Courses.teacher_courses', compact('courses'));

    }


    public function teacherStudents(Request $request) {

        $userId = Auth::User()->id;
        $teacher = Teacher::where('userId', '=', $userId)->first();
        $teacherId = $teacher->id;
        $courses = Course::where('teacherId', '=', $teacherId)->get();

        foreach ($courses as $course) {

            $teacherId = $course->teacherId;

            $students = DB::table('students AS student')
            ->join('courses AS course', 'student.course_id', '=', 'course.id')

            ->select(
                
                'student.first_name', 
                'student.last_name', 
                'student.gender', 
                'student.grade', 
                'student.email', 
                'course.course_name'

                )

            ->where('course.teacherId','=', $teacherId)
            
        ->get();

        }
        return view('students.teacher_students', compact('students'));
    }

    public function teacherClasses(Request $request) {

        $userId = Auth::User()->id;
    
        $teacher = Teacher::where('userId', '=', $userId)->first();

        $teacherId = $teacher->id;

        $courses = Course::where('teacherId', '=', $teacherId)->pluck('id');

        $classes = Classes::whereIn('course_id', $courses)->get();
        return view('teacher.teacher_classes', compact('classes'));

    }

  

    // ================== Forms and Views like Routes ================== // 

    public function createTeacherForm() {
        return view('teacher.create_teacher');
    } 

    public function chatPage() {
        return view('teacher.chatPage');
    } 

    public function updateTeacherForm($id) {
        $teacher = Teacher::find($id);
        return view('teacher.update_teacher', compact('teacher'));
    } 
}
