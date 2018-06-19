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
            'password' => Hash::make('admin'),
            'type' => 'admin'
        ]);
        $admin->save();
	    $exam = new \App\User([
		    'id' => '2',
		    'username' => 'exam',
		    'password' => Hash::make('exam'),
		    'type' => 'exam'
	    ]);
	    $exam->save();
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
            'username' => '15000257',
            'password' => Hash::make('15000257'),
            'type' => 'student'
        ]);
        $student->save();
        $student = new \App\User([
            'id' => '9',
            'username' => '15020525',
            'password' => Hash::make('15020525'),
            'type' => 'student'
        ]);
        $student->save();
	    $student = new \App\User([
		    'id' => '10',
		    'username' => '15020711',
		    'password' => Hash::make('15020711'),
		    'type' => 'student'
	    ]);
	    $student->save();


    }
}