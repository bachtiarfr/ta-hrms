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
            ],
            [
                'leave_type' => 'Casual leave',
                'description' => 'Casual leave',
            ],
            [
                'leave_type' => 'Maternity leave',
                'description' => 'Maternity leave',
            ]
        ]);
    }
}
