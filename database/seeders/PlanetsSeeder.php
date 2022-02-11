<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planets')->insert([
            'id' => 'ba7efc25-1f8f-45b0-b814-eeb4119ebc8d',
            'name' => 'Mars',
            'coordinates' =>json_encode([20,20]),
            'obstacles_coordinates' =>json_encode([[10,10],[10,11],[10,12],[10,13],[10,14]])
        ]);
    }
}
