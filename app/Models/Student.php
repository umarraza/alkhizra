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
        'gender',
        'grade',
        'email',
        'teacherId',
        
    ];
}
