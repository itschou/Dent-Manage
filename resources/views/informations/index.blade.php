@extends('layouts.app')

@section('navbar-content')

<div class="bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-lg shadow-lg p-4 text-center justify-center items-center">
    <h1 class="text-3xl font-semibold mb-6">Informations</h1>

    <!-- Section "Télécharger le module de formation" -->
    <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2">Module de formation</h2>
        <button id="downloadButton" class="bg-white text-blue-500 hover:text-blue-700 px-4 py-2 rounded focus:outline-none">Ouvrir le PDF</button>
    </section>

    <!-- Section "DentAssist présentation" (vidéo YouTube) -->
    <div class="flex items-center justify-center">
    <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2">DentAssist présentation</h2>
        <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/wkf1ePnSrZs?si=sfENEKYq5CFpyJKd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </section>
</div>


    <!-- Section "Système de monétisation" -->
    <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2">Système de monétisation</h2>
        <p>Chaque équipe est composée de deux membres, ce qui signifie que pour chaque client que vous avez, vous et votre partenaire gagnez chacun 25% du montant qu'il paie chaque mois.</p>
    </section>

    <!-- Section "Contact" -->
    <section>
        <h2 class="text-xl font-semibold mb-2">Contact</h2>
        <ul>
            <li>
                <strong>Téléphone :</strong> 0666277921
            </li>
            <li>
                <strong>Email :</strong> --
            </li>
        </ul>
    </section>
    
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // JavaScript/jQuery pour la gestion du bouton de téléchargement
    $(document).ready(function() {
        $("#downloadButton").click(function() {
            // Ici, tu peux ajouter le code pour déclencher le téléchargement du PDF lorsque le bouton est cliqué.
            // Par exemple, ouvrir une nouvelle fenêtre avec le lien vers le PDF.
            window.open('{{ asset("pdfs/formation.pdf") }}', '_blank');
        });
    });
</script>


@endsection