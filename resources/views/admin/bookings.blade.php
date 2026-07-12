@extends('layouts.app')

@section('content')

<div class="container">

    <h2 style="margin-bottom:25px;">
        📅 Gestion des réservations
    </h2>

    @if(session('success'))
        <div style="background:#d4edda;color:#155724;padding:15px;border-radius:8px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width:100%;border-collapse:collapse;background:white;box-shadow:0 5px 15px rgba(0,0,0,.1);">

        <thead style="background:#0d6efd;color:white;">

        <tr>
            <th style="padding:15px;">ID</th>
            <th>Client</th>
            <th>Annonce</th>
            <th>Date d'arrivée</th>
            <th>Date de départ</th>
            <th>Action</th>
        </tr>

        </thead>

        <tbody>

        @foreach($bookings as $booking)

        <tr style="text-align:center;border-bottom:1px solid #ddd;">

            <td>{{ $booking->id }}</td>

            <td>{{ $booking->user->name ?? 'Inconnu' }}</td>

            <td>{{ $booking->listing->title ?? 'Annonce supprimée' }}</td>

            <td>{{ $booking->start_date }}</td>

            <td>{{ $booking->end_date }}</td>

            <td>

                <form action="{{ route('admin.bookings.delete',$booking->id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Supprimer cette réservation ?')"
                        style="background:red;color:white;border:none;padding:8px 15px;border-radius:6px;cursor:pointer;">

                        🗑 Supprimer

                    </button>

                </form>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection