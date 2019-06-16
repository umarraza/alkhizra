<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\user;

class TeacherController extends Controller
{
    public function createTeacherForm() {

        return view('teacher.create_teacher');

    } 

    public function updateTeacherForm($id) {

        $teacher = Teacher::find($id);

        return view('teacher.update_teacher', compact('teacher'));
    } 

    public function createTeacher(Request $request) {

        $first_name = $request->first_name;
        $last_name = $request->last_name;

        $teacherName = $first_name . ' ' . $last_name;

        $user = User::create([

            'name'    =>  $teacherName,
            'email'   =>  $request->email,
            'roleId'  =>  2

        ]);

        $user->save();

        $teacher = Teacher::create([

            'first_name'   =>  $request->first_name,
            'last_name'    =>  $request->last_name,
            'address'      =>  $request->address,
            'description'  =>  $request->description,
            'email'        =>  $request->email,
        ]);

        $teacher->save();

        $teacherName = $first_name . ' ' . $last_name;
        $message = "A random message";
        $tousername = $request->email;

        $accessCode = mt_rand();

        \Mail::send('mail',["accessCode"=>$accessCode], function ($message) use ($tousername) {

            $message->from('super.admin@admin.com');
            $message->to($tousername)->subject('Test Mails');

       });
        
    	return redirect('list-teachers');

    }

    public function listTeachers() {

        $teachers = Teacher::all();
        return view('teacher.show_all_teachers', compact('teachers'));

    }

    public function teacherUpdate(Request $request)
    {

        $teacher = Teacher::find($request->id);

        $teacher->first_name   =  $request->first_name;
        $teacher->last_name    =  $request->last_name;
        $teacher->address      =  $request->address;
        $teacher->description  =  $request->description;


        $teacher->save();

        return redirect('list-teachers');
    }

    public function delete($id) {

        $teacher = Teacher::find($id)->delete();

        return redirect('list-teachers');

    }


}
