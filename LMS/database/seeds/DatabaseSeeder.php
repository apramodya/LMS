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
    }
}
