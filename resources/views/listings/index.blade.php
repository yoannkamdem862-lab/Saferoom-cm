@extends('layouts.app')

@section('content')

<div class="container">

    <h1 style="text-align:center;font-size:36px;margin-bottom:10px;">
        🏠 Trouvez votre logement idéal
    </h1>

    <p style="text-align:center;color:#666;font-size:18px;margin-bottom:30px;">
        Appartements • Studios • Hôtels • Salles de fête
    </p>

    <form method="GET" action="/listings"
          style="background:white;padding:20px;border-radius:15px;
          box-shadow:0 5px 20px rgba(0,0,0,.1);
          margin-bottom:40px;
          display:flex;
          gap:15px;
          flex-wrap:wrap;
          justify-content:center;">

        <input
            type="text"
            name="city"
            value="{{ request('city') }}"
            placeholder="📍 Ville"
            style="padding:12px;border-radius:8px;border:1px solid #ddd;width:180px;">

        <select name="type"
                style="padding:12px;border-radius:8px;border:1px solid #ddd;">

            <option value="">Tous les types</option>
            <option value="Appartement meublé">Appartement meublé</option>
            <option value="Studio meublé">Studio meublé</option>
            <option value="Hôtel">Hôtel</option>
            <option value="Salle de fête">Salle de fête</option>

        </select>

        <select name="availability"
                style="padding:12px;border-radius:8px;border:1px solid #ddd;">

            <option value="">Disponibilité</option>
            <option value="Disponible">Disponible</option>
            <option value="Réservé">Réservé</option>
            <option value="Occupé">Occupé</option>

        </select>

        <input
            type="number"
            name="price"
            value="{{ request('price') }}"
            placeholder="💰 Budget max"
            style="padding:12px;border-radius:8px;border:1px solid #ddd;width:170px;">

        <button class="search-btn">
            🔍 Rechercher
        </button>

    </form>

@if($listings->isEmpty())

<h2 style="text-align:center;">
Aucune annonce disponible.
</h2>

@else

<div style="display:flex;flex-wrap:wrap;justify-content:center;gap:30px;">

@foreach($listings as $listing)

<div class="card" style="width:340px;">

    @if($listing->image)
        <img src="{{ asset('images/'.$listing->image) }}"
             style="width:100%;height:240px;object-fit:cover;">
    @endif

    <div style="padding:18px;">

        <div style="display:flex;justify-content:space-between;align-items:center;">

            <h3 style="margin:0;">{{ $listing->title }}</h3>

            <span style="color:#ffc107;font-weight:bold;">
                @if($listing->reviews->count() > 0)

⭐ {{ number_format($listing->reviews->avg('rating'), 1) }}

<small>({{ $listing->reviews->count() }} avis)</small>

@else

⭐ Nouveau

@endif
            </span>

        </div>

        <p style="margin-top:10px;">
            🏢 <strong>{{ $listing->type }}</strong>
        </p>

        <p>
            📍 {{ $listing->city }}
        </p>

        <p>
            📌 {{ $listing->address }}
        </p>

        <p>
            @if($listing->availability == 'Disponible')
                <span style="color:green;font-weight:bold;">🟢 Disponible</span>
            @elseif($listing->availability == 'Réservé')
                <span style="color:orange;font-weight:bold;">🟡 Réservé</span>
            @else
                <span style="color:red;font-weight:bold;">🔴 Occupé</span>
            @endif
        </p>
        @if($listing->availability == 'Disponible')
<div style="
background:#28a745;
color:white;
padding:6px 12px;
display:inline-block;
border-radius:30px;
font-size:13px;
font-weight:bold;
margin-bottom:12px;">
✓ Disponible
</div>
@endif
        <h2 style="color:#198754;margin:15px 0;">
         A partir de   {{ number_format($listing->price) }} FCFA / nuit
        </h2>

        <a href="/listings/{{ $listing->id }}">
            <button class="details-btn">
                Voir les détails
            </button>
        </a>

    </div>

</div>

@endforeach

</div>

@endif

@endsection

