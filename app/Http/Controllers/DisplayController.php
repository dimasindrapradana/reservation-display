<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Reservation;
use App\Models\SecurityReservation;

class DisplayController extends Controller
{
    public function index($buildingCode)
    {
        $building = Building::where('code', $buildingCode)->firstOrFail();

        $today = now()->toDateString();

        $reservations = Reservation::with('room')
            ->whereHas('room', function ($query) use ($building) {
                $query->where('building_id', $building->id);
            })
            ->where('status', 'accepted')
            ->whereDate('start_at', '<=', $today)
            ->whereDate('end_at', '>=', $today)
            ->orderBy('start_at')
            ->get();

        return view('display.index', compact('building', 'reservations'));
    }

         public function index2($buildingCode)
        {
            $building = Building::where('code', $buildingCode)->firstOrFail();

            $today = now()->toDateString();
            $tomorrow = now()->copy()->addDay()->toDateString();
            $now = now();

            // =========================
            // JADWAL HARI INI
            // =========================

            $reservations = Reservation::with('room')
                ->whereHas('room', function ($query) use ($building) {
                    $query->where('building_id', $building->id);
                })
                ->where('status', 'accepted')
                ->whereDate('start_at', '<=', $today)
                ->whereDate('end_at', '>=', $today)
                ->orderBy('start_at')
                ->get();


            // =========================
            // KELAS SEDANG BERLANGSUNG
            // =========================

            $currentReservations = $reservations->filter(function ($reservation) use ($now) {
                return $reservation->start_at <= $now
                    && $reservation->end_at >= $now;
            })->values();


            // =========================
            // KELAS YANG BELUM DIMULAI
            // =========================

            $upcomingReservations = $reservations->filter(function ($reservation) use ($now) {
                return $reservation->start_at > $now;
            })->values();


            // Kelas terdekat yang akan dimulai hari ini
            $nextReservation = $upcomingReservations->first();


            // =========================
            // JADWAL BESOK
            // =========================

            $tomorrowReservations = Reservation::with('room')
                ->whereHas('room', function ($query) use ($building) {
                    $query->where('building_id', $building->id);
                })
                ->where('status', 'accepted')
                ->whereDate('start_at', '<=', $tomorrow)
                ->whereDate('end_at', '>=', $tomorrow)
                ->orderBy('start_at')
                ->get();


            // =========================
            // JADWAL SIMULASI BUILDING F
            // =========================

            $simulasiSchedule = array();

            if ($building->code === 'F') {
                $simulasiSchedule = [
                    // Data 20 jadwal Simulasi akan kita masukkan di sini
                ];
            }

            return view('display.index2', compact(
                'building',
                'reservations',
                'currentReservations',
                'upcomingReservations',
                'nextReservation',
                'tomorrowReservations',
                'simulasiSchedule'
            ));
        }

}