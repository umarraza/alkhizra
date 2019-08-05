<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

    protected $fillable = [

        'courseName',
        'courseType',
        'description',
        'teacher_id',

    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
    public function students() {
        return $this->hasMany(Student::class);
    }

    public function class() {
        return $this->hasOne(Classes::class, 'courseId');
    }

}
