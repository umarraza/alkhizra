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
            'date' => 'required',
            'time' => 'required',
            'timeZone' => 'required',
            'teacherId' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $course = Conference::create([

                'conferenceName' =>  $request->conferenceName,
                'date'           =>  $request->date,
                'time'           =>  $request->time,
                'timeZone'       =>  $request->timeZone,
                'teacherId'      =>  $request->teacherId,

            ]);
    
            DB::commit();

        } catch (Exception $e) {
            
            throw $e;
            DB::rollback();
        }
        return redirect()->action('ConferenceController@showConfreneces');
    }

    public function confereneceForm() {
        $teachers = Teacher::all();
        return view('Conference.create-conferenece', compact('teachers'));
    }

    public function showConfreneces() {

        $conferences = Conference::all();
        return view('Conference.show_conference', compact('conferences'));

    }

}
