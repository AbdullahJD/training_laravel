<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->delete();
        $countries = [

            ['name' => 'Palestine', 'Telly' => 'PS'],
            ['name' => 'Sudia arbia', 'Telly' => 'SU'],

        ];
        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
