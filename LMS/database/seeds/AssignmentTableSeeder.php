<?php

use Illuminate\Database\Seeder;

class AssignmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assignment = new \App\Assignment([
            'assignment_id' => 'SCS1001A1',
            'course_id' => 'SCS1001',
            'lecturer_id' => '2',
            'deadline' => '2018-03-17',

        ]);
        $assignment->save();

        $assignment = new \App\Assignment([
            'assignment_id' => 'SCS1002A1',
            'course_id' => 'SCS1002',
            'lecturer_id' => '2',
            'deadline' => '2018-03-19',

        ]);
        $assignment->save();

        $assignment = new \App\Assignment([
            'assignment_id' => 'SCS2003A1',
            'course_id' => 'SCS2003',
            'lecturer_id' => '2',
            'deadline' => '2018-03-25',

        ]);
        $assignment->save();

        $assignment = new \App\Assignment([
            'assignment_id' => 'SCS1001A2',
            'course_id' => 'SCS1001',
            'lecturer_id' => '2',
            'deadline' => '2018-03-23',

        ]);
        $assignment->save();

        $assignment = new \App\Assignment([
            'assignment_id' => 'SCS1001A1',
            'course_id' => 'SCS1001',
            'lecturer_id' => '2',
            'deadline' => '2018-04-01',

        ]);
        $assignment->save();

        $assignment = new \App\Assignment([
            'assignment_id' => 'SCS2004A1',
            'course_id' => 'SCS2004',
            'lecturer_id' => '2',
            'deadline' => '2018-03-29',

        ]);
        $assignment->save();

        $assignment = new \App\Assignment([
            'assignment_id' => 'SCS2004A2phpp',
            'course_id' => 'SCS2004',
            'lecturer_id' => '2',
            'deadline' => '2018-03-30',

        ]);
        $assignment->save();

        $assignment = new \App\Assignment([
            'assignment_id' => 'SCS2003A2',
            'course_id' => 'SCS2003',
            'lecturer_id' => '2',
            'deadline' => '2018-03-09',

        ]);
        $assignment->save();

    }
}
