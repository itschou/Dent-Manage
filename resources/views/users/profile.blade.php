@extends('layouts.app')


@section('navbar-content')



<div class="max-w-lg mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Modifier mon profile</h1>
    <form action="{{ route('user.setProfile', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nom" class="block font-medium">Nom complet:</label>
            <input type="text" id="nom" value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" name="nom" class="w-full border rounded p-2" disabled>
        </div>
        <div>
            <label for="prenom" class="block font-medium">Equipe :</label>
            <input type="text" id="prenom" value="{{ $equipe }}" name="prenom" class="w-full border rounded p-2" disabled>
        </div>
        <div>
            <label for="telephone" class="block font-medium">Téléphone :</label>
            <input type="text" id="telephone" value="{{ Auth::user()->telephone }}" name="telephone" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="email" class="block font-medium">Email :</label>
            <input type="email" id="email" value="{{ Auth::user()->email }}" name="email" class="w-full border rounded p-2" disabled>
        </div>
        <div>
            <label for="password" class="block font-medium">Mot de passe :</label>
            <input type="password" id="password" value="{{ Auth::user()->password }}" name="password" class="w-full border rounded p-2" placeholder="Nouveau mot de passe">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Modifier mon profile</button>
        
    </form>

    <br>

    
<div class="overflow-x-auto w-full">
        <table class="w-full table-auto border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Prénom</th>
                    <th class="border p-2">Rôle</th>
                    <th class="border p-2">Numéro de téléphone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($collaboorateurs as $collaboorateur)
                <tr class="hover:bg-gray-100">
                    <td class="border p-2">{{ $collaboorateur->prenom }}</td>
                    <td class="border p-2">{{ $collaboorateur->role }}</td>
                    <td class="border p-2">{{ $collaboorateur->telephone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    


</div>




@endsection