<?php

use Illuminate\Database\Seeder;

class CourseStudentsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$course = new \App\CourseStudents( [
			'course_id'  => '1',
			'student_id' => '1'
		] );
		$course->save();
		$course = new \App\CourseStudents( [
			'course_id'  => '2',
			'student_id' => '1'
		] );
		$course->save();
		$course = new \App\CourseStudents( [
			'course_id'  => '3',
			'student_id' => '1'
		] );
		$course->save();
		$course = new \App\CourseStudents( [
			'course_id'  => '2',
			'student_id' => '2'
		] );
		$course->save();
		$course = new \App\CourseStudents( [
			'course_id'  => '1',
			'student_id' => '2'
		] );
		$course->save();
	}
}
