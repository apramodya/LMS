<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = ['course_id', 'forum_id'];
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function answers(){
        return $this->hasManyThrough(Answer::class, Question::class);
    }
}
