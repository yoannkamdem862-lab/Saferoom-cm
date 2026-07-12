@extends('layouts.app')

@section('content')

<h2 style="margin-bottom:20px;">
💬 Gestion des messages
</h2>

<table style="width:100%;background:white;border-collapse:collapse;">

    <tr style="background:#198754;color:white;">
        <th style="padding:12px;">ID</th>
        <th>Expéditeur</th>
        <th>Destinataire</th>
        <th>Annonce</th>
        <th>Message</th>
        <th>Action</th>
    </tr>

@foreach($messages as $message)

<tr style="border-bottom:1px solid #ddd;">

    <td style="padding:10px;">{{ $message->id }}</td>

    <td>{{ $message->sender->name ?? '-' }}</td>

    <td>{{ $message->receiver->name ?? '-' }}</td>

    <td>{{ $message->listing->title ?? '-' }}</td>

    <td>{{ $message->message }}</td>

    <td>

        <form action="{{ route('admin.messages.delete',$message->id) }}" method="POST">

            @csrf
            @method('DELETE')

            <button
                style="background:red;color:white;border:none;padding:8px 15px;border-radius:5px;cursor:pointer;">
                🗑 Supprimer
            </button>

        </form>

    </td>

</tr>

@endforeach

</table>

@endsection