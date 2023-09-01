@extends('layouts.app')


@section('navbar-content')

<div class="flex items-center justify-center h-screen w-full">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-screen-xl w-full mx-4">
            <h1 class="text-2xl font-semibold mb-4">Création de l'équipe</h1>

            <form action="{{ route('equipe.store') }}" method="POST" class="mb-6">
                @csrf

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Nom de l'équipe</label>
                    <input type="text" name="nom" class="w-full border rounded px-3 py-2">
                </div>

                <!-- Ajoutez d'autres champs de formulaire ici si nécessaire -->

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Créer l'équipe</button>
            </form>

        </div>
    </div>

@endsection