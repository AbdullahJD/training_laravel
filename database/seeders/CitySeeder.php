<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->delete();
        $cities = [
            ['name' => 'damam', 'country_id' =>2],
            ['name' => 'alriad', 'country_id' =>2],
            ['name' => 'gada', 'country_id' =>2],
            ['name' => 'maka', 'country_id' =>2],

            ['name' => 'Gaza', 'country_id' =>1],
            ['name' => 'AlKalil', 'country_id' =>1],
            ['name' => 'Ram allah', 'country_id' =>1],
            ['name' => 'Nables', 'country_id' =>1],
            ['name' => 'Aka', 'country_id' =>1],
            ['name' => 'Ariha', 'country_id' =>1],
            ['name' => 'bet lahm', 'country_id' =>1],
        ];
        foreach ($cities as $city) {
            City::with('country')->create($city);
        }
    }
}
