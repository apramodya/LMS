<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
    {
	    $grade = new \App\Grade( [
		    'a' => 80,
		    'amin' => 75,
		    'aplus' => 90,
		    'b' => 65,
		    'bmin' => 60,
		    'bplus' => 70,
		    'c' => 50,
		    'cmin' => 45,
		    'cplus' => 55,
		    'd' => 30,
		    'dmin' => 20,
		    'dplus' => 40,
		    'e' => 0
	    ] );
	    $grade->save();
    }
}
