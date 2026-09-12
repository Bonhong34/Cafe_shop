<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderByDesc('reservation_date')
            ->orderByDesc('reservation_time')
            ->paginate(15);

        return view('admin.reservations.index', compact('reservations'));
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation removed.');
    }
}
