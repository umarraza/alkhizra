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

class CourseController extends Controller
{
    public function createCourse(Request $request) {

        $validatedData = $request->validate([
        
            'teacherId' => 'required',
            'course_name' => 'required|unique:courses',
            'description' => 'required',
            'about_instructor' => 'required',
            'category' => 'required',
            'type' => 'required'
        
        ]);

        DB::beginTransaction();
        try {

            $course = Course::create([

                'course_name'      =>  $request->course_name,
                'description'      =>  $request->description,
                'about_instructor' =>  $request->about_instructor,
                'category'         =>  $request->category,
                'type'             =>  $request->type,
                'teacherId'        =>  $request->teacherId
            ]);
    
            DB::commit();

        } catch (Exception $e) {
            
            throw $e;
            DB::rollback();
        }
        return redirect()->action('CourseController@showCourses');
    }

    public function updateCourseForm($id) {

        $teachers = Teacher::all();

        $course = Course::find($id);
        return view('Courses.update_course', compact('course','teachers'));
    } 

    public function updateCourse(Request $request)
    {

        $course = Course::find($request->id);

        DB::beginTransaction();
        try {

            $course->course_name       =  $request->course_name;
            $course->description       =  $request->description;
            $course->about_instructor  =  $request->about_instructor;
            $course->category          =  $request->category;
            $course->type              =  $request->type;
            $course->teacherId         =  $request->teacherId;

            DB::commit();

        } catch (Exception $E) {
            
            throw $e;
            DB::rollBack();
        }

        return redirect()->action('CourseController@showCourses');
    }

    public function deleteCourse($id) {

       DB::beginTransaction();
       try {

            $course = course::find($id);
            $class = Classes::where('course_id', '=', $course->id)->first();
            $students = Student::where('course_id', '=', $course->id)->get();

            foreach($students as $student) {

                $userData = User::find($student->userId);
                $userData->delete();
                $student->delete();
            }
            $course->delete();
            if (!empty($class)) {
                $class->delete();
            }

            DB::commit();

        } catch (Exception $e) {
           throw $e;
           DB::rollBack();
       }
        return redirect()->action('CourseController@showCourses');
    }

    public function addCourseForm(Request $request) {

        $teachers = Teacher::all();
        return view('Courses.create_course', compact('teachers'));
    }

    public function showCourses(Request $request) {
       
        $courses = Course::all();
        
        return view('Courses.show_courses', compact('courses'));
    }
}
