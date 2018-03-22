<?php

// return the full degree name
function degreeName($degree){
    if ($degree == 'CS' || $degree == 'cs') return 'Computer Science';
    elseif ($degree == 'IS' || $degree == 'is') return 'Information Systems';
}

// count number of lecturers
function countLecturers($course){
    $count = 0;
    $lecturers = \App\Course::where('course_id','=',$course)->first()->lecturers;
    foreach ($lecturers as $lecturer):
        if ($lecturer->position_id < 5)
            $count++;
    endforeach;
    return $count;
}

// count number of instructors
function countInstructors($course){
    $count = 0;
    $lecturers = \App\Course::where('course_id','=',$course)->first()->lecturers;
    foreach ($lecturers as $lecturer):
        if ($lecturer->position_id == 5)
            $count++;
    endforeach;
    return $count;
}

// is new?
// check whether passed 1 day
function isNew($created_at){
    $date1 = now();
    $date2 = $created_at;
    $diff = $date2->diffInHours($date1);
    if ($diff < 24)
        return true;
}