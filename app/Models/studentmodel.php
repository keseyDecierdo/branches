<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class studentmodel extends Model
{
    protected $table = 'student_info';

    protected $fillable = [
        'first_name',
        'last_name',
        'course',
        'year_level',
        'email',
    ];
}
