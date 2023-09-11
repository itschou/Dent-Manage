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

    <style>
        .head-title {
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .add-detail {
            margin-top: 10px;
        }

        .w-50 {
            width: 50%;
        }

        .float-left {
            float: left;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .text-bold {
            font-weight: bold;
        }

        .gray-color {
            color: gray;
        }

        .logo img {
            max-width: 100%;
            height: auto;
        }

        .clear {
            clear: both;
        }

        .bill-tbl {
            margin-top: 10px;
        }

        .table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        .box-text {
            margin: 0;
            padding: 0;
        }

        .total-part {
            margin-top: 10px;
        }

        .total-left {
            width: 85%;
            float: left;
            text-align: right;
        }

        .total-right {
            width: 15%;
            float: left;
            text-align: right;
            font-weight: bold;
        }

        .auto-entrepreneur-info {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ccc;
        }

        .auto-entrepreneur-info p {
            margin: 0;
            padding: 5px 0;
        }

        .auto-entrepreneur-info p:first-child {
            font-weight: bold;
        }
    </style>

</head>

<body>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">DentAssist - Facture</h1>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Numéro de facture - <span class="gray-color">#{{ $client->SKU }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Date de facture - <span class="gray-color">{{ Carbon::now() }}</span></p>
        </div>
        <div class="w-50 float-left logo mt-10">
            <img src="{{ asset('images/logo-rond.png') }}" alt="Logo" width="120px">
        </div>
        <div class="clear"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">De</th>
                <th class="w-50">à</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <p>DentAssist,</p>
                        <p>6 Rue Khorasanne Rabat L'océan,</p>
                        <p>Maroc</p>
                        <p>Contact: (+212) 6 66 27 79 21</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        <p>{{ $client->nom }},</p>
                        <p>{{ $client->adresse }},</p>
                        <p>Maroc</p>
                        <p>Contact: {{ $client->telephone }}</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Mode de paiement</th>
                <th class="w-50">Mode d'expédition</th>
            </tr>
            <tr>
                <td>{{ $client->paiement }}</td>
                <td>En ligne</td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">SKU</th>
                <th class="w-50">Produit</th>
                <th class="w-50">Prix</th>
                <th class="w-50">Quantité</th>
                <th class="w-50">Total</th>
                <th class="w-50">Statut</th>
                <!-- <th class="w-50">Grand Total</th> -->
            </tr>
            <tr align="center">
                <td>{{ $client->SKU }}</td>
                <td>Abonnement {{ $client->abonnement }} à DentAssist</td>
                <td>{{ $client->prix }} DH</td>
                <td>1</td>
                <td>{{ $client->prix }} DH</td>
                <td>{{ $client->status }}</td>
                <!-- <td>$1550.20</td> -->
            </tr>
            <tr>
                <td colspan="7">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Total</p>
                            <!-- <p>Tax (18%)</p> -->
                            <!-- <p>Total Payable</p> -->
                        </div>
                        <div class="total-right w-15 float-left text-bold" align="right">
                            <p>{{ $client->prix }} DH</p>
                            <!-- <p>$400</p>
            <p>$8000.00</p> -->
                        </div>
                        <div class="clear"></div>
                    </div>
                    <!-- Ajoute tes informations ici -->
                    <div class="auto-entrepreneur-info">
                        <p>Auto Entrepreneur: Afiri Mohammed Chouaib</p>
                        <p>CNIE: AL442</p>
                        <p>Adresse: 6 Rue Khorasanne, Rabat L'océan</p>
                        <p>ICE (N° d'inscription au registre national de l'auto-entrepreneur): **</p>
                        <p>IF: **</p>
                        <p>Taxe professionnelle N°: **</p>
                        <p>Téléphone: (+212) 6 66 27 79 21</p>
                        <p>Mail: chouaib.afiri1@gmail.com</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>


</html>