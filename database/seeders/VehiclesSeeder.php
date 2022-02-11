<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            'id' => '9d35e3d5-7029-4a8d-a76e-a515982b0083',
            'name' => 'Rover',
            'orientation' => 'N',
            'position' => json_encode([9,9]),
            'planet_name' => 'Mars'
        ]);
    }
}
