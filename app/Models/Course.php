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

        'course_name',
        'description',
        'about_instructor',
        'category',
        'type',
        'teacherId',

    ];
}
