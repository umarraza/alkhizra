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
        
            'classTitle' => 'required|unique:classes',
            'classDate' => 'required',
            'classTime' => 'required',
            'timeZone' => 'required',
            'courseId' => 'required'
        ]);

        $course = Course::find($request->courseId);
        $teacher = $course->teacher;
        DB::beginTransaction();
        try {

            $class = Classes::create([
 
                'classTitle'   =>  $request->classTitle,
                'classDate'    =>  $request->classDate,
                'classTime'    =>  $request->classTime,
                'timeZone'     =>  $request->timeZone,
                'room_token'   =>  uniqid(),
                'courseId'     =>  $request->courseId,
                'teacher_id'    =>  $teacher->id
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


    public function updateClass(Request $request, Classes $class)
    {
        $data = request()->validate([
        
            'classTitle' => 'required',
            'classDate' => 'required',
            'classTime' => 'required',
            'timeZone' => 'required',
            'courseId' => 'required'
        ]);

        $class->update($data);
        
        // latter update teacher_id as well 

        // Classes::whereId($class->id)->update([
        //     "teacherId" => Course::find($class->course_Id)->teacher_id,
        // ]); 

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

        foreach($classes as $class) {
            $teacher = Teacher::whereId($class->teacherId)->first();
            $class['teacher'] = $teacher;
        }
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
