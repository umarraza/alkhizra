<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Test;
use App\Models\User;
use Auth;
use DB;

class TestController extends Controller
{
    public function createTest(Request $request) {


        $validatedData = $request->validate([
        
            'testName' => 'required',
            'description' => 'required',
            'totalMarks' => 'required',
            'passingMarks' => 'required',
            'totalTime' => 'required',
            'instructions' => 'required',
            'course_Id' => 'required',

        ]);

        DB::beginTransaction();
        try {

            $test = Test::create([

                'testName'      =>  $request->testName,
                'description'   =>  $request->description,
                'totalMarks'    =>  $request->totalMarks,
                'passingMarks'  =>  $request->passingMarks,
                'totalTime'     =>  $request->totalTime,
                'instructions'  =>  $request->instructions,
                'courseId'      =>  $request->course_Id,

            ]);
    
            DB::commit();

        } catch (Exception $e) {
            
            throw $e;
            DB::rollback();
        }
        return redirect()->action('TestController@showTests');
    }

    public function testForm() {
        $teacher = Teacher::whereUserid(Auth::User()->id)->first();
        $courses =  $teacher->courses;
        return view('Tests.create_test', compact('courses'));
    }


    public function showTests() {

        $teacher = Teacher::whereUserid(Auth::User()->id)->first();
        $course = Course::where('teacherId', $teacher->id)->first();

        $tests = Test::where('courseId', $course->id)->get();
        return view('Tests.show_teacher_tests', compact('tests'));
    }

    public function listsAdminTests() {
        $tests = Test::all();
        return view('Tests.show_tests', compact('tests'));
    }
}
