<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Place;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCategories = Category::count();
        $totalPlaces = Place::count();
        $pendingPlaces = Place::where('status', 'pending')->count();
        $latestPlaces = Place::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCategories',
            'totalPlaces',
            'pendingPlaces',
            'latestPlaces'
        ));
    }
}