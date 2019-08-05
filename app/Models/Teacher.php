<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers';


    protected $fillable = [

        'first_name',
        'last_name',
        'specialization',
        'phoneNumber',
        'email',
        'userId'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function classes() {
        return $this->hasMany(Classes::class);
    }
  
    public function confrences() {
        return $this->hasMany(Conference::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'userId');
    }
}
