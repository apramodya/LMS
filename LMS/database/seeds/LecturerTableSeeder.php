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
            'first_name' => 'kamal',
            'last_name' => 'perera',
            'email' => 'kamal@gmail.com',
            'phone' => '0719990807',
            'user_id' => '4',
            'position_id' => '3',
        ]);
        $lecturer->save();

        $lecturer = new \App\Lecturer([
            'first_name' => 'nimal',
            'last_name' => 'silva',
            'email' => 'nimal@gmail.com',
            'phone' => '0773990007',
            'user_id' => '5',
            'position_id' => '4',
        ]);
        $lecturer->save();

        $lecturer = new \App\Lecturer([
            'first_name' => 'sunil',
            'last_name' => 'gamage',
            'email' => 'sunil@gmail.com',
            'phone' => '0718432905',
            'user_id' => '6',
            'position_id' => '5',
        ]);
        $lecturer->save();
    }
}
