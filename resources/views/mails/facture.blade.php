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
    <div style="padding: 20px; background-color: #ffffff; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0; border-radius: 8px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo de la marque" style="width: 40px; height: 40px; object-fit: contain;">
        </div>
        <h2 style="font-size: 24px; font-weight: bold; text-align: center; margin-bottom: 20px;">Facture d'Abonnement DentAssist</h2>
        <p style="margin-bottom: 20px;">Cher(e) {{ $client->nom }},</p>
        <p style="margin-bottom: 20px;">Nous vous remercions chaleureusement pour la confiance que vous accordez à nos services. Votre confiance est notre moteur pour continuer à vous offrir le meilleur en toutes circonstances.</p>
        <p style="margin-bottom: 20px;">Sans plus attendre, voici votre facture :</p>
        <div style="border-top: 1px solid #e2e8f0; padding-top: 10px;"></div>
        <div style="background-color: #ffffff; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0; border-radius: 8px; margin-top: 20px;">
            <table style="width: 100%; border-collapse: collapse;">
                <tbody>
                    <tr style="color: #718096;">
                        <td style="padding: 10px; border-bottom: 1px solid #e2e8f0;">Type d'Abonnement :</td>
                        <td style="padding: 10px; font-weight: bold; border-bottom: 1px solid #e2e8f0;">{{ $client->abonnement }}</td>
                    </tr>
                    <tr style="color: #718096;">
                        <td style="padding: 10px; border-bottom: 1px solid #e2e8f0;">Prix :</td>
                        <td style="padding: 10px; font-weight: bold; border-bottom: 1px solid #e2e8f0;">{{ $client->prix }} DH</td>
                    </tr>
                    <tr style="color: #718096;">
                        <td style="padding: 10px; border-bottom: 1px solid #e2e8f0;">Statut :</td>
                        <td style="padding: 10px; font-weight: bold; border-bottom: 1px solid #e2e8f0;">{{ $client->status }}</td>
                    </tr>
                    <tr style="color: #718096;">
                        <td style="padding: 10px; border-bottom: 1px solid #e2e8f0;">Date :</td>
                        <td style="padding: 10px; font-weight: bold; border-bottom: 1px solid #e2e8f0;">{{ Carbon::now() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="border-top: 1px solid #e2e8f0; padding-top: 10px;"></div>
        <div style="border-top: 1px solid #e2e8f0; padding-top: 10px;"></div>

        <p style="margin-top: 20px; font-size: 14px; color: #718096; text-align: center;">Veuillez noter que ce mail est à titre informatif uniquement et qu'il n'est pas nécessaire d'y répondre.</p>
        <p style="margin-top: 20px;">Cordialement,</p>
        <p style="font-weight: bold;">L'équipe DentAssist</p>
        <p style="font-weight: bold;">Si vous avez une question ou une demande, voici notre numéro de support : 0666277921</p>
    </div>

</body>


</html>