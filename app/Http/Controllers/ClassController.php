<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Classes;
use App\Models\User;
use DB;
use Carbon\Carbon;
class ClassController extends Controller
{

    public function createClass(Request $request) {

        $validatedData = $request->validate([
        
            'title' => 'required|unique:classes',
            'date' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'description' => 'required',
            'teacher_description' => 'required',
            'course_Id' => 'required|unique:classes'
        
        ]);

        $course = Course::find($request->course_Id);
        $teacher = $course->teacher;

        DB::beginTransaction();
        try {

            $class = Classes::create([
 
                'title'                =>  $request->title,
                'date'                 =>  $request->date,
                'time_from'            =>  $request->time_from,
                'time_to'              =>  $request->time_to,
                'description'          =>  $request->description,
                'teacher_description'  =>  $request->teacher_description,
                'teacher_email'        =>  $teacher->email,
                'room_token'           =>  uniqid(),
                'course_Id'            =>  $request->course_Id,
                'teacherId'            =>  $teacher->id
            ]);
    
            DB::commit();

        } catch(Exception $e) {

            DB::rollBack();
            throw $e;
        }
        return redirect()->action('ClassController@showClasse');
    }

    public function updateClassForm(Classes $class) {

        $courses = Course::all();
        return view('Classes.update_class', compact('class','courses'));
    } 


    public function updateClass(Classes $class)
    {
        $data = request()->validate([
        
            'title' => 'required',
            'date' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'description' => 'required',
            'teacher_description' => 'required',
            'course_Id' => 'required'
        ]);

        $class->update($data);
        Classes::whereId($class->id)->update([
            "teacherId" => Course::find($class->course_Id)->teacherId,
        ]);

        return redirect()->action('ClassController@showClasse');
    }

    public function deleteClass(Classes $class) {

        DB::beginTransaction();
        try {

            $class->delete();
            DB::commit();

        } catch (Exception $e) {
            
            throw $e;
            DB::rolleBack();

        }
        return redirect()->action('ClassController@showClasse');
    }

    public function addClassForm(Request $request) {

        $courses = Course::all();
        return view('Classes.create_class', compact('courses'));
    } 

    public function showClasse(Request $request) {
       
        // letter get all the classes that are not started yet. set the status of class i.e either active, closed and not started
        $classes = Classes::all();
        return view('Classes.show_classes', compact('classes'));

    }

    public function createClassForm($id) {

        return view('Classes.create_class', compact('id'));
    } 


    public function listClasse(Request $request) {
       
        $id = $request->id;

        $classes = Classes::where('teacherId', '=', $request->id)->get();
        return view('classes.show_classes', compact('classes', 'id'));

    }

}
