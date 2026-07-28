<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class OwnerDashboardController extends Controller
{
    public function index(): View
{
    $owner = Auth::user();

    $hour = now()->format('H');

if ($hour < 12) {
    $greeting = 'Selamat Pagi';
} elseif ($hour < 15) {
    $greeting = 'Selamat Siang';
} elseif ($hour < 18) {
    $greeting = 'Selamat Sore';
} else {
    $greeting = 'Selamat Malam';
}

    $totalPlaces = $owner->places()->count();

    $totalServices = Service::whereHas('place', function ($query) use ($owner) {
        $query->where('user_id', $owner->id);
    })->count();

    $totalBookings = Booking::whereHas('place', function ($query) use ($owner) {
        $query->where('user_id', $owner->id);
    })->count();

    $pendingBookings = Booking::whereHas('place', function ($query) use ($owner) {
        $query->where('user_id', $owner->id);
    })->where('status', 'pending')->count();

    $approvedBookings = Booking::whereHas('place', function ($query) use ($owner) {
        $query->where('user_id', $owner->id);
    })->where('status', 'approved')->count();

    $completedBookings = Booking::whereHas('place', function ($query) use ($owner) {
        $query->where('user_id', $owner->id);
    })->where('status', 'completed')->count();

    $recentBookings = Booking::whereHas('place', function ($query) use ($owner) {
    $query->where('user_id', $owner->id);
})
->with(['user', 'place'])
->latest()
->take(5)
->get();

    $chartData = [
    $pendingBookings,
    $approvedBookings,
    $completedBookings,
];

    return view('owner.dashboard', compact(
    'greeting',
    'totalPlaces',
    'totalServices',
    'totalBookings',
    'pendingBookings',
    'approvedBookings',
    'completedBookings',
    'recentBookings'
));
}
}