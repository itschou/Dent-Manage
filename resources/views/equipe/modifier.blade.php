@extends('layouts.app')


@section('navbar-content')

<div class="flex items-center justify-center h-screen w-full">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-screen-xl w-full mx-4">
            <h1 class="text-2xl font-semibold mb-4">Modification de l'équipe</h1>

            <form action="{{ route('equipe.update', $equipe->id) }}" method="POST" class="mb-6">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Nom de l'équipe</label>
                    <input type="text" name="nom" value="{{ $equipe->nom }}" class="w-full border rounded px-3 py-2">
                </div>

                <!-- Ajoutez d'autres champs de formulaire ici si nécessaire -->

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Mettre à jour</button>
            </form>

            <h2 class="text-xl font-semibold mb-4">Membres de l'équipe</h2>
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nom</th>
                            <th class="px-4 py-2">Prénom</th>
                            <th class="px-4 py-2">Téléphone</th>
                            <th class="px-4 py-2">Rôle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipe->utilisateurs as $collaborateur)
                            <tr>
                                <td class="border px-4 py-2">{{ $collaborateur->nom }}</td>
                                <td class="border px-4 py-2">{{ $collaborateur->prenom }}</td>
                                <td class="border px-4 py-2">{{ $collaborateur->telephone }}</td>
                                <td class="border px-4 py-2">{{ $collaborateur->role }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection