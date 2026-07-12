@extends('layouts.app')

@section('content')

<div class="hero">

    <div class="hero-box">

        

        <h1>SafeRoom CM</h1>

        <p class="subtitle">
            Trouvez votre logement idéal partout au Cameroun
        </p>

        <p class="description">
            Réservez des appartements meublés, hôtels, studios et salles de fête
            en toute sécurité.
        </p>
        <div class="hero-search">

    <input type="text" placeholder="📍 Ville">

    <input type="date">

    <select>
        <option>Tous les logements</option>
        <option>Appartement</option>
        <option>Studio</option>
        <option>Hôtel</option>
        <option>Salle de fête</option>
    </select>

    <button>
        🔍 Rechercher
    </button>

</div>

        <div class="hero-buttons">

            <a href="/listings" class="btn-search">
                🔍 Trouver un logement
            </a>

            <a href="/listings/create" class="btn-publish">
                ➕ Publier une annonce
            </a>

        </div>

    </div>

</div>

<section class="features">

    <div class="feature-card">
        <div class="icon">🛡️</div>
        <h3>Paiement sécurisé</h3>
        <p>Votre argent est protégé jusqu'à votre arrivée dans le logement.</p>
    </div>

    <div class="feature-card">
        <div class="icon">📍</div>
        <h3>Localisation</h3>
        <p>Chaque logement possède une carte interactive pour le retrouver facilement.</p>
    </div>

    <div class="feature-card">
        <div class="icon">⭐</div>
        <h3>Avis vérifiés</h3>
        <p>Consultez les avis laissés par les précédents voyageurs.</p>
    </div>

    <div class="feature-card">
        <div class="icon">💬</div>
        <h3>Messagerie</h3>
        <p>Discutez directement avec le propriétaire avant votre réservation.</p>
    </div>

</section>

@endsection