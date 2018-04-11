<?php

use Illuminate\Database\Seeder;

class StudentSubmissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $submission = new \App\Submission([
            'course_id' => '1',
            'lecturer_id' => '1',
            'title' => 'Submission 01',
            'description' => 'This is the First Submission',
            'attachment' => 'NULL',
            'start_date' => '2018-04-03',
            'end_date' => '2019-03-03',
            'start_time' => '00:12:00',
            'end_time' => '12:12:00',
            'email' => '0',
            'sms' => '0',
        ]);
        $submission->save();
    }
}
