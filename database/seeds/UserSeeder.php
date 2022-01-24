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
            [
                'name' => 'Herjun Sasmita',
                'email' => 'herjun@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Ketymas Agyl',
                'email' => 'agil@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Muhammad Arief',
                'email' => 'arief@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Ghulam',
                'email' => 'ghulam@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Deden',
                'email' => 'deden@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Yvon de Wit',
                'email' => 'yvon@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Zia',
                'email' => 'zia@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Erwin',
                'email' => 'erwin@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Muhammad Angga',
                'email' => 'angga@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Dwi',
                'email' => 'dwi@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Riris Ayu',
                'email' => 'riris@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Ummi',
                'email' => 'ummi@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Nanda',
                'email' => 'nanda@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Samuel',
                'email' => 'samuel@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Alvin Novian',
                'email' => 'alvin@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Pras Yuli',
                'email' => 'pras@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Wildan Fathan',
                'email' => 'wildan@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Syarief',
                'email' => 'syarief@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Olaf',
                'email' => 'olaf@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Han Mak',
                'email' => 'han@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Handoko',
                'email' => 'handoko@demo.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Tri Hartanto',
                'email' => 'tri@demo.com',
                'password' => bcrypt('123456'),
            ],
        ]);
    }
}
