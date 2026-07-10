<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Customer\PlaceExploreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/explore', [PlaceExploreController::class, 'index'])->name('customer.explore');
Route::get('/explore/{id}', [PlaceExploreController::class, 'show'])->name('customer.show');
Route::get('/explore/{id}/booking', [PlaceExploreController::class, 'bookingForm'])->name('customer.booking.form');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
