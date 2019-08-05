<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profile_images';

    protected $fillable = [
        'imageName',
        'teacher_id',
        'student_id',
        'admin_id'
    ];

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
