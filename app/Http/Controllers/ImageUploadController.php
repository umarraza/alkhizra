<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Auth;
use DB;

class ImageUploadController extends Controller
{

    public function router() {
        
        $teacher = Auth::User()->teacher;
        $student = Auth::User()->student;

        if (isset($teacher)) {

            $image = Image::where('teacher_id', $teacher->id)->first();
            return view('admin.admin', compact('image'));

        } elseif (isset($student)) {

            $image = Image::where('student_id', $student->id)->first();
            return view('admin.admin', compact('image'));

        } else {

            $image = Image::where('admin_id', 1)->first();
            return view('admin.admin', compact('image'));
        }
    }


    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function imageUpload()
    {
        return view('imageUpload');
    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function imageUploadPost(Request $request)
    {

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        DB::beginTransaction();

        try {

            if(isset($request->teacher_id)) {

                $teacherImage = Image::where('teacher_id', $request->teacher_id)->first();
                if (isset($teacherImage)) {
                    
                    Image::where('teacher_id', $request->teacher_id)->update([
                        'imageName' => $imageName,
                        'teacher_id' => $request->teacher_id
                    ]);

                } else {
                    
                    Image::create([
                        'imageName' => $imageName,
                        'teacher_id' => $request->teacher_id,
                    ]);
                }
            
            } elseif (isset($request->student_id)) {

            $studentImage = Image::where('student_id', $request->student_id)->first();
                
                if (isset($studentImage)) {
                    
                    Image::where('student_id', $request->student_id)->update([
                        'imageName' => $imageName,
                        'student_id' => $request->student_id
                    ]);
                } else {
                    
                    Image::create([
                        'imageName' => $imageName,
                        'student_id' => $request->student_id,
                    ]);
                }
            } else {

                $adminImage = Image::where('admin_id', $request->admin_id)->first();

                if (isset($adminImage)) {
                    
                    Image::where('admin_id', $request->admin_id)->update([
                        'imageName' => $imageName,
                        'admin_id' => $request->admin_id
                    ]);
                } else {
                    
                    Image::create([
           
                        'imageName' => $imageName,
                        'admin_id' => $request->admin_id,
                    ]);                    
                }
            }
            
            request()->image->move(public_path('images'), $imageName);

            DB::commit();
        } catch (Exception $e) {
            throw $e;
            DB::rollBack();
        }

        return redirect()->back();

        // return back()

            // ->with('success','You have successfully upload image.')
            // ->with('image',$imageName);

    }
}
