<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Listing;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Listing $listing)
    {
        $messages = Message::where('listing_id', $listing->id)
            ->orderBy('created_at')
            ->get();

        return view('messages.index', compact('listing', 'messages'));
    }

    public function store(Request $request, Listing $listing)
    {
        $request->validate([
            'message' => 'required'
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $listing->user_id,
            'listing_id' => $listing->id,
            'message' => $request->message,
        ]);

        return back();
    }
    public function inbox()
{
    return view('messages.inbox');
}

}
