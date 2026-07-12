<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeRoom CM</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('css/saferoom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body style="margin:0;font-family:Arial, Helvetica, sans-serif;background:#f5f5f5;">

<nav class="navbar">
<div class="logo">
    <a href="/listings">
        <img src="{{ asset('images/logo.png') }}" class="nav-logo">
        <span>SafeRoom CM</span>
    </a>
</div>

    <div class="menu">
        <a href="/listings">Annonces</a>
        <a href="/listings/create">Publier</a>
        <a href="/bookings">Réservations</a>
        <a href="/my-listings">Mes annonces</a>
        <a href="/messages">💬 Messages</a>
        <a href="/profile">👤 Mon profil</a>
        @auth
    @if(auth()->user()->role == 'admin')
        <a href="{{ url('/admin') }}">🛠 Administration</a>
    @endif
@endauth
<form method="POST" action="{{ route('logout') }}" style="display:inline;">
    @csrf
    <button type="submit" style="background:none;border:none;color:white;cursor:pointer;font-size:16px;">
        🚪 Déconnexion
    </button>
</form>
    </div>

</nav>
<div style="padding:30px;">
    @isset($slot)
        {{ $slot }}
    @else
        @yield('content')
    @endisset
</div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<footer class="footer">

    <div class="footer-container">

        <div class="footer-section">
<h3>
    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width:28px;height:28px;vertical-align:middle;margin-right:8px;">
    SafeRoom CM
</h3>
            <p>
                Plateforme de réservation d'appartements meublés,
                hôtels, studios et salles de fête partout au Cameroun.
            </p>

        </div>

        <div class="footer-section">

            <h4>Navigation</h4>

            <a href="/">🏠 Accueil</a><br>
            <a href="/listings">📋 Annonces</a><br>
            <a href="/listings/create">➕ Publier une annonce</a><br>
            <a href="/bookings">📅 Réservations</a>

        </div>

        <div class="footer-section">

            <h4>Contact</h4>

            <p>📧 contact@saferoom.cm</p>
            <p>📞 +237 6 XX XX XX XX</p>
            <p>📍 Yaoundé, Cameroun</p>
            <h4 style="margin-top:20px;">Suivez-nous</h4>

<div style="margin-top:10px;">
    <a href="#" style="color:white;font-size:24px;margin-right:15px;">
        <i class="fab fa-facebook"></i>
    </a>

    <a href="#" style="color:white;font-size:24px;margin-right:15px;">
        <i class="fab fa-instagram"></i>
    </a>

    <a href="https://wa.me/237693218744" style="color:white;font-size:24px;margin-right:15px;">
        <i class="fab fa-whatsapp"></i>
    </a>

    <a href="mailto:yoannkamdem862@gmail.com" style="color:white;font-size:24px;">
        <i class="fas fa-envelope"></i>
    </a>
</div>

        </div>

        <div class="footer-section">

            <h4>Développeur</h4>

            <p>👨‍💻 Yoann Kamdem</p>

            <p>💻 Licence GLDB - IUSTE</p>

            <p>📞 +237 693218744</p>

            <p>📧 Yoannkamdem862@gmail.com</p>

        </div>

    </div>

    <hr>

    <p class="copyright">

        © 2026 SafeRoom CM | Tous droits réservés.

        <br><br>

        Développé  par <strong>Yoann Kamdem</strong>

    </p>

</footer>
</body>
</html>
