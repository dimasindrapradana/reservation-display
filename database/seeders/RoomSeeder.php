<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $buildingA = Building::where('code', 'A')->first();
        $buildingB = Building::where('code', 'B')->first();

        Room::create([
            'building_id' => $buildingA->id,
            'name' => 'C104',
            'capacity' => 0,
        ]);

        Room::create([
            'building_id' => $buildingA->id,
            'name' => 'C107-108',
            'capacity' => 0,
        ]);

        Room::create([
            'building_id' => $buildingB->id,
            'name' => 'B215',
            'capacity' => 12,
        ]);

        Room::create([
            'building_id' => $buildingB->id,
            'name' => 'B220',
            'capacity' => 22,
        ]);
    }
}