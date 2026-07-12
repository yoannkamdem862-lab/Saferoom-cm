@extends('layouts.app')

@section('content')

<div style="max-width:700px;margin:50px auto;padding:30px;background:white;border-radius:12px;box-shadow:0 5px 15px rgba(0,0,0,.2);text-align:center;">

    <h1 style="color:red;">
        ❌ Problème signalé
    </h1>

    <p style="font-size:18px;">
        Votre paiement reste bloqué chez SafeRoom CM.
    </p>

    <div style="background:#f8f9fa;padding:20px;border-radius:10px;">
        <p><strong>Statut :</strong> 🔴 Litige ouvert</p>
        <p><strong>Paiement :</strong> Toujours sécurisé</p>
        <p><strong>Action :</strong> L'administrateur examinera votre dossier avant tout versement au propriétaire.</p>
    </div>

    <br>

    <a href="/listings">
        <button style="background:#0d6efd;color:white;padding:12px 25px;border:none;border-radius:8px;">
            Retour aux annonces
        </button>
    </a>

</div>

@endsection