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

    public static function alertMail() {

        $classes = Classes::where('status', '=', 1)->get();


        $studentName = $first_name . ' ' . $last_name;
        $message = "A random message";
        $tousername = $request->email;

        $userId = $user->id;

        \Mail::send('mail',["accessCode"=>$accessCode,"userId"=>$userId], function ($message) use ($tousername) {

            $message->from('super.admin@admin.com');
            $message->to($tousername)->subject('Test Mails');

       });

    }

}
