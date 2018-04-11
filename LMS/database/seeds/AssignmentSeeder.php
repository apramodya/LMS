<?php

use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assignment = new \App\Assignment([
            'course_id' => '1',
            'lecturer_id' => '1',
            'assignment_id' => 'Assignment 01',
            'description' => 'This is the First Assignment',
            'attachment' => 'NULL',
            'start_date' => '2018-04-03',
            'end_date' => '2019-02-03',
            'start_time' => '00:12:00',
            'end_time' => '12:12:00',
            'email' => '0',
            'sms' => '0',
        ]);
        $assignment->save();

        $assignment = new \App\Assignment([
            'course_id' => '1',
            'lecturer_id' => '1',
            'assignment_id' => 'Assignment 02',
            'description' => 'This is the Second Assignment',
            'attachment' => 'NULL',
            'start_date' => '2018-04-03',
            'end_date' => '2019-03-03',
            'start_time' => '00:12:00',
            'end_time' => '12:12:00',
            'email' => '0',
            'sms' => '0',
        ]);
        $assignment->save();



    }
}
