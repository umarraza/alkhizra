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
        
        ]);

        DB::beginTransaction();
        try {

            $class = Classes::create([
 
                'title'                =>  $request->title,
                'date'                 =>  $request->date,
                'time_from'            =>  $request->time_from,
                'time_to'              =>  $request->time_to,
                'description'          =>  $request->description,
                'teacher_description'  =>  $request->teacher_description,
                'course_Id'            =>  $request->course_Id,
    
            ]);
    
            DB::commit();

        } catch(Exception $e) {

            DB::rollBack();
            throw $e;
        }

        return redirect("show-classes");

    }

    public function updateClassForm($id) {

        $courses = Course::all();

        $class = Classes::find($id);
        return view('Classes.update_class', compact('class','courses'));
    } 


    public function updateClass(Request $request)
    {


        $validatedData = $request->validate([
        
            'title' => 'required',
            'date' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'description' => 'required',
            'teacher_description' => 'required',
            'course_Id' => 'required'
        ]);

            $class = Classes::find($request->id);

            $id = $class->teacherId;
    
            $class->title                =  $request->title;
            $class->date                 =  $request->date;
            $class->time_from            =  $request->time_from;
            $class->time_to              =  $request->time_to;
            $class->description          =  $request->description;
            $class->teacher_description  =  $request->teacher_description;
            $class->course_Id            =  $request->course_Id;
    
            $class->save();

        return redirect("show-classes"); 
    }

    public function deleteClass($id) {

        $class = Classes::find($id);
        $teacherId = $class->teacherId;
        $class->delete();

        return redirect("show-classes");
    }

    public function addClassForm(Request $request) {

        $courses = Course::all();
        return view('Classes.create_class', compact('courses'));
    } 

    public function showClasse(Request $request) {
       
        $classes = Classes::all();

        foreach($classes as $class) {

            $course_Id = $class->course_Id;
            $course = Course::find($course_Id);
            $teacherId = $course->teacherId;
            $teacher = Teacher::find($teacherId);
            $firstName = $teacher->first_name;
            $lastName = $teacher->last_name;
            
            $teacherName = $firstName . ' ' . $lastName;

            $email = $teacher->email;
            $time = $class->time_from;
            $currentTime = Carbon::now();

            if($currentTime->diffInMinutes($time) < 30) {

                $message = "Your class will be starts after 1 hour";
                $tousername = $email;
        
                \Mail::send('teacherMail',["teacherName"=>$teacherName,"message"=>$message], function ($message) use ($tousername) {
        
                    $message->from('info@fantasycricleague.online');
                    $message->to($tousername)->subject('Test Mails');
        
               });
            }
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
