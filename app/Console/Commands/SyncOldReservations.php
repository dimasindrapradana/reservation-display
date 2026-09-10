<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\Reservation;

#[Signature('app:sync-old-reservations')]
#[Description('Sync accepted reservations from old database')]
class SyncOldReservations extends Command
{
    public function handle()
    {
        $reservations = DB::connection('old_mysql')
            ->table('room_book')
            ->where('status_book', 'Accepted')
            ->orderBy('id_booked')
            ->get();

        foreach ($reservations as $oldReservation) {
            $room = Room::where('name', $oldReservation->room_name)
                ->first();

            if (!$room) {
                $this->warn(
                    'Room tidak ditemukan: '
                    . $oldReservation->room_name
                );

                continue;
            }

            Reservation::updateOrCreate(
                [
                    'source_id' => (string) $oldReservation->id_booked,
                ],
                [
                    'room_id' => $room->id,
                    'course_name' => $oldReservation->nama_event,
                    'expected_participants' => $oldReservation->jumlah_orang ?? 0,
                    'start_at' => $oldReservation->start,
                    'end_at' => $oldReservation->end,
                    'status' => 'accepted',
                ]
            );

            $this->info(
                'Synced: '
                . $oldReservation->id_booked
                . ' | '
                . $oldReservation->room_name
                . ' | '
                . $oldReservation->nama_event
            );
        }

        return Command::SUCCESS;
    }
}