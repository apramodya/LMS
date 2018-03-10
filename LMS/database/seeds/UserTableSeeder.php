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
        $adminUser = new \App\User([
            'id' => '1',
            'username' => 'admin',
            'password' => Hash::make('123456')
        ]);
        $adminUser->save();
    }
}
