<?php

use Illuminate\Database\Seeder;

class ForumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $forum = new \App\Forum([
		    'course_id' => '1',
		    'forum_id' => 'scs1001'
	    ]);
	    $forum->save();

	    $forum = new \App\Forum([
		    'course_id' => '2',
		    'forum_id' => 'scs1002'
	    ]);
	    $forum->save();

	    $forum = new \App\Forum([
		    'course_id' => '3',
		    'forum_id' => 'scs2003'
	    ]);
	    $forum->save();

	    $forum = new \App\Forum([
		    'course_id' => '4',
		    'forum_id' => 'scs2004'
	    ]);
	    $forum->save();
    }
}
