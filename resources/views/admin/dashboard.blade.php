@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Tableau de bord Administrateur</h1>

    <div style="display:flex;gap:20px;flex-wrap:wrap;margin-top:30px;">
<div class="card">
    <h3>👥 Utilisateurs</h3>

    <h1 style="margin:15px 0;font-size:40px;">
    {{ $users }}
</h1>
<a href="{{ route('admin.users') }}"
   class="btn btn-primary"
   style="margin-top:15px; display:inline-block;">
    Gérer les utilisateurs
</a>
</div>
<div class="card">
    <h3>🏠 Annonces</h3>

<h1 style="margin:15px 0;font-size:40px;">
    {{ $listings }}
</h1>

<a href="{{ route('admin.listings') }}"
   class="btn btn-primary"
   style="margin-top:15px;display:inline-block;">
    Gérer les annonces
</a>
</div>
<div class="card">

    <h3>📅 Réservations</h3>

<h1 style="margin:15px 0;font-size:40px;">
    {{ $bookings }}
</h1>

<a href="{{ route('admin.bookings') }}"
   class="btn btn-primary"
   style="margin-top:15px;display:inline-block;">
    Gérer les réservations
</a>

</div><div class="card">

  <h3>💬 Messages</h3>

<h1 style="margin:15px 0;font-size:40px;">
    {{ $messages }}
</h1>

<a href="{{ route('admin.messages') }}"
   class="btn btn-primary"
   style="margin-top:15px;display:inline-block;">
    Gérer les messages
</a>

</div>
    </div>

</div>

@endsection