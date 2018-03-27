<?php

// return the full degree name
function degreeName($degree)
{
    if ($degree == 'CS' || $degree == 'cs') return 'Computer Science';
    elseif ($degree == 'IS' || $degree == 'is') return 'Information Systems';
}

// count number of lecturers
function countLecturers($course)
{
    $count = 0;
    $lecturers = \App\Course::where('course_id', '=', $course)->first()->lecturers;
    foreach ($lecturers as $lecturer):
        if ($lecturer->position_id < 5)
            $count++;
    endforeach;
    return $count;
}

// count number of instructors
function countInstructors($course)
{
    $count = 0;
    $lecturers = \App\Course::where('course_id', '=', $course)->first()->lecturers;
    foreach ($lecturers as $lecturer):
        if ($lecturer->position_id == 5)
            $count++;
    endforeach;
    return $count;
}

// is new?
// check whether passed 1 day
function isNew($created_at)
{
    $date1 = now();
    $date2 = $created_at;
    $diff = $date2->diffInHours($date1);
    if ($diff < 24)
        return true;
}

// convert CSV file to a json object
function csv2json($file)
{
    if (($handle = fopen($file, "r")) !== FALSE) {
        $csvs = [];
        while (!feof($handle)) {
            $csvs[] = fgetcsv($handle);
        }
        $datas = [];
        $column_names = [];
        foreach ($csvs[0] as $single_csv) {
            $column_names[] = $single_csv;
        }
        foreach ($csvs as $key => $csv) {
            if ($key === 0) {
                continue;
            }
            foreach ($column_names as $column_key => $column_name) {
                $datas[$key - 1][$column_name] = $csv[$column_key];
            }
        }
        $json = json_encode($datas);
        fclose($handle);
        return $json;
    }
}