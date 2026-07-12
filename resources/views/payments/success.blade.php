@extends('layouts.app')

@section('content')

<div style="max-width:700px;margin:50px auto;padding:30px;background:white;border-radius:12px;box-shadow:0 5px 15px rgba(0,0,0,.2);text-align:center;">

    <h1 style="color:green;">
        ✅ Paiement effectué avec succès
    </h1>

    <h3>Votre paiement est sécurisé par SafeRoom CM.</h3>

    <p style="font-size:18px;">
        Votre argent est conservé par SafeRoom CM jusqu'à ce que vous confirmiez que le logement est conforme à l'annonce.
    </p>

    <div style="background:#f8f9fa;padding:20px;border-radius:10px;margin-top:20px;">
        <p><strong>Statut :</strong> 🟡 Paiement sécurisé - En attente de confirmation</p>
        <p><strong>Protection :</strong> Anti-arnaque activée</p>
        <p><strong>Versement :</strong> Les fonds ne seront libérés au propriétaire qu'après votre validation.</p>
    </div>
    <hr style="margin:30px 0;">

<h3>Suivi du paiement</h3>

<div style="text-align:left;font-size:18px;line-height:2;">
    ✅ Réservation créée<br>
    ✅ Paiement effectué<br>
    🟡 En attente de votre confirmation<br>
    ⚪ Fonds non encore transférés au propriétaire
</div>

    <br>

    <form method="POST" action="/payments/1/confirm">
        @csrf

        <button
            style="background:green;color:white;padding:12px 25px;border:none;border-radius:8px;margin:10px;">
            ✅ Le logement est conforme
        </button>
    </form>
    <br><br>

<a href="/invoice/{{ $booking->id }}"
class="btn btn-primary">

📄 Télécharger la facture PDF

</a>

    <form method="POST" action="/payments/1/problem">
        @csrf

        <button
            style="background:red;color:white;padding:12px 25px;border:none;border-radius:8px;margin:10px;">
            ❌ Signaler un problème
        </button>
    </form>

    <br>
    <hr>

<h3>👤 Coordonnées du propriétaire</h3>

<div style="background:#f8f9fa;padding:20px;border-radius:10px;margin-top:20px;">

    <p><strong>Nom :</strong> Yoann Kamdem</p>

    <p><strong>Téléphone :</strong> +237 693218744</p>

    <p><strong>Email :</strong> Yoannkamdem862@gmail.com</p>

    <p style="color:green;">
        ✅ Propriétaire vérifié par SafeRoom CM
    </p>

</div>

    <a href="/listings">
        <button
            style="background:#0d6efd;color:white;padding:12px 25px;border:none;border-radius:8px;">
            Retour aux annonces
        </button>
    </a>

</div>

@endsection