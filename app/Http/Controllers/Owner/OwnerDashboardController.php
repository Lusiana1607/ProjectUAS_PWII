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

    return view('owner.dashboard', compact(
        'totalPlaces',
        'totalServices',
        'totalBookings',
        'pendingBookings',
        'approvedBookings',
        'completedBookings'
    ));
}
}