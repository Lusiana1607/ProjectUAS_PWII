<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class OwnerDashboardController extends Controller
{
    public function index(): View
    {
        $placesCount = auth()->user()->places()->count();

        return view('owner.dashboard', compact('placesCount'));
    }
}