<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User([
            'id' => '1',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'type' => 'admin'
        ]);
        $admin->save();

        $lecturer = new \App\User([
            'id' => '2',
            'username' => 'lecturer',
            'password' => Hash::make('123456'),
            'type' => 'lecturer'
        ]);
        $lecturer->save();

        $student = new \App\User([
            'id' => '3',
            'username' => 'student',
            'password' => Hash::make('123456'),
            'type' => 'student'
        ]);
        $student->save();
    }
}
