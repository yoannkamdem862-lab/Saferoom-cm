<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($id)
    {
        $booking = Booking::findOrFail($id);

        return view('payments.index', compact('booking'));
    }

    public function pay($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->payment_status = 'Payé';
        $booking->save();

        return redirect('/payments/success');
    }

    public function success()
    {
        return view('payments.success');
    }

    public function problem()
    {
        return view('payments.problem');
    }
}