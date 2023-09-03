@extends('layouts.app')

@section('navbar-content')

<div class="flex justify-center items-center pt-52">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-2xl mx-4">
        <form action="{{ route('hebergement.update', $hebergementget->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table class="w-full mb-4">
                <tr>
                    <td class="px-2 py-1">Prix mensuel</td>
                    <td class="px-2 py-1">Prix trimestriel</td>
                    <td class="px-2 py-1">Prix semestriel</td>
                    <td class="px-2 py-1">Prix annuel</td>
                </tr>
                <tr>
                    <td class="px-2 py-1"><input type="text" class="w-full border p-1" name="prixMensuel" value="{{$hebergementget->prixMensuel}}"></td>
                    <td class="px-2 py-1"><input type="text" class="w-full border p-1" name="prixTrimestriel" value="{{$hebergementget->prixTrimestriel}}"></td>
                    <td class="px-2 py-1"><input type="text" class="w-full border p-1" name="prixSemestriel" value="{{$hebergementget->prixSemestriel}}"></td>
                    <td class="px-2 py-1"><input type="text" class="w-full border p-1" name="prixAnnuel" value="{{$hebergementget->prixAnnuel}}"></td>
                </tr>
            </table>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 w-full">Mettre à jour</button>
        </form>
    </div>
</div>



@endsection