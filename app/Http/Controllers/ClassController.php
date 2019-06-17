<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Classes;
use App\Models\User;


class ClassController extends Controller
{

    public function addClassForm(Request $request) {

        $courses = Course::all();

        // return $courses;

        return view('classes.create_class', compact('courses'));
    } 


    public function showClasse(Request $request) {
       
        $classes = Classes::all();
        
        return view('classes.show_classes', compact('classes'));

    }









    public function createClassForm($id) {

        return view('classes.create_class', compact('id'));
    } 


    public function listClasse(Request $request) {
       
        $id = $request->id;

        $classes = Classes::where('teacherId', '=', $request->id)->get();
        return view('classes.show_classes', compact('classes', 'id'));

    }

      
    public function createClass(Request $request) {


        // $teacherId = $request->teacherId;

        $class = Classes::create([
 
            'title'                =>  $request->title,
            'date'                 =>  $request->date,
            'time_from'            =>  $request->time_from,
            'time_to'              =>  $request->time_to,
            'description'          =>  $request->description,
            'teacher_description'  =>  $request->teacher_description,
            'course_Id'            =>  $request->course_Id,
            // 'teacherId'            =>  $teacherId,

        ]);

        $class->save();

        return redirect("show-classes");

    }

    public function updateClassForm($id) {

        $class = Classes::find($id);

        return view('classes.update_class', compact('class'));
    } 


    public function updateClass(Request $request)
    {


        $class = Classes::find($request->id);

        $id = $class->teacherId;

        $class->title                =  $request->title;
        $class->date                 =  $request->date;
        $class->time_from            =  $request->time_from;
        $class->time_to              =  $request->time_to;
        $class->description          =  $request->description;
        $class->teacher_description  =  $request->teacher_description;

        $class->save();

        return redirect("list-classes/$id"); // remember sending id in that case only work in double quotations marks
    }

    public function deleteClass($id) {

        $class = Classes::find($id);

        $teacherId = $class->teacherId;

        $class->delete();

        return redirect("show-classes");
    }

}
