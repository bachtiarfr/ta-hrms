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
                'name' => 'Bachtiar Fatur Rohim',
                'email' => 'bachtiar@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Dicky Saputra',
                'email' => 'dikcy@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Andi Gusta',
                'email' => 'andi@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Tama',
                'email' => 'tama@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Owen',
                'email' => 'owen@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Biko',
                'email' => 'biko@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Leo Dandy',
                'email' => 'leo@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Muhammad Rizky',
                'email' => 'rizky@demo.com',
                'password' => bcrypt('123456'),
            ],
        ]);
    }
}
