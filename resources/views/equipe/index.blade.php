@extends('layouts.app')

@section('navbar-content')

<div class="overflow-x-auto">
    <div class="flex justify-between items-center py-2 px-4 mb-4">
        <h1 class="text-xl font-semibold">Liste des équipes</h1>
        <a href="{{ route('equipe.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Ajouter une equipe
        </a>
    </div>
    <table id="equipeTable" class="min-w-full border border-gray-300 text-center">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2 text-center">Identifiant</th>
                <th class="border p-2 text-center">Nom</th>
                <th class="border p-2 text-center">Nombre de membres</th>
                <th class="border p-2 text-center">Date de création</th>
                <th class="border p-2 text-center">Modifier</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


@endsection