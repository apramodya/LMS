<?php

use Illuminate\Database\Seeder;

class ForumTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$forum = new \App\Forum( [
			'course_id' => '1',
			'forum_id'  => 'SCS1101'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '2',
			'forum_id'  => 'SCS1102'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '3',
			'forum_id'  => 'SCS1103'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '4',
			'forum_id'  => 'SCS1104'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '5',
			'forum_id'  => 'SCS1107'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '6',
			'forum_id'  => 'SCS1108'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '7',
			'forum_id'  => 'SCS1109'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '8',
			'forum_id'  => 'SCS1113'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '9',
			'forum_id'  => 'SCS2101'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '10',
			'forum_id'  => 'SCS2103'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '11',
			'forum_id'  => 'SCS2104'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '12',
			'forum_id'  => 'SCS2105'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '13',
			'forum_id'  => 'SCS2106'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '14',
			'forum_id'  => 'SCS2107'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '15',
			'forum_id'  => 'SCS2108'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '16',
			'forum_id'  => 'IS1001'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '17',
			'forum_id'  => 'IS1002'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '18',
			'forum_id'  => 'IS1008'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '19',
			'forum_id'  => 'IS1009'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '20',
			'forum_id'  => 'IS2001'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '21',
			'forum_id'  => 'IS2003'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '22',
			'forum_id'  => 'IS2007'
		] );
		$forum->save();
		$forum = new \App\Forum( [
			'course_id' => '23',
			'forum_id'  => 'IS2011'
		] );
		$forum->save();

	}
}
