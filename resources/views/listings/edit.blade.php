@extends('layouts.app')

@section('content')
<div class="container">

<h1>Modifier une annonce</h1>

<form method="POST" action="/listings/{{ $listing->id }}/update">
    @csrf

    <p>
        <label>Titre</label><br>
        <input type="text" name="title" value="{{ $listing->title }}">
    </p>

    <p>
        <label>Type de bien</label><br>
        <select name="type">

            <option value="Appartement meublé"
            {{ $listing->type=='Appartement meublé' ? 'selected' : '' }}>
            Appartement meublé
            </option>

            <option value="Studio meublé"
            {{ $listing->type=='Studio meublé' ? 'selected' : '' }}>
            Studio meublé
            </option>

            <option value="Hôtel"
            {{ $listing->type=='Hôtel' ? 'selected' : '' }}>
            Hôtel
            </option>

            <option value="Salle de fête"
            {{ $listing->type=='Salle de fête' ? 'selected' : '' }}>
            Salle de fête
            </option>

        </select>
    </p>

    <p>
        <label>Disponibilité</label><br>

        <select name="availability">

            <option value="Disponible"
            {{ $listing->availability=='Disponible' ? 'selected' : '' }}>
            Disponible
            </option>

            <option value="Réservé"
            {{ $listing->availability=='Réservé' ? 'selected' : '' }}>
            Réservé
            </option>

            <option value="Occupé"
            {{ $listing->availability=='Occupé' ? 'selected' : '' }}>
            Occupé
            </option>

        </select>
    </p>

    <p>
        <label>Description</label><br>

        <textarea name="description">{{ $listing->description }}</textarea>
    </p>

    <p>
        <label>Prix</label><br>

        <input type="number" name="price"
        value="{{ $listing->price }}">
    </p>

    <p>
        <label>Ville</label><br>

        <input type="text" name="city"
        value="{{ $listing->city }}">
    </p>

    <p>
        <label>Adresse</label><br>

        <input type="text" name="address"
        value="{{ $listing->address }}">
    </p>
    <p>
    <label>Latitude</label><br>

    <input type="text" name="latitude"
    value="{{ $listing->latitude }}">
</p>

<p>
    <label>Longitude</label><br>

    <input type="text" name="longitude"
    value="{{ $listing->longitude }}">
</p>

    <hr>

    <h3>Équipements</h3>

    <p><label><input type="checkbox" name="wifi"
    {{ $listing->wifi ? 'checked' : '' }}> 📶 Wi-Fi</label></p>

    <p><label><input type="checkbox" name="parking"
    {{ $listing->parking ? 'checked' : '' }}> 🚗 Parking</label></p>

    <p><label><input type="checkbox" name="climatisation"
    {{ $listing->climatisation ? 'checked' : '' }}> ❄️ Climatisation</label></p>

    <p><label><input type="checkbox" name="television"
    {{ $listing->television ? 'checked' : '' }}> 📺 Télévision</label></p>

    <p><label><input type="checkbox" name="eau_chaude"
    {{ $listing->eau_chaude ? 'checked' : '' }}> 🚿 Eau chaude</label></p>

    <p><label><input type="checkbox" name="groupe_electrogene"
    {{ $listing->groupe_electrogene ? 'checked' : '' }}> ⚡ Groupe électrogène</label></p>

    <p><label><input type="checkbox" name="securite"
    {{ $listing->securite ? 'checked' : '' }}> 🛡️ Sécurité</label></p>

    <p><label><input type="checkbox" name="cuisine"
    {{ $listing->cuisine ? 'checked' : '' }}> 🍳 Cuisine équipée</label></p>

    <br>

    <button class="btn">
        💾 Enregistrer les modifications
    </button>

</form>

</div>

@endsection