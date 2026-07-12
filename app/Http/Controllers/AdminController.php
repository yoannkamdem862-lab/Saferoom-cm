<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use App\Models\Booking;
use App\Models\Message;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'users' => User::count(),
            'listings' => Listing::count(),
            'bookings' => Booking::count(),
            'messages' => Message::count(),
        ]);
    }
    public function users()
{
    $users = User::all();

    return view('admin.users', compact('users'));
}

public function deleteUser($id)
{
    User::findOrFail($id)->delete();

    return back()->with('success', 'Utilisateur supprimé avec succès.');
}
public function listings()
{
    $listings = Listing::latest()->get();

    return view('admin.listings', compact('listings'));
}

public function deleteListing($id)
{
    Listing::findOrFail($id)->delete();

    return back()->with('success', 'Annonce supprimée avec succès.');
}
public function bookings()
{
    $bookings = Booking::latest()->get();

    return view('admin.bookings', compact('bookings'));
}

public function deleteBooking($id)
{
    Booking::findOrFail($id)->delete();

    return back()->with('success', 'Réservation supprimée avec succès.');
}
public function messages()
{
    $messages = \App\Models\Message::latest()->get();

    return view('admin.messages', compact('messages'));
}
public function deleteMessage($id)
{
    \App\Models\Message::findOrFail($id)->delete();

    return back()->with('success', 'Message supprimé.');
}
}
