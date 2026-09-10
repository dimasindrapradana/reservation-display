<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Display;
use Illuminate\Database\Seeder;

class DisplaySeeder extends Seeder
{
    public function run(): void
    {
        $buildingA = Building::where('code', 'A')->first();
        $buildingB = Building::where('code', 'B')->first();

        Display::create([
            'building_id' => $buildingA->id,
            'name' => 'TV Gedung A',
            'code' => 'TV-A',
            'is_active' => true,
        ]);

        Display::create([
            'building_id' => $buildingB->id,
            'name' => 'TV Gedung B',
            'code' => 'TV-B',
            'is_active' => true,
        ]);
    }
}