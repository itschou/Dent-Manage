$(document).ready(function () {
    $("#equipeTable").DataTable({
        language: {
            "info": "Affichage de _TOTAL_ résultats",
            "infoFiltered": "(filtré sur un total de _MAX_ résultats au total)",
            "loadingRecords": "Chargement en cours... Veuillez patienter.",
            "search": "Rechercher :",
            "paginate": {
                "next": "Suivant",
                "previous": "Précédent",
            },
        },
        paging: true,
        ordering: false,
        info: true,
        lengthChange: false,
        deferRender: true, // Utilise la fonctionnalité de chargement différé
        ajax: {
            url: "/equipes/getData", // URL vers la méthode getData dans ClientController
            dataSrc: "", // La propriété contenant les données
        },
        columns: [
            { data: "id" },
            { data: "nom" },
            { data: "nombreMembres" },
            { data: "date" },
            {
                data: null,
                render: function(data, type, row) {
                    return '<a href="/equipe/' + row.id + '/edit" class="text-blue-500 hover:underline">Modifier</a>';
                }
            },
            
        ],
    });

    // Charge les données en arrière-plan et les injecte dans DataTables
    function loadDataInBackground() {
        $.ajax({
            url: "/equipes/getData", // URL vers la méthode getData dans ClientController
            method: "GET",
            success: function (data) {
                $("#equipeTable")
                    .DataTable()
                    .clear()
                    .rows.add(data)
                    .draw();
            },
        });
    }

    // Appelle la fonction pour charger les données en arrière-plan
    loadDataInBackground();
});
