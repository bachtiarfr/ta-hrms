<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('clients')->insert([
            [
                'name' => 'Tibor',
                'address' => 'Netherland',
                'company' => 'Tibor.nl',
                'code' => 'TBR',
            ],
            [
                'name' => 'Crebos',
                'address' => 'Netherland',
                'company' => 'Crebos Creative Studio',
                'code' => 'CRBS',
            ]
        ]);
    }
}
