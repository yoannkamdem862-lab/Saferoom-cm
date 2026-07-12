@extends('layouts.app')

@section('content')

<div style="max-width:700px;margin:40px auto;background:white;padding:30px;border-radius:15px;box-shadow:0 5px 20px rgba(0,0,0,.15);">

<h2 style="text-align:center;">
⭐ Comment s'est passé votre séjour ?
</h2>

<form method="POST" action="/reviews">
@csrf

<input type="hidden" name="listing_id" value="{{ $listing->id }}">

<p>
<label>Votre nom</label><br>

<input
type="text"
name="client_name"
required
style="width:100%;padding:12px;">
</p>

<p>

<label>Votre note</label><br>

<select
name="rating"
required
style="width:100%;padding:12px;">

<option value="5">⭐⭐⭐⭐⭐ Excellent</option>

<option value="4">⭐⭐⭐⭐ Très bien</option>

<option value="3">⭐⭐⭐ Bien</option>

<option value="2">⭐⭐ Moyen</option>

<option value="1">⭐ Mauvais</option>

</select>

</p>

<p>

<label>Votre commentaire</label>

<textarea
name="comment"
rows="5"
required
style="width:100%;padding:12px;"></textarea>

</p>

<button
style="
background:#0d6efd;
color:white;
padding:15px 25px;
border:none;
border-radius:10px;
cursor:pointer;">

Publier mon avis

</button>

</form>

</div>

@endsection