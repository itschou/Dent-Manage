@php
use Carbon\Carbon;
use App\Models\User;
$pdgTelephone = User::where('nom', 'Afiri')->first();
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @notifyCss

</head>

<body>
    <div style="background-color: #f3f4f6; padding: 20px;">
        <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 20px;">
            <p style="font-size: 18px; font-weight: bold; color: #333;">Bonjour {{ $prenom }} {{ $nom }},</p>
            <p style="color: #555;">Bienvenue parmi nous sur DentAssist. Voici vos informations d'identification :</p>

            <ul style="margin-top: 10px;">
                <li style="margin-bottom: 5px;"><strong style="color: #333;">Email:</strong> {{ $email }}</li>
                <li style="margin-bottom: 5px;"><strong style="color: #333;">Mot de passe:</strong> 123456789 (Merci de modifier votre mot de passe dans votre compte.)</li>
                <li></li>
                <li style="margin-bottom: 5px;"><strong style="color: #333;">Votre statut:</strong> {{ $status }}</li>

            </ul>

            <p style="margin-top: 10px; color: #555;">Assurez-vous de garder ces informations en sécurité. Vous pouvez maintenant vous connecter à notre site en utilisant votre email et votre mot de passe.</p>

            <p style="margin-top: 10px; font-weight: bold; color: #333;">Cordialement,</p>
            <p style="color: #333;">Administration DentAssist</p>
        </div>
    </div>

</body>


</html>