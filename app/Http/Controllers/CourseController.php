<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Classes;
use App\Models\User;
use Auth;

class CourseController extends Controller
{

    public function addCourseForm(Request $request) {

        $teachers = Teacher::all();
        return view('courses.create_course', compact('teachers'));
    }

    public function showCourses(Request $request) {
       
        $courses = Course::all();
        return view('courses.show_courses', compact('courses'));
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

        $course = Course::create([

            'course_name'      =>  $request->course_name,
            'description'      =>  $request->description,
            'about_instructor' =>  $request->about_instructor,
            'category'         =>  $request->category,
            'type'             =>  $request->type,
            'teacherId'        =>  $teacherId,
        ]);

        $course->save();

        return redirect("show-courses");
    }

    public function updateCourseForm($id) {

        $teachers = Teacher::all();

        $course = Course::find($id);
        return view('courses.update_course', compact('course','teachers'));
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

        $classes = Classes::where('course_id', '=', $course->id)->first();

        $course->delete();

        return redirect("show-courses");
    }
}
