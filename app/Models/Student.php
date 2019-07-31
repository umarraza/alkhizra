<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    protected $fillable = [

        'first_name',
        'last_name',
        'dateOfBirth',
        'phoneNumber',
        'email',
        'course_id',
        'teacher_id',
        'userId',
        
    ];

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'id', 'teacher_id');
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function user() {
        return $this->belongsTo(User::class,'userId', 'id');
    }
}
