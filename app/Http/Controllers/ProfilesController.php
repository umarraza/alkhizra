<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher; 
use App\Models\Student;
use App\Models\Course;
use App\Models\Classes;
use App\Models\User;
use Auth;
use DB;

class ProfilesController extends Controller
{
    public function adminUpdate(Teacher $teacher)
    {
        $data = request()->validate([

            'first_name'   =>  'required',
            'last_name'    =>  'required',
            'specialization' =>  'required',
            'phoneNumber' =>  'required',
            'email' => 'required'
        ]);
    
        DB::beginTransaction();
        try {

            // Upload Image File
            if($request->hasFile('projectFiles'))
            {
                $image = $request->file('projectFiles');

                $ext = $request->file('projectFiles')->getClientOriginalExtension();

                $input['imagename'] = time().'.'.$ext;
                $imageName = $input['imagename'];
                $destinationPath = storage_path('\\app\\public\\');

                $image->move($destinationPath, $input['imagename']);
            }









            $teacher->update($data);
            User::whereId($teacher->user->id)->update([
                "name" => $teacher->first_name . ' ' . $teacher->last_name,
            ]);
            DB::commit();
        } catch (Exception $th) {
            throw $te;
            DB::rollBack();
        }

        return redirect()->action('TeacherController@listTeachers');
    }
}
