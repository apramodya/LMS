<?php

use Illuminate\Database\Seeder;

class LecturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lecturer = new \App\Lecturer([
            'first_name' => 'Kamal',
            'last_name' => 'Perera',
            'email' => 'kamal@ucsc.cmb.ac.lk',
            'phone' => '0719990807',
            'user_id' => '4',
            'position_id' => '3',
        ]);
        $lecturer->save();
        $lecturer = new \App\Lecturer([
            'first_name' => 'Nimal',
            'last_name' => 'Silva',
            'email' => 'nimal@ucsc.cmb.ac.lk',
            'phone' => '0773990007',
            'user_id' => '5',
            'position_id' => '4',
        ]);
        $lecturer->save();
        $lecturer = new \App\Lecturer([
            'first_name' => 'Sunil',
            'last_name' => 'Gamage',
            'email' => 'sunil@ucsc.cmb.ac.lk',
            'phone' => '0718432905',
            'user_id' => '6',
            'position_id' => '5',
        ]);
        $lecturer->save();
    }
}
