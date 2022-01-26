<?php

use Illuminate\Database\Seeder;

class LeaveTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('leave_types')->insert([
            [
                'leave_type' => 'Sick leave',
                'description' => 'Sick leave',
                'number_of_days' => '6',
            ],
            [
                'leave_type' => 'Casual leave',
                'description' => 'Casual leave',
                'number_of_days' => '12',
            ],
            [
                'leave_type' => 'Maternity leave',
                'description' => 'Maternity leave',
                'number_of_days' => '30',
            ]
        ]);
    }
}
