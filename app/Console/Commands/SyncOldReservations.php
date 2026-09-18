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
        /*
        |--------------------------------------------------------------------------
        | 1. Ambil semua booking yang masih Accepted dari database lama
        |--------------------------------------------------------------------------
        */

        $oldReservations = DB::connection('old_mysql')
            ->table('room_book')
            ->where('status_book', 'Accepted')
            ->orderBy('id_booked')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | 2. Simpan ID booking yang masih valid
        |--------------------------------------------------------------------------
        */

        $validSourceIds = [];


        /*
        |--------------------------------------------------------------------------
        | 3. Sync booking dari database lama ke Laravel
        |--------------------------------------------------------------------------
        */

        foreach ($oldReservations as $oldReservation) {

            $validSourceIds[] = (string) $oldReservation->id_booked;

            $room = Room::where(
                'name',
                $oldReservation->room_name
            )->first();


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
                    'expected_participants' =>
                        $oldReservation->jumlah_orang ?? 0,
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


        /*
        |--------------------------------------------------------------------------
        | 4. Hapus booking Laravel yang sudah tidak ada / tidak Accepted
        |--------------------------------------------------------------------------
        */

        if (count($validSourceIds) > 0) {

            $deleted = Reservation::whereNotNull('source_id')
                ->whereNotIn('source_id', $validSourceIds)
                ->delete();

        } else {

            $deleted = Reservation::whereNotNull('source_id')
                ->delete();
        }


        /*
        |--------------------------------------------------------------------------
        | 5. Tampilkan hasil penghapusan
        |--------------------------------------------------------------------------
        */

        if ($deleted > 0) {

            $this->info(
                'Deleted from Laravel: '
                . $deleted
                . ' reservation(s).'
            );

        } else {

            $this->info(
                'No outdated reservations found.'
            );
        }


        return Command::SUCCESS;
    }
}