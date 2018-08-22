<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(ForumTableSeeder::class);
        $this->call(LecturerTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(NoticeTableSeeder::class);
        $this->call(LectureNotesSeeder::class);
        $this->call(AssignmentSeeder::class);
        $this->call(StudentSubmissionsSeeder::class);
	    $this->call(AnnouncementTableSeeder::class);
	    //$this->call(GradesTableSeeder::class);
        }
}
