@extends('layouts.app')

@section('content')

<div class="container" style="max-width:600px;margin:auto;">

<h1>Paiement sécurisé</h1>

<h3>{{ $listing->title }}</h3>

<p><strong>Montant :</strong> {{ number_format($listing->price) }} FCFA</p>

<hr>

<h4>Choisissez votre moyen de paiement</h4>

<form method="POST" action="/payments/{{ $listing->id }}">
@csrf

<p>
<label>
<input type="radio" name="payment" checked>
Orange Money
</label>
</p>

<p>
<label>
<input type="radio" name="payment">
MTN Mobile Money
</label>
</p>

<button
style="
background:green;
color:white;
padding:12px 20px;
border:none;
border-radius:8px;">

Payer maintenant

</button>

</form>

</div>

@endsection