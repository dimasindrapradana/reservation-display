<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    public function run(): void
    {
        Building::create([
            'name' => 'Gedung A',
            'code' => 'A',
        ]);

        Building::create([
            'name' => 'Gedung B',
            'code' => 'B',
        ]);

        Building::create([
            'name' => 'Gedung C',
            'code' => 'C',
        ]);

        Building::create([
            'name' => 'Gedung D',
            'code' => 'D',
        ]);

        Building::create([
            'name' => 'Gedung F',
            'code' => 'F',
        ]);
    }
}