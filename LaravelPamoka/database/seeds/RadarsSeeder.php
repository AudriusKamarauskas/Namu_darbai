<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RadarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'date' => Carbon::create(2018,1,1,20,15,00),
                'number' => 'ZZZ789',
                'distance' => '1000',
                'time' => '100',
                'driver_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'date' => Carbon::create(2017,8,1,5,15,00),
                'number' => 'AAA789',
                'distance' => '10000',
                'time' => '900',
                'driver_id' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'date' => Carbon::create(2016,7,4,3,30,00),
                'number' => 'ZZZ789',
                'distance' => '2000',
                'time' => '150',
                'driver_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach($data as $value) {
            DB::table('radars')->insert($value);
        }
    }
}
