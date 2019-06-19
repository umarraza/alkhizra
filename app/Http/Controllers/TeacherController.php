<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use Auth;
use DB;

class TeacherController extends Controller
{

    public function createTeacher(Request $request) {

        $validatedData = $request->validate([
        
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
    
            $teacherName = $first_name . ' ' . $last_name;
            $message = "A random message";
            $tousername = $request->email;
    
            $userId = $user->id;
    
            \Mail::send('mail',["accessCode"=>$accessCode,"userId"=>$userId], function ($message) use ($tousername) {
    
                $message->from('super.admin@admin.com');
                $message->to($tousername)->subject('Test Mails');
    
           });

            DB::commit();

        } catch (Exception $e) {


            DB::rolleBack();
            throw $e;

        }

     
        
    	return redirect('list-teachers');

    }

    public function listTeachers() {

        $teachers = Teacher::all();
        return view('teacher.show_all_teachers', compact('teachers'));

    }

    public function teacherUpdate(Request $request)
    {

        $teacher = Teacher::find($request->id);

        $teacher->first_name   =  $request->first_name;
        $teacher->last_name    =  $request->last_name;
        $teacher->address      =  $request->address;
        $teacher->description  =  $request->description;


        $teacher->save();

        return redirect('list-teachers');
    }

    public function deleteTeacher($id) {

        $teacher = Teacher::find($id);
        $courses = Course::where('teacherId', '=', $teacher->id)->get();

        foreach($courses as $course) {

           if(!empty($course)) {

            $course->delete();
           
            }
        }

        $userId = $teacher->userId;
        $userData = User::find($userId);

        $teacher->delete();
        $userData->delete();

        return redirect('list-teachers');

    }

    public function teacherCourses(Request $request) {

        $userId = Auth::User()->id;
        $teacher = Teacher::where('userId', '=', $userId)->first();
        $teacherId = $teacher->id;
        $courses = Course::where('teacherId', '=', $teacherId)->get();

        return view('courses.teacher_courses', compact('courses'));

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
        $courses = Course::where('teacherId', '=', $teacherId)->get();

        foreach ($courses as $course) {

            $teacherId = $course->teacherId;

            $classes = DB::table('classes AS class')
            ->join('courses AS course', 'class.course_id', '=', 'course.id')

            ->select(
                
                'class.id',
                'class.title', 
                'class.date', 
                'class.time_from', 
                'class.time_to', 
                'class.description', 
                'class.teacher_description', 
                'course.course_name'

                )

            ->where('course.teacherId','=', $teacherId)
            
        ->get();
        }
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
