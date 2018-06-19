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
            'first_name' => 'Pramodya',
            'last_name' => 'Abeysinghe',
            'email' => 'pramodyaabeysinghe@gmail.com',
            'phone' => '0719990807',
            'registration_year' => '2015',
            'index_number' => '15000028',
            'degree' =>'cs',
            'user_id' => '7',
        ]);
        $student->save();

        $student = new \App\Student([
            'first_name' => 'Thilan',
            'last_name' => 'Costa',
            'email' => 'thilancosta1994@gmail.com',
            'phone' => '‭0775048261',
            'registration_year' => '2015',
            'index_number' => '15000257',
            'degree' =>'cs',
            'user_id' => '8',
        ]);
        $student->save();

        $student = new \App\Student([
            'first_name' => 'Naveen',
            'last_name' => 'Perera',
            'email' => 'naveenperera777@gmail.com',
            'phone' => '0779448380‬',
            'registration_year' => '2015',
            'index_number' => '15020525',
            'degree' =>'is',
            'user_id' => '9',
        ]);
        $student->save();

	    $student = new \App\Student([
		    'first_name' => 'Udesh',
		    'last_name' => 'Sendanayake',
		    'email' => 'usendanayake@gmail.com',
		    'phone' => '0766806341‬‬',
		    'registration_year' => '2015',
		    'index_number' => '15020711',
		    'degree' =>'is',
		    'user_id' => '10',
	    ]);
	    $student->save();
    }
}
