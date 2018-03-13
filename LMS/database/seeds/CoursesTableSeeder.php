<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new \App\Course([
            'course_id' => 'SCS1001',
            'name' => 'Programming I',
            'enrollment_key' => 'SCS1001',
            'year' => '1',
            'semester' => '1',
            'degree' => 'CS',
        ]);
        $course->save();

        $course = new \App\Course([
            'course_id' => 'SCS1002',
            'name' => 'Programming II',
            'enrollment_key' => 'SCS1002',
            'year' => '1',
            'semester' => '2',
            'degree' => 'CS',
        ]);
        $course->save();

        $course = new \App\Course([
            'course_id' => 'SCS2003',
            'name' => 'Programming III',
            'enrollment_key' => 'SCS2001',
            'year' => '2',
            'semester' => '1',
            'degree' => 'CS',
        ]);
        $course->save();

        $course = new \App\Course([
            'course_id' => 'SCS2004',
            'name' => 'Programming IV',
            'enrollment_key' => 'SCS2004',
            'year' => '2',
            'semester' => '2',
            'degree' => 'CS',
        ]);
        $course->save();

    }
}
