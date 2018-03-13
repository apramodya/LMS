<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new \App\Student([
            'first_name' => 'pramodya',
            'last_name' => 'abeysinghe',
            'email' => 'pramodya@gmail.com',
            'phone' => '0719990807',
            'registration_year' => '2015',
            'index_number' => '15000028',
            'degree' =>'cs',
            'user_id' => '7',
        ]);
        $student->save();

        $student = new \App\Student([
            'first_name' => 'thilan',
            'last_name' => 'costa',
            'email' => 'costa@gmail.com',
            'phone' => '0779990812',
            'registration_year' => '2015',
            'index_number' => '15000031',
            'degree' =>'cs',
            'user_id' => '8',
        ]);
        $student->save();

        $student = new \App\Student([
            'first_name' => 'naveen',
            'last_name' => 'perera',
            'email' => 'naveen@gmail.com',
            'phone' => '0711230855',
            'registration_year' => '2015',
            'index_number' => '15010046',
            'degree' =>'is',
            'user_id' => '9',
        ]);
        $student->save();
    }
}
