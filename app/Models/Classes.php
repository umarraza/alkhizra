<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';

    protected $fillable = [
        'title',
        'date',
        'time_from',
        'time_to',
        'description',
        'teacher_description',
        'course_Id'
    ];

    public static function alertMail(Request $request) {

        $classes = Classes::all();

        foreach($classes as $class) {

            $course_Id = $class->course_Id;
            $course = Course::find($course_Id);
            $teacherId = $course->teacherId;

            $teacher = Teacher::find($teacherId);

            $firstName = $teacher->first_name;
            $lastName = $teacher->last_name;

            $teacherName = $firstName . ' ' . $lastName;
            
            $email = $teacher->email;
            $time = $class->time_from;
            $currentTime = Carbon::now();

            if($currentTime->diffInMinutes($time) < 60 || $currentTime->diffInMinutes($time) == 15) {

                $message = "Your class will be starts after 1 hour";
                $tousername = $email;
        
                \Mail::send('teacherMail',["teacherName"=>$teacherName,"message"=>$message], function ($message) use ($tousername) {
        
                    $message->from('info@fantasycricleague.online');
                    $message->to($tousername)->subject('Test Mails');
        
               });
        
            }
        }
    }
}
