<?php

use Illuminate\Database\Seeder;

class NoticeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $notice = new \App\Notice([
            'course_id' => '1',
            'lecturer_id' => '1',
            'title' => 'Notice 01',
            'description' => 'This is the First Notice',
            'attachment' => 'NULL',
            'sms' => '0',
            'email' => '0',


        ]);
        $notice->save();

        $notice = new \App\Notice([
            'course_id' => '1',
            'lecturer_id' => '1',
            'title' => 'Notice 02',
            'description' => 'This is the Second Notice',
            'attachment' => 'NULL',
            'sms' => '0',
            'email' => '0',


        ]);
        $notice->save();

        }
}
