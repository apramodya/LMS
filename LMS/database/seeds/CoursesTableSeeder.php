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
		    'course_id'      => 'SCS1101',
		    'name'           => 'Data Structures and Algorithms I',
		    'enrollment_key' => 'SCS1101',
		    'year'           => '1',
		    'semester'       => '1',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
	        'course_id'      => 'SCS1102',
	        'name'           => 'Programming I',
	        'enrollment_key' => 'SCS1102',
	        'year'           => '1',
	        'semester'       => '1',
	        'degree'         => 'cs',
        ]);
        $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS1103',
		    'name'           => 'Database I',
		    'enrollment_key' => 'SCS1103',
		    'year'           => '1',
		    'semester'       => '1',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS1104',
		    'name'           => 'Mathematical Methods I',
		    'enrollment_key' => 'SCS1104',
		    'year'           => '1',
		    'semester'       => '1',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS1107',
		    'name'           => 'Software Engineering I',
		    'enrollment_key' => 'SCS1107',
		    'year'           => '1',
		    'semester'       => '2',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS1108',
		    'name'           => 'Data Structures and Algorithms II',
		    'enrollment_key' => 'SCS1108',
		    'year'           => '1',
		    'semester'       => '2',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS1109',
		    'name'           => 'Programming II',
		    'enrollment_key' => 'SCS1109',
		    'year'           => '1',
		    'semester'       => '2',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS1113',
		    'name'           => 'Statistics',
		    'enrollment_key' => 'SCS1113',
		    'year'           => '1',
		    'semester'       => '2',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS2101',
		    'name'           => 'Data Structures and Algorithms III',
		    'enrollment_key' => 'SCS2101',
		    'year'           => '2',
		    'semester'       => '3',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS2103',
		    'name'           => 'Software Engineering II',
		    'enrollment_key' => 'SCS2103',
		    'year'           => '2',
		    'semester'       => '3',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS2104',
		    'name'           => 'Programming III',
		    'enrollment_key' => 'SCS2104',
		    'year'           => '2',
		    'semester'       => '3',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS2105',
		    'name'           => 'Computer Networks I',
		    'enrollment_key' => 'SCS2105',
		    'year'           => '2',
		    'semester'       => '3',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS2106',
		    'name'           => 'Operating Systems I',
		    'enrollment_key' => 'SCS2106',
		    'year'           => '2',
		    'semester'       => '4',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS2107',
		    'name'           => 'Mathematical Methods III',
		    'enrollment_key' => 'SCS2107',
		    'year'           => '2',
		    'semester'       => '4',
		    'degree'         => 'cs',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'SCS2108',
		    'name'           => 'Programming IV',
		    'enrollment_key' => 'SCS2108',
		    'year'           => '2',
		    'semester'       => '4',
		    'degree'         => 'cs',
	    ]);
	    $course->save();

        $course = new \App\Course([
	        'course_id'      => 'IS1001',
	        'name'           => 'Programming and Problem Solving',
	        'enrollment_key' => 'IS1001',
	        'year'           => '1',
	        'semester'       => '1',
	        'degree'         => 'is',
        ]);
        $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'IS1002',
		    'name'           => 'Computer Systems',
		    'enrollment_key' => 'IS1002',
		    'year'           => '1',
		    'semester'       => '1',
		    'degree'         => 'is',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'IS1008',
		    'name'           => 'Financial Accounting',
		    'enrollment_key' => 'IS1008',
		    'year'           => '1',
		    'semester'       => '2',
		    'degree'         => 'is',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'IS1009',
		    'name'           => 'Business Communication',
		    'enrollment_key' => 'IS1009',
		    'year'           => '1',
		    'semester'       => '2',
		    'degree'         => 'is',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'IS2001',
		    'name'           => 'Software Engineering',
		    'enrollment_key' => 'IS2001',
		    'year'           => '2',
		    'semester'       => '3',
		    'degree'         => 'is',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'IS2003',
		    'name'           => 'Marketing',
		    'enrollment_key' => 'IS2003',
		    'year'           => '2',
		    'semester'       => '3',
		    'degree'         => 'is',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'IS2007',
		    'name'           => 'IT Project Management',
		    'enrollment_key' => 'IS2007',
		    'year'           => '2',
		    'semester'       => '4',
		    'degree'         => 'is',
	    ]);
	    $course->save();
	    $course = new \App\Course([
		    'course_id'      => 'IS2011',
		    'name'           => 'Computer Networks',
		    'enrollment_key' => 'IS2011',
		    'year'           => '2',
		    'semester'       => '4',
		    'degree'         => 'is',
	    ]);
	    $course->save();
    }
}
