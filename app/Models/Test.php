<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tests';


    protected $fillable = [

        'testName',
        'description',
        'totalMarks',
        'passingMarks',
        'totalTime',
        'instructions',
        'course_id',
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }

}
