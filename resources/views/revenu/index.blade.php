@extends('layouts.app')

@section('navbar-content')

<div class="flex flex-col space-y-8 ">
    
    <!-- Premier tableau -->
    <div class="bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold p-4">Informations Clients</h2>
        <table class="w-full border-collapse text-center">
            <thead>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">Nom</th>
                    <th class="py-2 px-4 bg-gray-100">Prénom</th>
                    <th class="py-2 px-4 bg-gray-100">Adresse Email</th>
                    <th class="py-2 px-4 bg-gray-100">Rôle</th>
                </tr>
            </thead>
            <tbody>
                <!-- Remplace ces lignes avec tes données réelles -->
                <tr class="border-b">
                    <td class="py-2 px-4"> {{ Auth::user()->nom }} </td>
                    <td class="py-2 px-4">{{ Auth::user()->prenom }}</td>
                    <td class="py-2 px-4">{{ Auth::user()->email }}</td>
                    <td class="py-2 px-4" id="roleUser">{{ Auth::user()->role }}</td>
                </tr>
                <!-- ... Ajoute d'autres lignes ici ... -->
            </tbody>
        </table>
    </div>

    <!-- Deuxième tableau -->
    <div class="bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold p-4">Statistiques Financières</h2>
        <table class="w-full border-collapse text-center">
            <thead>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">Nombre de Clients</th>
                    <th class="py-2 px-4 bg-gray-100">Nombre dans l'équipe</th>
                    <th class="py-2 px-4 bg-gray-100">Total d'Argent Généré</th>
                    <th class="py-2 px-4 bg-gray-100" id="TableauTotalPourcentage">Total avec 25%</th>
                    @if(Auth::check() && Auth::user()->role === 'Admin')
                    <th class="py-2 px-4 bg-gray-100">Total Brut</th>
                    <th class="py-2 px-4 bg-gray-100">Total Host</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <!-- Remplace ces lignes avec tes données réelles -->
                <tr class="border-b">
                    <td class="py-2 px-4 text-center">{{ $nombreClient }}</td>
                    <td class="py-2 px-4 text-center" id="nombreEquipeCollaborateurRevenue">{{ count($nombreCollaborateursinEquipe) }}</td>
                    <td class="py-2 px-4 text-center" id="argentTotal" value="{{ $argentTotal }}">{{ $argentTotal }} DH</td>
                    <td class="py-2 px-4 text-center" id="argentPourcentage">0 DH</td>
                    @if(Auth::check() && Auth::user()->role === 'Admin')
                    <td class="py-2 px-4 text-center" id="argentPourcentageBrut">0 DH</td>
                    <td class="py-2 px-4 text-center" id="Totalhebergement">0 DH</td>
                    @endif
                </tr>
                <!-- ... Ajoute d'autres lignes ici ... -->
            </tbody>
        </table>
    </div>
</div>


@endsection