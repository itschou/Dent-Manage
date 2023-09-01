@php
$showNavbar = true;
@endphp

@extends('layouts.app')

@section('navbar-content')

<div class="w-full overflow-x-auto">
    <div class="flex justify-between items-center py-2 px-4 mb-4">
        <h1 class="text-xl font-semibold">Liste des clients</h1>
        <a href="{{ route('client.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Ajouter un client
        </a>
    </div>

    <div class="px-4" id="table-container">


        <table id="clientTable" class="w-full min-w-full divide-y divide-gray-200 table table-striped">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Adresse</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Abonnement</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">équipe</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                

            </tbody>

        </table>
    </div>


</div>







@endsection