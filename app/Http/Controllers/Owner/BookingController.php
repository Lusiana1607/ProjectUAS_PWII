<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::whereHas('place', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->with(['user', 'place'])
        ->latest()
        ->get();

        return view('owner.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected,completed',
        ]);

        $booking = Booking::whereHas('place', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->findOrFail($id);

        $booking->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('owner.bookings.index')
            ->with('success', 'Status reservasi berhasil diperbarui.');
    }
}