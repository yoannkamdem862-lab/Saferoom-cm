<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  public function create($listing)
{
    $booking = Booking::where('listing_id', $listing)
        ->where('payment_status', 'Paiement transféré')
        ->first();

    if (!$booking) {
        return redirect('/listings')
            ->with('error', 'Vous ne pouvez pas laisser un avis sans avoir terminé votre séjour.');
    }

    $listing = Listing::findOrFail($listing);

    return view('reviews.create', compact('listing'));
}

    public function store(Request $request)
    {
        Review::create([

            'listing_id' => $request->listing_id,

            'client_name' => $request->client_name,

            'rating' => $request->rating,

            'comment' => $request->comment,

            'verified' => true

        ]);

        return redirect('/listings/'.$request->listing_id)
            ->with('success','Merci pour votre avis !');
    }
}
