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

    public function addCourseForm(Request $request) {

        $teachers = Teacher::all();
        return view('Courses.create_course', compact('teachers'));
    }

    public function showCourses(Request $request) {
       
        $courses = Course::all();
        
        return view('Courses.show_courses', compact('courses'));
    }

    public function createCourse(Request $request) {

        $validatedData = $request->validate([
        
            'course_name' => 'required|unique:courses',
            'description' => 'required',
            'about_instructor' => 'required',
            'category' => 'required',
            'type' => 'required',
        
        ]);


        $teacherId = $request->teacherId;

        DB::beginTransaction();
        try {

            $course = Course::create([

                'course_name'      =>  $request->course_name,
                'description'      =>  $request->description,
                'about_instructor' =>  $request->about_instructor,
                'category'         =>  $request->category,
                'type'             =>  $request->type,
                'teacherId'        =>  $teacherId,
            ]);
    
            DB::commit();

        } catch (Exception $e) {
            
            throw $e;
            DB::rollback();
        }



        return redirect("show-courses");
    }

    public function updateCourseForm($id) {

        $teachers = Teacher::all();

        $course = Course::find($id);
        return view('Courses.update_course', compact('course','teachers'));
    } 

    public function updateCourse(Request $request)
    {

        $course = Course::find($request->id);

        $course->course_name       =  $request->course_name;
        $course->description       =  $request->description;
        $course->about_instructor  =  $request->about_instructor;
        $course->category          =  $request->category;
        $course->type              =  $request->type;
        $course->teacherId         =  $request->teacherId;

        $course->save();

        return redirect("show-courses");
    }

    public function deleteCourse($id) {

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

        return redirect("show-courses");
    }
}
