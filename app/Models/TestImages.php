<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestImages extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'test_images';


    protected $fillable = [

        'imageName',
        'test_id',
        'teacher_id',
    ];
}
