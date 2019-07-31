<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conferences';

    protected $fillable = [

        'conferenceName',
        'date',
        'time',
        'timeZone',
        'teacherId'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacherId');
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function class() {
        return $this->hasOne(Classes::class, 'course_id');
    }
}
