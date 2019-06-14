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

        $user = User::create([

            'name'  => $request->teacherName,
            'email' => $request->email,
            'password' => $request->password,
            'roleId' => 2

        ]);

        $user->save();

        $teacher = Teacher::create([
            'teacherName'  => $request->teacherName,
            'description'  => $request->description,
            'email'        => $request->email,
        ]);

        $teacher->save();

    	return redirect('list-teachers');

    }

    public function listTeachers() {

        $teachers = Teacher::all();
        return view('teacher.show_all_teachers', compact('teachers'));

    }

    public function teacherUpdate(Request $request)
    {

        $teacher = Teacher::find($request->id);

        $teacher->teacherName  = $request->teacherName;
        $teacher->description  = $request->description;
        $teacher->email        = $request->email;

        $teacher->save();

        return redirect('list-teachers');
    }

    public function delete($id) {

        $teacher = Teacher::find($id)->delete();

        return redirect('list-teachers');

    }


}
