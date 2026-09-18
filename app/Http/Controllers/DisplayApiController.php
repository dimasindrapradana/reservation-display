<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DisplayApiController extends Controller
{
    public function index($buildingCode)
    {
        $today = now()->toDateString();
        $tomorrow = now()->copy()->addDay()->toDateString();

        // Cari gedung berdasarkan kode dari database lama
        $building = DB::connection('old_mysql')
            ->table('gedung')
            ->where('gedung', $buildingCode)
            ->first();

        if (!$building) {
            return response()->json([
                'message' => 'Building not found'
            ], 404);
        }

        // Ambil room yang berada di gedung tersebut
        $rooms = DB::connection('old_mysql')
            ->table('room')
            ->where('id_gedung', $building->id_gedung)
            ->pluck('nama');

        // =========================
        // JADWAL HARI INI
        // =========================

        $reservations = DB::connection('old_mysql')
            ->table('room_book')
            ->where('status_book', 'Accepted')
            ->whereIn('room_name', $rooms)
            ->whereDate('start', '<=', $today)
            ->whereDate('end', '>=', $today)
            ->orderBy('start')
            ->get();

        // =========================
        // JADWAL BESOK
        // =========================

        $tomorrowReservations = DB::connection('old_mysql')
            ->table('room_book')
            ->where('status_book', 'Accepted')
            ->whereIn('room_name', $rooms)
            ->whereDate('start', '<=', $tomorrow)
            ->whereDate('end', '>=', $tomorrow)
            ->orderBy('start')
            ->get();

        return response()->json([
            'building' => $building,
            'reservations' => $reservations,
            'tomorrowReservations' => $tomorrowReservations,
        ]);
    }


    // =========================
    // SECURITY MONITORING
    // =========================

    public function security()
    {
        $today = now()->toDateString();

        // =========================
        // SEMUA RESERVATION HARI INI
        // =========================

        $reservations = DB::connection('old_mysql')
            ->table('room_book as rb')
            ->leftJoin(
                'room as r',
                'rb.room_name',
                '=',
                'r.nama'
            )
            ->leftJoin(
                'gedung as g',
                'r.id_gedung',
                '=',
                'g.id_gedung'
            )
            ->where('rb.status_book', 'Accepted')
            ->whereDate('rb.start', '<=', $today)
            ->whereDate('rb.end', '>=', $today)
            ->select(
                'rb.id_booked',
                'rb.room_name',
                'rb.nama_event',
                'rb.nopeg_tro',
                'rb.start',
                'rb.end',
                'rb.status_book',
                'rb.additional',
                'g.gedung as building_code'
            )
            ->orderBy('rb.start')
            ->get();

        return response()->json([
            'reservations' => $reservations,
        ]);
    }
}