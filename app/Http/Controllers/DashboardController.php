<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Booking;
use App\Models\Review;

class DashboardController extends Controller
{
   public function index()
{
    $user = auth()->user();

    $listings = Listing::where('user_id', $user->id)->count();

    $bookings = Booking::whereHas('listing', function ($query) use ($user) {
        $query->where('user_id', $user->id);
    })->count();
    $revenus = Booking::whereHas('listing', function ($query) use ($user) {
    $query->where('user_id', $user->id);
})
->where('payment_status', 'Payé')
->join('listings', 'bookings.listing_id', '=', 'listings.id')
->sum('listings.price');

    $reviews = Review::whereHas('listing', function ($query) use ($user) {
        $query->where('user_id', $user->id);
    });

    $average = $reviews->avg('rating');

    if ($average) {
        $average = round($average, 1);
    }

    return view('dashboard', compact(
    'listings',
    'bookings',
    'average',
    'revenus'
));
}
}
