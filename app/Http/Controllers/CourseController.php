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
        
            'courseName' => 'required|unique:courses',
            'courseType' => 'required',
            'description' => 'required',
            'teacher_id' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $course = Course::create([

                'courseName'    =>  $request->courseName,
                'courseType'    =>  $request->courseType,
                'description'   =>  $request->description,
                'teacher_id'     =>  $request->teacher_id
            ]);
    
            DB::commit();

        } catch (Exception $e) {
            
            throw $e;
            DB::rollback();
        }
        return redirect()->action('CourseController@showCourses');
    }

    public function updateCourseForm(Course $course) {

        $teachers = Teacher::all();
        return view('Courses.update_course', compact('course','teachers'));
    } 

    public function updateCourse(Course $course)
    {
        $data = request()->validate([

            'courseName' => 'required',
            'courseType' => 'required',
            'description' => 'required',
            'teacher_id' => 'required',

        ]);

        $course->update($data);
        return redirect()->action('CourseController@showCourses');

    }

    public function deleteCourse(Course $course) {

            $students = $course->students;

            $class = $course->class;

            $userIds = $students->map(function($user) {
                return $user['userId'];
            });
            
            $users = User::whereIn('id', $userIds)->get();
            DB::beginTransaction();
            try {

                $students->each->delete();
                $users->each->delete();
                $course->delete();
                if(isset($class)){
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

        foreach ($courses as $course) {
            $course['teacher'] = $course->teacher;
            $course['image'] = $course->teacher->image;
        }
        return view('Courses.show_courses', compact('courses'));
    }
}
