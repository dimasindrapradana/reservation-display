<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Reservation;

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
        $now = now();

        $reservations = Reservation::with('room')
            ->whereHas('room', function ($query) use ($building) {
                $query->where('building_id', $building->id);
            })
            ->where('status', 'accepted')
            ->whereDate('start_at', '<=', $today)
            ->whereDate('end_at', '>=', $today)
            ->orderBy('start_at')
            ->get();

        // Kelas yang sedang berlangsung
        $currentReservations = $reservations->filter(function ($reservation) use ($now) {
            return $reservation->start_at <= $now
                && $reservation->end_at >= $now;
        })->values();

        // Kelas yang belum dimulai
        $upcomingReservations = $reservations->filter(function ($reservation) use ($now) {
            return $reservation->start_at > $now;
        })->values();

        // Jika tidak ada kelas yang sedang berlangsung,
        // ambil kelas terdekat yang akan dimulai.
        $nextReservation = $upcomingReservations->first();

        return view('display.index2', compact(
            'building',
            'reservations',
            'currentReservations',
            'upcomingReservations',
            'nextReservation'
        ));
    }
}