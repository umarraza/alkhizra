<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Test;
use App\Models\User;
use App\Models\TestImages;
use Auth;
use DB;

class TestController extends Controller
{
    public function createTest(Request $request) {

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData = $request->validate([
        
            'testName' => 'required',
            'description' => 'required',
            'totalMarks' => 'required',
            'passingMarks' => 'required',
            'totalTime' => 'required',
            'instructions' => 'required',
            'course_id' => 'required',
            'teacher_id' => 'required'

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

            $imageName = time().'.'.request()->image->getClientOriginalExtension();
    
            TestImages::create([
                'imageName' => $imageName,
                'test_id' => $test->id,
                'teacher_id' => $request->teacher_id,
            ]);
            
            request()->image->move(public_path('images'), $imageName);
  
            DB::commit();

        } catch (Exception $e) {
            
            throw $e;
            DB::rollback();
        }
        return redirect()->action('TestController@teacherTests');
    }

    public function testForm() {

        $teacher = Teacher::where('user_id',Auth::User()->id)->first();
        $courses =  $teacher->courses;
        return view('Tests.create_test', compact('courses'));
    
    }

    public function teacherTests() {

        $teacher = Teacher::where('user_id',Auth::User()->id)->first();
        $course = Course::where('teacher_id', $teacher->id)->first();
        $tests = Test::where('course_id', $course->id)->get();
        return view('Tests.show_teacher_tests', compact('tests'));
    }

    public function listsTests() {

        $tests = Test::with('course')->get();
        if ($tests !== NULL) {
            foreach($tests as $test) {
                $test['teacher'] = $test->course->teacher;
            }
        } else {
            return view('Tests.no_tests');
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
        return redirect()->action('TestController@teacherTests');
    }
}
