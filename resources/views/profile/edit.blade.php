<x-app-layout>

<div class="container" style="max-width:800px;margin:auto;">

    <div class="card" style="padding:30px;background:white;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,.1);">

        <div class="bg-white shadow-lg rounded-3xl p-6 mb-6 border">

    <div class="text-center">

        <div style="font-size:70px;">
            👤
        </div>

        <h2 style="font-size:28px;font-weight:bold;color:#2563eb;">
            {{ Auth::user()->name }}
        </h2>

        <p style="color:gray;">
            Utilisateur SafeRoom CM
        </p>

    </div>

    <hr style="margin:20px 0;">

    <div style="font-size:18px;line-height:35px;">

        <p>📧 <strong>Email :</strong> {{ Auth::user()->email }}</p>

        <p>📞 <strong>Téléphone :</strong> {{ Auth::user()->phone }}</p>

    </div>

</div>
        <br>

        @include('profile.partials.update-profile-information-form')

        <br>

        @include('profile.partials.update-password-form')

        <br>

    </div>

</div>

</x-app-layout>