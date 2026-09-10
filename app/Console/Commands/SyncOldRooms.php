<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Building;
use App\Models\Room;

class SyncOldRooms extends Command
{
    protected $signature = 'app:sync-old-rooms';

    protected $description = 'Sync rooms from old database';

    public function handle()
    {
        $rooms = DB::connection('old_mysql')
            ->table('room')
            ->join(
                'gedung',
                'room.id_gedung',
                '=',
                'gedung.id_gedung'
            )
            ->select(
                'room.id_room',
                'room.nama as room_name',
                'room.capacity',
                'gedung.gedung as building_code'
            )
            ->orderBy('room.id_room')
            ->get();

        foreach ($rooms as $room) {
            $building = Building::where(
                'code',
                $room->building_code
            )->first();

            if (!$building) {
                $this->warn(
                    'Building tidak ditemukan: '
                    . $room->building_code
                );
                continue;
            }

            Room::updateOrCreate(
                [
                    'name' => $room->room_name,
                    'building_id' => $building->id,
                ],
                [
                    'capacity' => $room->capacity,
                ]
            );

            $this->info(
                'Synced: '
                . $room->building_code
                . ' | '
                . $room->room_name
                . ' | capacity: '
                . $room->capacity
            );
        }

        return Command::SUCCESS;
    }
}