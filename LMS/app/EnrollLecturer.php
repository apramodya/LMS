<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrollLecturer extends Model
{
    protected $table = 'lecturers_courses';

    protected $fillable = ['lecturer_id', 'course_id'];
}
