@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="text-align:center;font-size:38px;margin-bottom:10px;">
🏠 Publier une annonce
</h1>

<p style="text-align:center;color:#666;margin-bottom:35px;">
Remplissez les informations de votre logement pour recevoir des réservations.
</p>

    <form method="POST" action="/listings" enctype="multipart/form-data">
        @csrf
<h3>🏠 Informations générales</h3>
        <p>
            <label>Titre</label><br>
            <input type="text" name="title">
        </p>

        <p>
            <label>Type de bien</label><br>
            <select name="type">
                <option value="Appartement meublé">Appartement meublé</option>
                <option value="Studio meublé">Studio meublé</option>
                <option value="Hôtel">Hôtel</option>
                <option value="Salle de fête">Salle de fête</option>
            </select>
        </p>

        <p>
            <label>Disponibilité</label><br>
            <select name="availability">
                <option value="Disponible">Disponible</option>
                <option value="Réservé">Réservé</option>
                <option value="Occupé">Occupé</option>
            </select>
        </p>

        <p>
            <label>Description</label><br>
            <textarea name="description"></textarea>
        </p>

        <p>
            <label>Prix</label><br>
            <input type="number" name="price">
        </p>

        <p>
            <label>Ville</label><br>
            <input type="text" name="city">
        </p>

        <p>
            <label>Adresse</label><br>
            <input type="text" name="address">
        </p>
        <h3>📍 Localisation</h3>
        <p>
    <label>Latitude</label><br>
    <input type="text" name="latitude" placeholder="Ex : 3.8480">
</p>

<p>
    <label>Longitude</label><br>
    <input type="text" name="longitude" placeholder="Ex : 11.5021">
</p>

      <h3>📷 Photos</h3>
        <p>
    <label>Photo principale</label><br>
    <input type="file" name="image">
</p>

<p>
    <label>Photo 2</label><br>
    <input type="file" name="image2">
</p>

<p>
    <label>Photo 3</label><br>
    <input type="file" name="image3">
</p>

<p>
    <label>Photo 4</label><br>
    <input type="file" name="image4">
</p>
<hr>

<h3>Équipements disponibles</h3>

<p><label><input type="checkbox" name="wifi"> 📶 Wi-Fi</label></p>

<p><label><input type="checkbox" name="parking"> 🚗 Parking</label></p>

<p><label><input type="checkbox" name="climatisation"> ❄️ Climatisation</label></p>

<p><label><input type="checkbox" name="television"> 📺 Télévision</label></p>

<p><label><input type="checkbox" name="eau_chaude"> 🚿 Eau chaude</label></p>

<p><label><input type="checkbox" name="groupe_electrogene"> ⚡ Groupe électrogène</label></p>

<p><label><input type="checkbox" name="securite"> 🛡️ Sécurité 24h/24</label></p>

<p><label><input type="checkbox" name="cuisine"> 🍳 Cuisine équipée</label></p>

        <button type="submit">
            Enregistrer
        </button>

    </form>
</div>
@endsection