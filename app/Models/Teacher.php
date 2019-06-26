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
        'address',
        'description',
        'email',
        'userId'
    ];

    public function course()
    {
        return $this->hasMany(Course::class, 'id');
    }
}
