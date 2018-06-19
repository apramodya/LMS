<?php

use Illuminate\Database\Seeder;

class AnnouncementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $an = new \App\Announcement([
        	'year' => '1',
	        'degree' => 'cs',
	        'title' => 'Lecture reschedule',
	        'content' => 'SCS1101 - Data Structures and Algorithms I lecture will not be held this week',
	        'attachment'=>'NULL',

        ]);
        $an->save();
	    $an = new \App\Announcement([
		    'year' => '2',
		    'degree' => 'is',
		    'title' => 'Lecture reschedule',
		    'content' => 'IS2003 - Marketing lecture venue is changed to Mini auditorium for this week',
		    'attachment'=>'NULL',

	    ]);
	    $an->save();
	    $an = new \App\Announcement([
		    'year' => 'all',
		    'degree' => 'cs',
		    'title' => 'Special holiday',
		    'content' => 'Coming Thursday(21) will be a special holiday for all undergraduates',
		    'attachment'=>'NULL',

	    ]);
	    $an->save();
    }
}
