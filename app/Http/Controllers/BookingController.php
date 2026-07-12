<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Listing;
use App\Notifications\BookingAcceptedNotification;
use App\Models\User;

class BookingController extends Controller
{
    public function index()
{
    $bookings = \App\Models\Booking::where('user_id', auth()->id())->get();

    return view('bookings.index', compact('bookings'));
}
    public function store(Request $request)
{
    $exists = Booking::where('listing_id', $request->listing_id)
    ->where(function ($query) use ($request) {

        $query->whereBetween('start_date', [$request->start_date, $request->end_date])

              ->orWhereBetween('end_date', [$request->start_date, $request->end_date])

              ->orWhere(function ($q) use ($request) {

                    $q->where('start_date', '<=', $request->start_date)
                      ->where('end_date', '>=', $request->end_date);

              });

    })
    ->exists();

if ($exists) {

    return back()->with('error', 'Ce logement est déjà réservé pour ces dates.');

}
    $booking = Booking::create([
        'listing_id' => $request->listing_id,
        'client_name' => $request->client_name,
        'phone' => $request->phone,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'status' => 'En attente',
        'payment_status' => 'En attente',
        'user_id' => auth()->id(),
    ]);

    return redirect('/payments/' . $request->listing_id);
}
public function accept(Booking $booking)
{
    // Accepter la réservation
    $booking->status = 'Acceptée';
    $booking->save();
    $client = User::find($booking->user_id);

if ($client) {
    $client->notify(new BookingAcceptedNotification());
}

    // Refuser les autres réservations sur les mêmes dates
    Booking::where('listing_id', $booking->listing_id)
        ->where('id', '!=', $booking->id)
        ->where(function ($query) use ($booking) {
            $query->whereBetween('start_date', [$booking->start_date, $booking->end_date])
                  ->orWhereBetween('end_date', [$booking->start_date, $booking->end_date])
                  ->orWhere(function ($q) use ($booking) {
                      $q->where('start_date', '<=', $booking->start_date)
                        ->where('end_date', '>=', $booking->end_date);
                  });
        })
        ->update([
            'status' => 'Refusée'
        ]);

 return redirect('/bookings')
    ->with('success', 'Réservation acceptée et notification envoyée.');
}

public function reject(Booking $booking)
{
    $booking->status = 'Refusée';
    $booking->save();

    return redirect('/bookings');
}
public function payment($id)
{
    $listing = Listing::findOrFail($id);

    return view('payments.index', compact('listing'));
}
public function processPayment($id)
{
    $listing = Listing::findOrFail($id);

    $booking = Booking::where('listing_id', $listing->id)
        ->where('user_id', auth()->id())
        ->latest()
        ->first();

    if ($booking) {
        $booking->payment_status = 'Payé';
        $booking->save();
    }
return view('payments.success', compact('listing', 'booking'));
}

public function confirmArrival(Booking $booking)
{
    $booking->payment_status = 'Paiement transféré';
    $booking->save();

    return redirect('/reviews/create/'.$booking->listing_id);
}
public function problem($id)
{
    return view('payments.problem');
}
public function calendar()
{
    $bookings = \App\Models\Booking::with('listing')->get();

    return view('bookings.calendar', compact('bookings'));
}
}