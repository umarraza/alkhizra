<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        DB::beginTransaction();
        try{

            foreach($courses as $course) {

                if(!empty($course)) {
     
                $class = Classes::where('course_id', '=', $course->id)->first();
                $students = Student::where('course_id', $course->id)->get();

                foreach ($students as $student) {

                    $studentUserId = $student->userId;
                    $studentUserData = User::find($studentUserId);
                    $studentUserData->delete();
                    $student->delete();

                }

                if (!empty($class)) {
                    
                    $class->delete();
                }
     
                $course->delete();
                
                }
            }
     
             $userId = $teacher->userId;
             $userData = User::find($userId);
     
             $teacher->delete();
             $userData->delete();

            DB::commit();

        } catch(Exception $e) {

            DB::rolleBack();

            throw $e;
        }

        return redirect('list-teachers');

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
        
        // get all the ids of the courses that belongs to a particular teacher of teacherId
        $courses = Course::where('teacherId', '=', $teacherId)->pluck('id');


        // The whereIn method filters the collection by a given key / value contained within the given array:
        
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
