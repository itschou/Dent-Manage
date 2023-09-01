<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur DentAssist</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-screen-xl w-full mx-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo DentAssist" class="mx-auto mb-4 h-16">
        <p class="text-center text-gray-600">Bienvenue !</p>
        <p class="text-center text-gray-600">
            Tu n'as pas encore accès au système DentAssist - Gestion.
            Tu devras attendre d'être confirmé ou en période de test pour accéder à l'outil.
        </p>
        <div class="mt-4 flex items-center justify-center">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/wkf1ePnSrZs?si=sfENEKYq5CFpyJKd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="mt-6 flex justify-center">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">Déconnexion</button>
            </form>
        </div>
    </div>
</body>


</html>