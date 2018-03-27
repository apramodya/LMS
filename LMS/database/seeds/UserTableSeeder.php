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

        $lecturer = new \App\User([
            'id' => '4',
            'username' => 'kamal',
            'password' => Hash::make('kamal'),
            'type' => 'lecturer'
        ]);
        $lecturer->save();

        $lecturer = new \App\User([
            'id' => '5',
            'username' => 'nimal',
            'password' => Hash::make('nimal'),
            'type' => 'lecturer'
        ]);
        $lecturer->save();

        $lecturer = new \App\User([
            'id' => '6',
            'username' => 'sunil',
            'password' => Hash::make('sunil'),
            'type' => 'lecturer'
        ]);
        $lecturer->save();

        $student = new \App\User([
            'id' => '7',
            'username' => '15000028',
            'password' => Hash::make('15000028'),
            'type' => 'student'
        ]);
        $student->save();

        $student = new \App\User([
            'id' => '8',
            'username' => '15000031',
            'password' => Hash::make('15000031'),
            'type' => 'student'
        ]);
        $student->save();

        $student = new \App\User([
            'id' => '9',
            'username' => '15000046',
            'password' => Hash::make('15000046'),
            'type' => 'student'
        ]);
        $student->save();

        $exam = new \App\User([
            'id' => '10',
            'username' => 'exam',
            'password' => Hash::make('123456'),
            'type' => 'exam'
        ]);
        $exam->save();
    }
}