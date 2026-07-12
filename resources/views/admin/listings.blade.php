@extends('layouts.app')

@section('content')

<div class="container">

    <h2 style="margin-bottom:25px;">
        🏠 Gestion des annonces
    </h2>

    @if(session('success'))
        <div style="background:#d4edda;color:#155724;padding:15px;border-radius:8px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width:100%;border-collapse:collapse;background:white;box-shadow:0 5px 15px rgba(0,0,0,.1);">

        <thead style="background:#0d6efd;color:white;">

            <tr>
                <th style="padding:15px;">Image</th>
                <th>Titre</th>
                <th>Ville</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Propriétaire</th>
                <th>Action</th>
            </tr>

        </thead>

        <tbody>

        @foreach($listings as $listing)

        <tr style="text-align:center;border-bottom:1px solid #ddd;">

            <td style="padding:10px;">

                @if($listing->image)
                    <img src="{{ asset('images/'.$listing->image) }}"
                         width="80"
                         style="border-radius:8px;">
                @endif

            </td>

            <td>{{ $listing->title }}</td>

            <td>{{ $listing->city }}</td>

            <td>{{ $listing->type }}</td>

            <td>{{ number_format($listing->price) }} FCFA</td>

            <td>{{ $listing->user->name ?? 'Inconnu' }}</td>

            <td>

                <form action="{{ route('admin.listings.delete',$listing->id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Supprimer cette annonce ?')"
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