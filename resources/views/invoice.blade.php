<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture SafeRoom CM</title>

    <style>
        body{
            font-family: DejaVu Sans, sans-serif;
            margin:40px;
        }

        h1{
            color:#0d6efd;
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:30px;
        }

        table, th, td{
            border:1px solid #000;
        }

        th, td{
            padding:10px;
        }

        .total{
            margin-top:20px;
            text-align:right;
            font-size:18px;
            font-weight:bold;
        }
    </style>

</head>

<body>

<h1>FACTURE SAFEROOM CM</h1>

<p><strong>Client :</strong> {{ $booking->user->name }}</p>

<p><strong>Logement :</strong> {{ $booking->listing->title }}</p>

<p><strong>Ville :</strong> {{ $booking->listing->city }}</p>

<p><strong>Date d'arrivée :</strong> {{ $booking->start_date }}</p>

<p><strong>Date de départ :</strong> {{ $booking->end_date }}</p>

<table>

<tr>
    <th>Désignation</th>
    <th>Montant</th>
</tr>

<tr>
    <td>Réservation du logement</td>
    <td>{{ number_format($booking->listing->price,0,',',' ') }} FCFA</td>
</tr>

</table>

<p class="total">
TOTAL :
{{ number_format($booking->listing->price,0,',',' ') }} FCFA
</p>

<br><br>

<p>Merci d'avoir utilisé SafeRoom CM.</p>

</body>
</html>