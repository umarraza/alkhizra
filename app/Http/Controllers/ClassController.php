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

        $courseId = $request->course_Id;
        $course = Course::find($courseId);
        $teacherId = $course->teacherId;
        $teacher = Teacher::find($teacherId);
        $email = $teacher->email;

        DB::beginTransaction();
        try {

            $class = Classes::create([
 
                'title'                =>  $request->title,
                'date'                 =>  $request->date,
                'time_from'            =>  $request->time_from,
                'time_to'              =>  $request->time_to,
                'description'          =>  $request->description,
                'teacher_description'  =>  $request->teacher_description,
                'teacher_email'        =>  $email,
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

            DB::beginTransaction();
            try {

                $class = Classes::find($request->id);

                $id = $class->teacherId;
        
                $class->title                =  $request->title;
                $class->date                 =  $request->date;
                $class->time_from            =  $request->time_from;
                $class->time_to              =  $request->time_to;
                $class->description          =  $request->description;
                $class->teacher_description  =  $request->teacher_description;
                $class->course_Id            =  $request->course_Id;
        
                DB::commit();
                
            } catch (Exception $e) {

                throw $e;
                DB::rollBack();
            }


        return redirect("show-classes"); 
    }

    public function deleteClass($id) {


        DB::beginTransaction();
        try {

            $class = Classes::find($id);
            $teacherId = $class->teacherId;
            $class->delete();

            DB::commit();

        } catch (Exception $e) {
            
            throw $e;
            DB::rolleBack();

        }



        return redirect("show-classes");
    }

    public function addClassForm(Request $request) {

        $courses = Course::all();
        return view('Classes.create_class', compact('courses'));
    } 

    public function showClasse(Request $request) {
       

        // letter get all the classes that are not started yet. set the status of class i.e either active, closed and not started
        $classes = Classes::all();

        foreach($classes as $class) {

        $email = $class->teacher_email;

        $teacher = Teacher::where('email', $email)->first();

        $firstName = $teacher->first_name;
        $lastName = $teacher->last_name;

        $teacherName = $firstName . ' ' . $lastName;

        $time = $class->time_from;
        $currentTime = Carbon::now();

        $timeDiff = $currentTime->diffInMinutes($time);

        // return $timeDiff;

        // if($currentTime->diffInMinutes($time) == 61 || $currentTime->diffInMinutes($time) == 60 || $currentTime->diffInMinutes($time) == 59 || $currentTime->diffInMinutes($time) == 16 || $currentTime->diffInMinutes($time) == 15) {
        if($currentTime->diffInMinutes($time) < 61) {

                $message = "Your class will starts in 60 minutes";
                
                // return $message;

                $time = 60;

                $tousername = $email;

                \Mail::send('teacherMail',["teacherName"=>$teacherName,"time"=>$time], function ($message) use ($tousername) {
        
                    $message->from('info@fantasycricleague.online');
                    $message->to($tousername)->subject('Class Time Alert');
        
                });

            } elseif ($currentTime->diffInMinutes($time) < 15) {

                $message = "Your class will starts in 15 Minutes.";


                $time = 15;

                $tousername = $email;

                \Mail::send('teacherMail',["teacherName"=>$teacherName,"time"=>$time], function ($message) use ($tousername) {
        
                    $message->from('info@fantasycricleague.online');
                    $message->to($tousername)->subject('Class Time Alert');
        
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
