<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Place;
use App\Models\Booking;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistik Dashboard
        $totalUsers = User::count();

        $totalOwners = User::whereHas('role', function ($query) {
            $query->where('name', 'Owner');
        })->count();

        $totalCategories = Category::count();
        $totalPlaces = Place::count();
        $totalBookings = Booking::count();

        // Data Tempat
        $pendingPlaces = Place::where('status', 'pending')->count();
        $latestPlaces = Place::latest()->take(5)->get();

        // Tampilkan ke Dashboard
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalOwners',
            'totalCategories',
            'totalPlaces',
            'totalBookings',
            'pendingPlaces',
            'latestPlaces'
        ));
    }
}