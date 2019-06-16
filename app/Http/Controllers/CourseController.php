<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\User;


class CourseController extends Controller
{
   
    public function createCourseForm($id) {

        return view('courses.create_course', compact('id'));
        
    } 


    public function listCourses(Request $request) {
       
        $id = $request->id;

        $courses = Course::where('teacherId', '=', $request->id)->get();
        return view('courses.show_courses', compact('courses', 'id'));

    }

    
    public function createCourse(Request $request) {

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

        return redirect("list-courses/$teacherId");

    }

    public function updateCourseForm($id) {

        $course = Course::find($id);

        return view('courses.update_course', compact('course'));
    } 

    public function updateCourse(Request $request)
    {

        $course = Course::find($request->id);

        $id = $course->teacherId;

        $course->course_name       =  $request->course_name;
        $course->description       =  $request->description;
        $course->about_instructor  =  $request->about_instructor;
        $course->category          =  $request->category;
        $course->type              =  $request->type;


        $course->save();

        return redirect("list-courses/$id"); // remember sending id in that case only work in double quotations marks
    }

    public function deleteCourse($id) {

        $course = course::find($id);

        $teacherId = $course->teacherId;

        $course->delete();

        return redirect("list-courses/$teacherId");
    }
}
