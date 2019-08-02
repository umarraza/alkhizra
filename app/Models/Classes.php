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
        'classTitle',
        'classDate',
        'classTime',
        'timeZone',
        'room_token',
        'courseId',
        'teacherId'
    ];

    public static function alertMail(Request $request) {

    
        // letter get all the classes that are not started yet. set the status of class i.e either active, closed and not started
        $classes = Classes::all();

        foreach($classes as $class) {

        $email = $class->teacher_email;

        $teacher = Teacher::where('email', $email)->first();

        $firstName = $teacher->first_name;
        $lastName = $teacher->last_name;

        $teacherName = $firstName . ' ' . $lastName;

        $time = $class->time_from;
        $currentTime = Carbon::now();

        $timeDiff = $currentTime->diffInMinutes($time);

        // return $timeDiff;

        // if($currentTime->diffInMinutes($time) == 61 || $currentTime->diffInMinutes($time) == 60 || $currentTime->diffInMinutes($time) == 59 || $currentTime->diffInMinutes($time) == 16 || $currentTime->diffInMinutes($time) == 15) {
        if($currentTime->diffInMinutes($time) < 61) {

                $message = "Your class will starts in 60 minutes";
                
                $time = 60;

                $data = json_decode($message);

                $tousername = $email;

                \Mail::send('teacherMail',["teacherName"=>$teacherName,"time"=>$time], function ($data) use ($tousername) {
        
                    $data->from('info@fantasycricleague.online');
                    $data->to($tousername)->subject('Class Time Alert');
        
                });

            } elseif ($currentTime->diffInMinutes($time) < 15) {

                $message = "Your class will starts in 15 Minutes.";


                $time = 15;

                $data = json_decode($message);

                $tousername = $email;

                \Mail::send('teacherMail',["teacherName"=>$teacherName,"time"=>$time], function ($data) use ($tousername) {
        
                    $data->from('info@fantasycricleague.online');
                    $data->to($tousername)->subject('Class Time Alert');
        
                });
            }
        }
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
    public function course() {
        return $this->belongsTo(Course::class, 'id', 'course_id');
    }
}
