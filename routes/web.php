<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
});
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/calendar', [BookingController::class, 'calendar'])->middleware('auth');
    Route::get('/messages/{listing}', [MessageController::class, 'index']);

Route::post('/messages/{listing}', [MessageController::class, 'store']);
Route::get('/messages', [MessageController::class, 'inbox']);
Route::get('/admin/listings', [AdminController::class, 'listings'])->name('admin.listings');

Route::delete('/admin/listings/{id}', [AdminController::class, 'deleteListing'])->name('admin.listings.delete');
Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');

Route::delete('/admin/bookings/{id}', [AdminController::class, 'deleteBooking'])->name('admin.bookings.delete');
Route::get('/admin/messages', [AdminController::class, 'messages'])
    ->middleware(['auth', 'admin'])
    ->name('admin.messages');
    Route::delete('/admin/messages/{id}', [AdminController::class, 'deleteMessage'])
    ->name('admin.messages.delete');
});


// =======================
// ANNONCES
// =======================

Route::get('/listings', [App\Http\Controllers\ListingController::class, 'index']);
Route::middleware('auth')->group(function () {

    Route::get('/listings/create', [App\Http\Controllers\ListingController::class, 'create']);

    Route::post('/listings', [App\Http\Controllers\ListingController::class, 'store']);

    Route::get('/my-listings', [App\Http\Controllers\ListingController::class, 'myListings']);
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');

Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
});

Route::get('/listings/{id}/edit', [App\Http\Controllers\ListingController::class, 'edit']);

Route::post('/listings/{id}/update', [App\Http\Controllers\ListingController::class, 'update']);

Route::post('/listings/{id}/delete', [App\Http\Controllers\ListingController::class, 'destroy']);

Route::get('/listings/{id}', [App\Http\Controllers\ListingController::class, 'show']);



// =======================
// ADMIN
// =======================

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);


// =======================
// RÉSERVATIONS
// =======================

Route::post('/bookings', [App\Http\Controllers\BookingController::class, 'store']);

Route::get('/bookings', [App\Http\Controllers\BookingController::class, 'index']);

Route::post('/bookings/{booking}/accept', [App\Http\Controllers\BookingController::class, 'accept']);

Route::post('/bookings/{booking}/reject', [App\Http\Controllers\BookingController::class, 'reject']);


// =======================
// PAIEMENTS
// =======================

Route::get('/payments/{id}', [App\Http\Controllers\BookingController::class, 'payment']);

Route::post('/payments/{id}', [App\Http\Controllers\BookingController::class, 'processPayment']);

Route::post('/payments/{booking}/confirm', [App\Http\Controllers\BookingController::class, 'confirmArrival']);

Route::post('/payments/{id}/problem', [App\Http\Controllers\BookingController::class, 'problem']);
Route::get('/invoice/{id}', [InvoiceController::class, 'download']);

// =======================
// AVIS

Route::post('/reviews', [App\Http\Controllers\ReviewController::class, 'store']);

Route::get('/reviews/{listing}', [App\Http\Controllers\ReviewController::class, 'index']);
Route::get('/reviews/create/{listing}', [App\Http\Controllers\ReviewController::class, 'create']);
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});
require __DIR__.'/auth.php';