@extends('layouts.app')

@section('content')

<div class="container">

    <div style="text-align:center;margin-bottom:40px;">
        <h1 style="font-size:38px;">📅 Gestion des réservations</h1>
        <p style="color:#777;font-size:18px;">
            Consultez et gérez toutes les réservations de vos logements.
        </p>
    </div>

    @if($bookings->isEmpty())

        <div style="
            background:white;
            padding:40px;
            border-radius:15px;
            text-align:center;
            box-shadow:0 5px 20px rgba(0,0,0,.08);">

            <h2>📭 Aucune réservation</h2>

            <p style="color:#777;">
                Vous n'avez encore reçu aucune réservation.
            </p>

        </div>

    @else

        @foreach($bookings as $booking)

        <div style="
            background:white;
            border-radius:18px;
            padding:25px;
            margin-bottom:25px;
            box-shadow:0 8px 20px rgba(0,0,0,.08);
            transition:.3s;">

            <div style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                flex-wrap:wrap;">

                <div>
@if($booking->listing->image)
    <img src="{{ asset('images/'.$booking->listing->image) }}"
         style="width:140px;height:100px;object-fit:cover;border-radius:10px;margin-bottom:15px;">
@endif
                    <h2 style="margin:0;">
                        👤 {{ $booking->client_name }}
                    </h2>

                    <p style="margin-top:12px;">
                        📞 {{ $booking->phone }}
                    </p>

                    <p>
                        📅
                        {{ date('d/m/Y', strtotime($booking->start_date)) }}
                        →
                        {{ date('d/m/Y', strtotime($booking->end_date)) }}
                    </p>
                    <p>
    🏠 <strong>Logement :</strong>
    {{ $booking->listing->title }}
</p>

<p>
    📍 {{ $booking->listing->city }}
</p>

<p>
    💰 {{ number_format($booking->listing->price) }} FCFA
</p>

                </div>

                <div>

                    @if($booking->status == 'Acceptée')

                        <span style="
                            background:#d4edda;
                            color:#155724;
                            padding:10px 18px;
                            border-radius:30px;
                            font-weight:bold;">
                            ✅ Acceptée
                        </span>

                    @elseif($booking->status == 'Refusée')

                        <span style="
                            background:#f8d7da;
                            color:#721c24;
                            padding:10px 18px;
                            border-radius:30px;
                            font-weight:bold;">
                            ❌ Refusée
                        </span>

                    @else

                        <span style="
                            background:#fff3cd;
                            color:#856404;
                            padding:10px 18px;
                            border-radius:30px;
                            font-weight:bold;">
                            ⏳ En attente
                        </span>

                    @endif

                </div>

            </div>

            <hr style="margin:20px 0;">

            @if($booking->status == 'En attente')

<div style="display:flex;gap:15px;flex-wrap:wrap;">

    <form action="/bookings/{{ $booking->id }}/accept" method="POST">
        @csrf
        <button type="submit"
        style="background:#28a745;color:white;border:none;padding:12px 30px;border-radius:8px;font-weight:bold;cursor:pointer;">
            ✅ Accepter
        </button>
    </form>

    <form action="/bookings/{{ $booking->id }}/reject" method="POST">
        @csrf
        <button type="submit"
        style="background:#dc3545;color:white;border:none;padding:12px 30px;border-radius:8px;font-weight:bold;cursor:pointer;">
            ❌ Refuser
        </button>
    </form>

</div>

@endif

        </div>

        @endforeach

    @endif

</div>

@endsection