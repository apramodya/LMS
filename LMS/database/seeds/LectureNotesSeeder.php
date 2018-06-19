<?php

use Illuminate\Database\Seeder;

class LectureNotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lecturenote = new \App\LectureNote([
            'course_id' => '1',
            'lecturer_id' => '1',
            'title' => 'Lecture Note 01',
            'description' => 'This is the First Lecture Note',
            'attachment' => 'NULL',

        ]);
        $lecturenote->save();
        $lecturenote = new \App\LectureNote([
            'course_id' => '1',
            'lecturer_id' => '1',
            'title' => 'Lecture Note 02',
            'description' => 'This is the Second Lecture Note',
            'attachment' => 'NULL',

        ]);
        $lecturenote->save();
        $lecturenote = new \App\LectureNote([
            'course_id' => '2',
            'lecturer_id' => '2',
            'title' => 'Lecture Note 03',
            'description' => 'This is the Third Lecture Note',
            'attachment' => 'NULL',

        ]);
        $lecturenote->save();
	    $lecturenote = new \App\LectureNote([
		    'course_id' => '3',
		    'lecturer_id' => '2',
		    'title' => 'Lecture Note 03',
		    'description' => 'This is the Third Lecture Note',
		    'attachment' => 'NULL',

	    ]);
	    $lecturenote->save();
	    $lecturenote = new \App\LectureNote([
		    'course_id' => '4',
		    'lecturer_id' => '1',
		    'title' => 'Lecture Note 03',
		    'description' => 'This is the Third Lecture Note',
		    'attachment' => 'NULL',

	    ]);
	    $lecturenote->save();
	    $lecturenote = new \App\LectureNote([
		    'course_id' => '5',
		    'lecturer_id' => '3',
		    'title' => 'Lecture Note 03',
		    'description' => 'This is the Third Lecture Note',
		    'attachment' => 'NULL',

	    ]);
	    $lecturenote->save();


    }



}
