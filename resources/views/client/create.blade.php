@extends('layouts.app')

@section('navbar-content')


<div class="flex justify-center items-center h-screen">
    <div class="w-1/2 p-4">
        <h1 class="text-2xl font-semibold mb-4">Créer un nouveau client</h1>
        <form action="{{ route('client.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nom" class="block font-medium">Nom :</label>
                <input type="text" id="nom" name="nom" class="w-full border rounded p-2">
            </div>
            <div>
                <label for="adresse" class="block font-medium">Adresse :</label>
                <input type="text" id="adresse" name="adresse" class="w-full border rounded p-2">
            </div>
            <div>
                <label for="telephone" class="block font-medium">Téléphone :</label>
                <input type="text" id="telephone" name="telephone" class="w-full border rounded p-2">
            </div>
            <div>
                <label for="email" class="block font-medium">Email :</label>
                <input type="email" id="email" name="email" class="w-full border rounded p-2">
            </div>
            <div>
                <label for="status" class="block font-medium">Statut :</label>
                <select id="statusClientCreate" name="status" class="w-full border rounded p-2">
                    <option value="En période de teste">En période de teste</option>
                    <option value="En attente de paiement">En attente de paiement</option>
                    <option value="Non Payé">Non Payé</option>
                </select>
            </div>
            <div>
                <label for="abonnement" class="block font-medium">Abonnement :</label>
                <select id="abonnement" name="abonnement" class="w-full border rounded p-2">
                    <option value="Mensuel">Mensuel</option>
                    <option value="Trimestriel">Trimestriel</option>
                    <option value="Semestriel">Semestriel</option>
                    <option value="Annuel">Annuel</option>
                </select>
            </div>
            <div>
                <label for="prix" class="block font-medium">Prix :</label>
                <input type="text" id="prixClientCreate" class="w-full border rounded p-2">
                <input type="hidden" id="prixHidden" name="prix">
            </div>






            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Créer le client</button>
        </form>
    </div>
    <div class=" mx-auto p-6">
        <div>
            <label for="prix" class="block font-medium">Simulation de prix</label>
            <input type="number" id="prixClientShow" class="w-full border rounded p-2">
        </div><br>
        <table class="w-full border rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-8 font-medium text-gray-600">Durée</th>
                    <th class="border p-8 font-medium text-gray-600">Prix Normal</th>
                    <th class="border p-8 font-medium text-gray-600">Prix avec réduction</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white">
                    <td class="border p-4">1 mois</td>
                    <td class="border p-4 text-red-400" id="prixMensuel">0 DH</td>
                    <td class="border p-4 text-green-600" id="prixMensuelReduc">0 DH</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border p-4">3 mois</td>
                    <td class="border p-4 text-red-400" id="prixTrimestriel">0 DH</td>
                    <td class="border p-4 text-green-600" id="prixTrimestrielReduc">0 DH</td>
                </tr>
                <tr class="bg-white">
                    <td class="border p-4">6 mois</td>
                    <td class="border p-4 text-red-400" id="prixSemestriel">0 DH</td>
                    <td class="border p-4 text-green-600" id="prixSemestrielReduc">0 DH</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border p-4">12 mois</td>
                    <td class="border p-4 text-red-400" id="prixAnnuel">0 DH</td>
                    <td class="border p-4 text-green-600" id="prixAnnuelReduc">0 DH</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection