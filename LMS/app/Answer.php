<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
