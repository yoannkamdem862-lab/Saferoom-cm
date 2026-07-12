@extends('layouts.app')

@section('content')

<div class="container">

    <h2 style="margin-bottom:25px;">
        👥 Gestion des utilisateurs
    </h2>

    @if(session('success'))
        <div style="background:#d4edda;color:#155724;padding:15px;border-radius:8px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width:100%;background:white;border-collapse:collapse;box-shadow:0 5px 15px rgba(0,0,0,.1);">

        <thead style="background:#0d6efd;color:white;">

        <tr>
            <th style="padding:15px;">ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Rôle</th>
            <th>Action</th>
        </tr>

        </thead>

        <tbody>

        @foreach($users as $user)

        <tr style="text-align:center;border-bottom:1px solid #ddd;">

            <td>{{ $user->id }}</td>

            <td>{{ $user->name }}</td>

            <td>{{ $user->email }}</td>

            <td>{{ $user->phone }}</td>

            <td>{{ $user->role }}</td>

            <td>

                @if($user->role != 'admin')

                <form action="{{ route('admin.users.delete',$user->id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button
                    onclick="return confirm('Supprimer cet utilisateur ?')"
                    style="background:red;color:white;border:none;padding:8px 15px;border-radius:6px;cursor:pointer;">

                        🗑 Supprimer

                    </button>

                </form>

                @else

                    <span style="color:green;font-weight:bold;">
                        Administrateur
                    </span>

                @endif

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection