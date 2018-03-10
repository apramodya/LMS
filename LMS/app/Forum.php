<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
}
