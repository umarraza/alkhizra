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
            'course_id' => 'required',

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
                'course_id'     =>  $request->course_id,

            ]);
    
            DB::commit();

        } catch (Exception $e) {
            
            throw $e;
            DB::rollback();
        }
        return redirect()->action('TestController@teacherTests');
    }

    public function testForm() {

        $teacher = Teacher::whereUserid(Auth::User()->id)->first();
        $courses =  $teacher->courses;
        return view('Tests.create_test', compact('courses'));
    
    }

    public function teacherTests() {

        $teacher = Teacher::whereUserid(Auth::User()->id)->first();
        $course = Course::where('teacher_id', $teacher->id)->first();
        $tests = Test::where('course_id', $course->id)->get();
        return view('Tests.show_teacher_tests', compact('tests'));
    }

    public function listsAdminTests() {

        $tests = Test::with('course')->get();

        foreach($tests as $test) {

            if (empty($test->course->teacher))
            {
                return view('Tests.no_tests');
            } else {
                $test['teacher'] = $test->course->teacher;
            }
        }
        return view('Tests.show_tests', compact('tests'));
    }

    public function updateTestForm(Test $test) {

        //  

    }

    public function deleteTest(Test $test) {

        DB::beginTransaction();
        try {
        
            $test->delete();
            DB::commit();

        } catch (Exception $e) {

            throw $e;
            DB::rollBack();
        }
    }


}
