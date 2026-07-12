@extends('layouts.app')

@section('content')

<h1 style="text-align:center;margin-bottom:30px;">
Mes annonces
</h1>

@if($listings->isEmpty())

<h3>Aucune annonce publiée.</h3>

@else

@foreach($listings as $listing)

<div style="border:1px solid #ddd;padding:20px;margin-bottom:20px;border-radius:10px;">

<h2>{{ $listing->title }}</h2>

<p><strong>Ville :</strong> {{ $listing->city }}</p>

<p><strong>Prix :</strong> {{ number_format($listing->price) }} FCFA</p>

<p><strong>Disponibilité :</strong> {{ $listing->availability }}</p>

<a href="/listings/{{ $listing->id }}">
    <button class="btn">
        👁 Voir l'annonce
    </button>
</a>

<a href="/listings/{{ $listing->id }}/edit">
    <button
        style="background:#ffc107;color:black;padding:10px 15px;border:none;border-radius:8px;margin-left:10px;cursor:pointer;">
        ✏ Modifier
    </button>
</a>
<form action="/listings/{{ $listing->id }}/delete"
      method="POST"
      style="display:inline;"
      onsubmit="return confirm('Voulez-vous vraiment supprimer cette annonce ?');">
    @csrf

    <button
        style="background:#dc3545;color:white;padding:10px 15px;border:none;border-radius:8px;margin-left:10px;cursor:pointer;">
        🗑 Supprimer
    </button>
</form>

</div>

@endforeach

@endif

@endsection