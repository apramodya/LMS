<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function forum(){
        return $this->belongsTo(Forum::class);
    }
    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
