@extends('layouts.app')


@section('navbar-content')



<div class="max-w-lg w-100 mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Modifier un collaborateur</h1>
    <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nom" class="block font-medium">Nom :</label>
            <input type="text" id="nom" value="{{ $user->nom }}" name="nom" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="prenom" class="block font-medium">Prenom :</label>
            <input type="text" id="prenom" value="{{ $user->prenom }}" name="prenom" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="telephone" class="block font-medium">Téléphone :</label>
            <input type="text" id="telephone" value="{{ $user->telephone }}" name="telephone" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="cin" class="block font-medium">CIN :</label>
            <input type="text" id="cin" value="{{ $user->cin }}" name="cin" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="role" class="block font-medium">Rôle :</label>
            <select id="role" value="{{ $user->role }}" name="role" class="w-full border rounded p-2">
                <option value="Admin" class="text-red-500" @if($user->role === "Admin") selected @endif>Admin</option>
                <option value="Collaborateur" class="text-red-500" @if($user->role === "Collaborateur") selected @endif>Collaborateur</option>
                <!-- <option value="Admin" class="text-red-500">Admin</option>
                <option value="Collaborateur" class="text-blue-500">Collaborateur</option> -->
            </select>
        </div>
        <div>
            <label for="status" class="block font-medium">Status :</label>
            <select id="status" name="status" class="w-full border rounded p-2" value="{{ $user->status }}">
                <option value="Nouveau" class="text-red-500" @if($user->status === "Nouveau") selected @endif>Nouveau</option>
                <option value="En période de teste" class="text-orange-500" @if($user->status === "En période de teste") selected @endif>En période de teste</option>
                <option value="Confirmé" class="text-green-500" @if($user->status === "Confirmé") selected @endif>Confirmé</option>
            </select>
        </div>
        <div>
            <label for="email" class="block font-medium">Email :</label>
            <input type="email" id="email" value="{{ $user->email }}" name="email" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="password" class="block font-medium">Mot de passe : (123456789)</label>
            <input type="password" id="password" name="password" class="w-full border rounded p-2" value="{{ $user->password }}">
        </div>
        <div>
            <label for="equipe" class="block font-medium">Equipe :</label>
            <select id="equipe" class="w-full border rounded p-2" value="{{ $currentEquipe }}" name="equipe">
                @foreach($equipes as $equipe)
                <option value="{{$equipe->id}}" @if($equipe->id == $currentEquipe) selected @endif>{{ $equipe->nom }} ({{ count($equipe->utilisateurs)}} collaborateurs)</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Mettre à jour</button>
        <br>
    </form>
    <br>
    @if(Auth::check() && Auth::user()->role === 'Admin')
    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="w-full">
        @csrf
        @method('DELETE')
        <button type="submit" class="w-full bg-red-500 text-white p-2 rounded mb-2 hover:bg-red-600 focus:outline-none focus:ring focus:border-blue-300">Supprimer</button>
    </form>
    @endif

</div>



@endsection