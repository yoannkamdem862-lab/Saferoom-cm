<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function download($id)
    {
        $booking = Booking::with('listing', 'user')->findOrFail($id);

        $pdf = Pdf::loadView('invoice', compact('booking'));

        return $pdf->download('Facture-SafeRoom-CM.pdf');
    }
}