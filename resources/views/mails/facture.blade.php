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
    <div class="px-5 py-5 bg-white shadow-lg p-8 rounded-lg border border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo de la marque" class="w-10 h-10 object-contain">
        </div>
        <h2 class="text-2xl font-semibold mb-4 text-center">Facture d'Abonnement DentAssist</h2>
        <p class="mb-4">Cher(e) {{ $client->nom }},</p>
        <p class="mb-4">Nous vous remercions chaleureusement pour la confiance que vous accordez à nos services. Votre confiance est notre moteur pour continuer à vous offrir le meilleur en toutes circonstances.</p>
        <p class="mb-4">Sans plus attendre, voici votre facture :</p>
        <div class="border-t border-gray-300 py-2"></div>
        <div class="bg-white shadow-lg rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="text-gray-600">
                        <td class="py-2 pr-4">Type d'Abonnement :</td>
                        <td class="py-2 font-semibold">{{ $client->abonnement }}</td>
                    </tr>
                    <tr class="text-gray-600">
                        <td class="py-2 pr-4">Prix :</td>
                        <td class="py-2 font-semibold">{{ $client->prix }} DH</td>
                    </tr>
                    <tr class="text-gray-600">
                        <td class="py-2 pr-4">Statut :</td>
                        <td class="py-2 font-semibold">{{ $client->status }}</td>
                    </tr>
                    <tr class="text-gray-600">
                        <td class="py-2 pr-4">Date :</td>
                        <td class="py-2 font-semibold">{{ Carbon::now() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="border-t border-gray-300 py-2"></div>
        <div class="border-t border-gray-300 py-2"></div>



        <p class="mt-6 text-sm text-gray-500 text-center">Veuillez noter que ce mail est à titre informatif uniquement et qu'il n'est pas nécessaire d'y répondre.</p>
        <p class="mt-4">Cordialement,</p>
        <p class="font-semibold">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</p>
        <p class="font-semibold">Contact : {{ $pdgTelephone->telephone }}</p>
    </div>

</body>


</html>