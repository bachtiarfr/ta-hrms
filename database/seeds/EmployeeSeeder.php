<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('employees')->insert([
            [
                'photo' => '',
                'code' => 'HR0001',
                'status' => '1',
                'name' => 'HR Manager',
                'gender' => '1',
                'date_of_birth' => '',
                'date_of_joining' => '',
                'number' => '9999999999',
                'qualification' => '',
                'emergency_number' => '',
                'father_name' => '',
                'current_address' => '',
                'permanent_address' => '',
                'formalities' => '',
                'offer_acceptance' => '',
                'probation_period' => '',
                'date_of_confirmation' => '',
                'department' => '',
                'salary' => '',
                'account_number' => '',
                'bank_name' => '',
                'date_of_resignation' => '',
                'notice_period' => '',
                'last_working_day' => '',
                'full_final' => '',
                'user_id' => '1'
            ],
            [
                'photo' => '',
                'code' => 'FE001',
                'status' => '1',
                'name' => 'Frontend Dev',
                'gender' => '1',
                'date_of_birth' => '',
                'date_of_joining' => '',
                'number' => '9999999999',
                'qualification' => '',
                'emergency_number' => '',
                'father_name' => '',
                'current_address' => '',
                'permanent_address' => '',
                'formalities' => '',
                'offer_acceptance' => '',
                'probation_period' => '',
                'date_of_confirmation' => '',
                'department' => '',
                'salary' => '',
                'account_number' => '',
                'bank_name' => '',
                'date_of_resignation' => '',
                'notice_period' => '',
                'last_working_day' => '',
                'full_final' => '',
                'user_id' => '2'
            ]
        ]);
    }
}
