@extends('layouts.app')

@section('content')

<h1 style="font-size:30px;font-weight:bold;margin-bottom:30px;">
    👋 Bienvenue {{ Auth::user()->name }}
</h1>

<div style="
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;">

<div style="background:#198754;color:white;padding:25px;border-radius:15px;">

    <h3>🏠 Annonces</h3>

    <h1>{{ $listings }}</h1>

    <a href="{{ route('admin.listings') }}"
       style="display:inline-block;margin-top:15px;background:white;color:#198754;
              padding:10px 18px;border-radius:8px;text-decoration:none;font-weight:bold;">
        Gérer les annonces
    </a>

</div>

<div style="background:#198754;color:white;padding:25px;border-radius:15px;">
<h3>📅 Réservations</h3>
<h1>{{ $bookings }}</h1>
</div>

<div style="background:#ffc107;color:black;padding:25px;border-radius:15px;">
<h3>⭐ Note moyenne</h3>

@if($average)
<h1>{{ $average }}/5</h1>
@else
<h1>Nouveau</h1>
@endif

</div>

<div style="background:#dc3545;color:white;padding:25px;border-radius:15px;">
<h3>💰 Revenus</h3>
<h1>{{ number_format($revenus, 0, ',', ' ') }} FCFA</h1>
</div>

</div>

@endsection
