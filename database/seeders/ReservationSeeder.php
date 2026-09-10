<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        $c104 = Room::where('name', 'C104')->first();
        $c107 = Room::where('name', 'C107-108')->first();
        $b215 = Room::where('name', 'B215')->first();

        Reservation::create([
            'room_id' => $c104->id,
            'course_name' => 'Recurrent Ground Training A330',
            'subject' => 'Ground Training',
            'instructor' => 'Instructor A',
            'expected_participants' => 14,
            'present_participants' => 0,
            'start_at' => '2026-09-10 08:00:00',
            'end_at' => '2026-09-10 10:00:00',
            'status' => 'accepted',
            'source_id' => '2692',
        ]);

        Reservation::create([
            'room_id' => $c107->id,
            'course_name' => 'Recurrent Ground Training B737',
            'subject' => 'Ground Training',
            'instructor' => 'Instructor B',
            'expected_participants' => 23,
            'present_participants' => 5,
            'start_at' => '2026-09-10 09:00:00',
            'end_at' => '2026-09-10 11:00:00',
            'status' => 'accepted',
            'source_id' => '2693',
        ]);

        Reservation::create([
            'room_id' => $b215->id,
            'course_name' => 'Recurrent Ground Training B787',
            'subject' => 'Ground Training',
            'instructor' => 'Instructor C',
            'expected_participants' => 18,
            'present_participants' => 8,
            'start_at' => '2026-09-10 10:00:00',
            'end_at' => '2026-09-10 12:00:00',
            'status' => 'accepted',
            'source_id' => '2695',
        ]);

        // Data ini sengaja Pending untuk menguji filter nanti
        Reservation::create([
            'room_id' => $c104->id,
            'course_name' => 'Contoh Reservasi Pending',
            'subject' => null,
            'instructor' => null,
            'expected_participants' => 10,
            'present_participants' => 0,
            'start_at' => '2026-09-10 13:00:00',
            'end_at' => '2026-09-10 15:00:00',
            'status' => 'pending',
            'source_id' => '2694',
        ]);
    }
}