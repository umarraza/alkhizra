<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'emails';

    protected $fillable = [
        'email',
    ];
}
