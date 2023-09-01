$(document).ready(function () {
    $("#userTable").DataTable({
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
            url: "/users/getData", // URL vers la méthode getData dans ClientController
            dataSrc: "", // La propriété contenant les données
        },
        columns: [
            { data: "nom" },
            { data: "prenom" },
            { data: "telephone" },
            { data: "cin" },
            { data: "email" },
            { data: "role" },
            {
                data: "status",
                render: function (data, type, row) {
                    return (
                        '<div class="flex flex-col items-center">' +
                        '<span class="inline-flex px-2 w-auto h-auto text-xs font-semibold rounded-full ' +
                        row.statusClass  +
                        '">' +
                        data +
                        "</span>"
                    );
                },
            },
            { data: "date" },
            { data: "equipe" },
            {
                data: null,
                render: function(data, type, row) {
                    return '<a href="/user/' + row.id + '/edit" class="text-blue-500 hover:underline">Modifier</a>';
                }
            },
            
        ],
    });

    // Charge les données en arrière-plan et les injecte dans DataTables
    function loadDataInBackground() {
        $.ajax({
            url: "/users/getData", // URL vers la méthode getData dans ClientController
            method: "GET",
            success: function (data) {
                $("#userTable")
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
