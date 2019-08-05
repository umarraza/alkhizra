<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Classes;
use App\Models\User;
use Auth;
use DB;


class ConferenceController extends Controller
{
    public function createConferenec(Request $request) {

        $validatedData = $request->validate([
        
            'conferenceName' => 'required',
            'conferenceDate' => 'required',
            'conferenceTime' => 'required',
            'timeZone' => 'required',
            'teacher_id' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $course = Conference::create([

                'conferenceName' =>  $request->conferenceName,
                'conferenceDate' =>  $request->conferenceDate,
                'conferenceTime' =>  $request->conferenceTime,
                'timeZone'       =>  $request->timeZone,
                'teacher_id'      =>  $request->teacher_id,

            ]);
    
            DB::commit();

        } catch (Exception $e) {
            
            throw $e;
            DB::rollback();
        }
        return redirect()->action('ConferenceController@showConfreneces');
    }


    public function updateConferenece(Conference $conference) {

        $data = request()->validate([
        
            'conferenceName' => 'required',
            'conferenceDate' => 'required',
            'conferenceDate' => 'required',
            'timeZone' => 'required',
            'teacher_id' => 'required'
        ]);

        $conference->update($data);
        
        // latter update teacher_id as well 

        // Classes::whereId($class->id)->update([
        //     "teacher_id" => Course::find($class->course_Id)->teacher_id,
        // ]); 

        return redirect()->action('ConferenceController@showConfreneces');

    }

    public function deleteConferenece(Conference $conference){
        
        DB::beginTransaction();
        try {

            $conference->delete();
            DB::commit();

        } catch (Exception $e) {
            
            throw $e;
            DB::rolleBack();

        }
        return redirect()->action('ConferenceController@showConfreneces');
    }


    public function updateConfereneceForm(Conference $conference) {
        
        $teachers = Teacher::all();
        return view('Conference.update-conference', compact('conference','teachers'));
    }



    public function confereneceForm() {

        $teachers = Teacher::all();
        return view('Conference.create-conferenece', compact('teachers'));
    
    }

    public function showConfreneces() {

        $conferences = Conference::all();
        foreach($conferences as $conference) {
            $conference['teacher'] = $conference->teacher;
        }
        return view('Conference.show_conference', compact('conferences'));
    }

    
}
