<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    public function run()
    {
        $position = new \App\Position([
            'id' => '1',
            'position' => 'Professor'
        ]);
        $position->save();

        $position = new \App\Position([
            'id' => '2',
            'position' => 'Senior Lecturer'
        ]);
        $position->save();

        $position = new \App\Position([
            'id' => '3',
            'position' => 'Lecturer'
        ]);
        $position->save();

        $position = new \App\Position([
            'id' => '4',
            'position' => 'Asst. Lecturer'
        ]);
        $position->save();

        $position = new \App\Position([
            'id' => '5',
            'position' => 'Instructor'
        ]);
        $position->save();
    }
}
