@extends('layouts.app')

@section('navbar-content')

<div class="max-w-lg w-100 mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Créer un nouveau collaborateur</h1>
    <form action="{{ route('user.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="nom" class="block font-medium">Nom :</label>
            <input type="text" id="nom" name="nom" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="prenom" class="block font-medium">Prenom :</label>
            <input type="text" id="prenom" name="prenom" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="telephone" class="block font-medium">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="cin" class="block font-medium">CIN :</label>
            <input type="text" id="cin" name="cin" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="role" class="block font-medium">Rôle :</label>
            <select id="role" name="role" class="w-full border rounded p-2">
                <option value="Admin" class="text-red-500">Admin</option>
                <option value="Collaborateur" class="text-blue-500">Collaborateur</option>
            </select>
        </div>
        <div>
            <label for="status" class="block font-medium">Status :</label>
            <select id="status" name="status" class="w-full border rounded p-2">
                <option value="Nouveau" class="text-red-500">Nouveau</option>
                <option value="En période de teste" class="text-orange-500">En période de teste</option>
                <option value="En attente de paiement" class="text-green-500">Confirmé</option>
            </select>
        </div>
        <div>
            <label for="email" class="block font-medium">Email :</label>
            <input type="email" id="email" name="email" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="password" class="block font-medium">Mot de passe : (123456789)</label>
            <input type="password" id="password" name="password" class="w-full border rounded p-2" value="123456789" disabled>
        </div>
        <div>
            <label for="equipe" class="block font-medium">Equipe :</label>
            <select id="equipe" class="w-full border rounded p-2" name="equipe">
                @foreach($equipes as $equipe)
                <option value="{{ $equipe->id }}">{{ $equipe->nom }} ({{ count($equipe->utilisateurs)}} collaborateurs)</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Créer le collaborateur</button>
    </form>
</div>

@endsection