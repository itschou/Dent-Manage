$(document).ready(function () {
    $("#historiqueTable").DataTable({
        language: {
            "info": "Affichage de _TOTAL_ résultats",
            "emptyTable": "Aucune transaction n'a été faite",
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
            url: "/historiques/getData", // URL vers la méthode getData dans ClientController
            dataSrc: "", // La propriété contenant les données
        },
        columns: [
            { data: "id" },
            { data: "date" },
            { data: "equipe" },
            { data: "collaborateur" },
            { data: "clients" },
            { data: "prix" },
            { data: "status" },
            
        ],
    });

    // Charge les données en arrière-plan et les injecte dans DataTables
    function loadDataInBackground() {
        $.ajax({
            url: "/historiques/getData", // URL vers la méthode getData dans ClientController
            method: "GET",
            success: function (data) {
                $("#historiqueTable")
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
