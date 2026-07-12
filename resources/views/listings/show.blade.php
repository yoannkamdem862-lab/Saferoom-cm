@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ $listing->title }}</h1>

    <div style="text-align:center;margin-bottom:30px;">

@if($listing->image)
<img src="{{ asset('images/'.$listing->image) }}"
     style="width:700px;height:420px;object-fit:cover;border-radius:15px;box-shadow:0 5px 15px rgba(0,0,0,.2);">
@endif

<div style="display:flex;justify-content:center;gap:15px;margin-top:20px;">

@if($listing->image2)
<img src="{{ asset('images/'.$listing->image2) }}"
     style="width:150px;height:100px;object-fit:cover;border-radius:10px;">
@endif

@if($listing->image3)
<img src="{{ asset('images/'.$listing->image3) }}"
     style="width:150px;height:100px;object-fit:cover;border-radius:10px;">
@endif

@if($listing->image4)
<img src="{{ asset('images/'.$listing->image4) }}"
     style="width:150px;height:100px;object-fit:cover;border-radius:10px;">
@endif

</div>

</div>

   <div style="background:#fff;border-radius:15px;padding:25px;box-shadow:0 5px 15px rgba(0,0,0,.1);margin-bottom:25px;">

    <span style="background:#0d6efd;color:white;padding:6px 12px;border-radius:20px;font-size:14px;">
        {{ $listing->type }}
    </span>

    <h2 style="color:#198754;margin-top:20px;">
     A partir de   {{ number_format($listing->price, 0, ',', ' ') }} FCFA / nuit
    </h2>

    <p style="font-size:18px;">
        📍 <strong>{{ $listing->city }}</strong>
    </p>

    <p>
        📌 {{ $listing->address }}
    </p>
    @if($listing->latitude && $listing->longitude)

<hr>

<h3>📍 Localisation</h3>

<div id="map" style="height:400px;border-radius:12px;margin-top:15px;"></div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    var map = L.map('map').setView(
        [{{ $listing->latitude }}, {{ $listing->longitude }}],
        15
    );

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    L.marker([{{ $listing->latitude }}, {{ $listing->longitude }}])
        .addTo(map)
        .bindPopup("{{ $listing->title }}")
        .openPopup();

});
</script>

@endif

    <hr>

    <p style="line-height:1.8;">
        {{ $listing->description }}
    </p>

</div>
    <h3>🏡 Équipements</h3>

<div style="display:grid;grid-template-columns:repeat(2,1fr);gap:10px;margin-bottom:20px;">

@if($listing->wifi)
<p>📶 Wi-Fi</p>
@endif

@if($listing->parking)
<p>🚗 Parking</p>
@endif

@if($listing->climatisation)
<p>❄️ Climatisation</p>
@endif

@if($listing->television)
<p>📺 Télévision</p>
@endif

@if($listing->eau_chaude)
<p>🚿 Eau chaude</p>
@endif

@if($listing->groupe_electrogene)
<p>⚡ Groupe électrogène</p>
@endif

@if($listing->securite)
<p>🛡️ Sécurité 24h/24</p>
@endif

@if($listing->cuisine)
<p>🍳 Cuisine équipée</p>
@endif

</div>

    <hr>

<h2>⭐ Avis des clients</h2>

@if($listing->reviews->count() > 0)

    @foreach($listing->reviews as $review)

        <div style="background:#f8f9fa;padding:15px;border-radius:10px;margin-bottom:15px;">

            <h4>
                {{ str_repeat('⭐', $review->rating) }}
            </h4>

            <p>
                {{ $review->comment }}
            </p>

            <small>
                <strong>{{ $review->client_name }}</strong>
                • ✅ Séjour vérifié
            </small>

        </div>

    @endforeach

@else

    <p>Aucun avis pour le moment.</p>

@endif

<h3>Réserver ce logement</h3>
@if(session('error'))
    <div style="background:#ffdddd;color:red;padding:10px;border-radius:5px;margin-bottom:15px;">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="/bookings">
    @csrf

    <input type="hidden" name="listing_id" value="{{ $listing->id }}">

    <p>
        <label>Nom complet</label><br>
        <input type="text" name="client_name" required>
    </p>

    <p>
        <label>Téléphone</label><br>
        <input type="text" name="phone" required>
    </p>

    <p>
        <label>Date d'arrivée</label><br>
        <input type="date" name="start_date" required>
    </p>

    <p>
        <label>Date de départ</label><br>
        <input type="date" name="end_date" required>
    </p>
    <a href="/messages/{{ $listing->id }}"
class="btn btn-success"
style="margin-bottom:20px;display:inline-block;">
💬 Contacter le propriétaire
</a>

    <button type="submit">
        Confirmer la réservation
    </button>
</form>

</div>
@endsection