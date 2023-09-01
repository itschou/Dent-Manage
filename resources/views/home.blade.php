@extends('layouts.app')
@section('navbar-content')


<div class="bg-gradient-to-r from-teal-500 to-blue-500 text-white p-12 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold mb-4">Bienvenue dans DentAssist</h1>
    <div class="text-lg">
        <p class="mb-2"><span class="font-semibold">Nom:</span> {{ Auth::user()->nom }}</p>
        <p class="mb-2"><span class="font-semibold">Prénom:</span> {{ Auth::user()->prenom }}</p>
        <p class="mb-2"><span class="font-semibold">Rôle:</span> {{ Auth::user()->role }}</p>
    </div>
</div>





@endsection
