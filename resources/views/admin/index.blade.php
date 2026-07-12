@extends('layouts.app')

@section('content')

<h1 style="text-align:center;margin-bottom:30px;">
👨‍💼 Tableau de bord Administrateur
</h1>

<div style="display:flex;flex-wrap:wrap;gap:25px;justify-content:center;">

<div style="width:250px;background:#0d6efd;color:white;padding:25px;border-radius:15px;text-align:center;">
<h2>🏠</h2>
<h3>{{ $totalListings }}</h3>
<p>Annonces</p>
</div>

<div style="width:250px;background:#198754;color:white;padding:25px;border-radius:15px;text-align:center;">
<h2>📅</h2>
<h3>{{ $totalBookings }}</h3>
<p>Réservations</p>
</div>

<div style="width:250px;background:#ffc107;padding:25px;border-radius:15px;text-align:center;">
<h2>💳</h2>
<h3>{{ $securePayments }}</h3>
<p>Paiements sécurisés</p>
</div>

<div style="width:250px;background:#dc3545;color:white;padding:25px;border-radius:15px;text-align:center;">
<h2>🚨</h2>
<h3>{{ $problems }}</h3>
<p>Litiges</p>
</div>
<div style="width:250px;background:#6f42c1;color:white;padding:25px;border-radius:15px;text-align:center;">
<h2>👤</h2>
<h3>{{ $owners }}</h3>
<p>Propriétaires</p>
</div>

<div style="width:250px;background:#20c997;color:white;padding:25px;border-radius:15px;text-align:center;">
<h2>🙋</h2>
<h3>{{ $clients }}</h3>
<p>Clients</p>
</div>

<div style="width:250px;background:#fd7e14;color:white;padding:25px;border-radius:15px;text-align:center;">
<h2>⏳</h2>
<h3>{{ $pending }}</h3>
<p>Réservations en attente</p>
</div>

<div style="width:250px;background:#198754;color:white;padding:25px;border-radius:15px;text-align:center;">
<h2>✅</h2>
<h3>{{ $accepted }}</h3>
<p>Réservations acceptées</p>
</div>

</div>

@endsection