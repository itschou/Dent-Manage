<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}">

    @notifyCss
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/main.js', 'resources/js/tableaux/clientsTable.js', 'resources/js/tableaux/usersTable.js', 'resources/js/tableaux/equipesTable.js', 'resources/js/tableaux/HistoriqueTable.js'])

</head>

<body>

    <div id="app" class="min-h-screen flex flex-col ">

        @if(Auth::check())

        <x-navbar />
        @endif

        <main class="w-screen">
            @yield('content')
        </main>


    </div>
    <div class="fixed top-25 left-40 h-50 z-50">
        <x-notify::notify />
    </div>

    @notifyJs
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.js"></script>
</body>


</html>