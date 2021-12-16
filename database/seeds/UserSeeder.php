<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'name' => 'HR Manager',
                'email' => 'hr@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Bachtiar',
                'email' => 'bachtiar@demo.com',
                'password' => bcrypt('123456'),
            ],
        ]);
    }
}
