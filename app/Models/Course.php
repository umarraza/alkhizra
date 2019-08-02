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
        'teacherId',

    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacherId');
    }

    public function tests()
    {
        return $this->belongsTo(Tests::class, 'courseId');
    }
    public function students() {
        return $this->hasMany(Student::class);
    }

    public function class() {
        return $this->hasOne(Classes::class, 'courseId');
    }

}
