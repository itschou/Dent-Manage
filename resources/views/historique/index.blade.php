@extends('layouts.app')

@section('navbar-content')


<div class="overflow-x-auto">
    <div class="flex justify-between items-center py-2 px-4 mb-4">
        <h1 class="text-xl font-semibold">Historique de vente</h1>
    </div>
    
    <table id="historiqueTable" class="min-w-full border border-gray-300 text-center">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2 text-center">Identifiant</th>
                <th class="border p-2 text-center">Date</th>
                <th class="border p-2 text-center">Equipe</th>
                <th class="border p-2 text-center">Collaborateur</th>
                <th class="border p-2 text-center">Client</th>
                <th class="border p-2 text-center">Prix</th>
                <th class="border p-2 text-center">Status</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection