<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Customer\PlaceExploreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/explore', [PlaceExploreController::class, 'index'])
    ->name('customer.explore');

Route::get('/explore/{id}', [PlaceExploreController::class, 'show'])
    ->name('customer.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// CUSTOMER 
Route::middleware(['auth'])->group(function () {

    Route::get('/explore/{id}/booking', [PlaceExploreController::class, 'bookingForm'])
        ->name('customer.booking.form');

    Route::post('/explore/{id}/booking', [PlaceExploreController::class, 'storeBooking'])
        ->name('customer.booking.store');

    Route::get('/bookings/history', [PlaceExploreController::class, 'bookingHistory'])
        ->name('customer.booking.history');

    Route::post('/favorites/toggle/{place_id}', [PlaceExploreController::class, 'toggleFavorite'])
        ->name('customer.favorite.toggle');

    Route::get('/favorites', [PlaceExploreController::class, 'favoriteList'])
        ->name('customer.favorite.list');
});


// ADMIN 
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/categories', [CategoryController::class, 'index'])
        ->name('admin.categories.index');

    Route::get('/admin/categories/create', [CategoryController::class, 'create'])
        ->name('admin.categories.create');

    Route::post('/admin/categories', [CategoryController::class, 'store'])
        ->name('admin.categories.store');

    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])
        ->name('admin.categories.edit');

    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])
        ->name('admin.categories.update');

    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('admin.categories.destroy');

    Route::resource('admin/users', UserController::class);
});


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';