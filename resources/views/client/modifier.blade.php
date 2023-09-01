@extends('layouts.app')


@section('navbar-content')



<div class="justify-center items-center p-4 md:flex ">
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Modifier un client</h1>
        <form action="{{ route('client.update', $client->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nom" class="block font-medium">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ $client->nom }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label for="adresse" class="block font-medium">Adresse</label>
                <input type="text" name="adresse" id="adresse" value="{{ $client->adresse }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label for="telephone" class="block font-medium">Téléphone</label>
                <input type="tel" name="telephone" id="telephone" value="{{ $client->telephone }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label for="email" class="block font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{ $client->email }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label for="status" class="block font-medium">Status</label>
                <select name="status" id="statusClientCreate" class="w-full border rounded p-2">
                    <option value="Payé" class="text-green-500" {{ $client->status === 'Payé' ? 'selected' : '' }}>Payé</option>
                    <option value="En attente de paiement" class="text-orange-500" {{ $client->status === 'En attente de paiement' ? 'selected' : '' }}>En attente de paiement</option>
                    <option value="Non Payé" class="text-red-500" {{ $client->status === 'Non Payé' ? 'selected' : '' }}>Non Payé</option>
                    <option value="En période de teste" class="text-gray-200" {{ $client->status === 'En période de teste' ? 'selected' : '' }}>En période de teste</option>
                </select>
            </div>


            <div>
                <label for="prix" class="block font-medium">Prix</label>
                <input type="number" id="prixClientCreate" value="{{ $client->prix }}" class="w-full border rounded p-2">
                <input type="hidden" id="prixHidden" name="prix">
            </div>

            <div>
                <label for="abonnement" class="block font-medium">Abonnement</label>
                <select name="abonnement" id="abonnement" class="w-full border rounded p-2">
                    <option value="Mensuel" {{ $client->abonnement === 'Mensuel' ? 'selected' : '' }}>Mensuel</option>
                    <option value="Trimestriel" {{ $client->abonnement === 'Trimestriel' ? 'selected' : '' }}>Trimestriel</option>
                    <option value="Semestriel" {{ $client->abonnement === 'Semestriel' ? 'selected' : '' }}>Semestriel</option>
                    <option value="Annuel" {{ $client->abonnement === 'Annuel' ? 'selected' : '' }}>Annuel</option>
                </select>
            </div>
            <button name="edit" value="editandfacture" type="submit" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600 focus:outline-none focus:ring focus:border-green-300">Mettre à jour et envoyer la facture</button>

            @if(Auth::check() && Auth::user()->role === 'Admin')
            <button name="edit" value="edit" type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Mettre à jour</button> <br><br>
            @endif
            <br>

        </form>
    </div>
    <br>
    <div class=" p-4 md:pl-8">
        @if(Auth::check() && Auth::user()->role === 'Admin')
        <form action="{{ route('client.destroy', $client->id) }}" method="POST" class="w-full">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full bg-red-500 text-white p-2 rounded mb-2 hover:bg-red-600 focus:outline-none focus:ring focus:border-blue-300">Supprimer</button>
        </form>
        @endif
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

</div>



@endsection