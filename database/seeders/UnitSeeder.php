<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('units')->delete();
        $units = [
            ['name' => 'Carton', 'abbreviations'=>'car'],
            ['name' => 'pieces', 'abbreviations'=>'pcs'],
            ['name' => 'meters', 'abbreviations'=>'m'],
            ['name' => 'liters', 'abbreviations'=>'ltr'],
            ['name' => 'kilograms', 'abbreviations'=>'kgm'],
            ['name' => 'tons', 'abbreviations'=>'tons'],
        ];
        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
