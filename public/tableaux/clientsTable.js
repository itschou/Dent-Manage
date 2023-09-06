$(document).ready(function () {
    $("#clientTable").DataTable({
        language: {
            info: "Affichage de _TOTAL_ résultats",
            emptyTable: "Vous n'avez pas encore de clients",
            infoFiltered: "(filtré sur un total de _MAX_ résultats au total)",
            loadingRecords: "Chargement en cours... Veuillez patienter.",
            search: "Rechercher :",
            paginate: {
                next: "Suivant",
                previous: "Précédent",
            },
        },
        paging: true,
        ordering: false,
        info: true,
        lengthChange: false,
        deferRender: true, // Utilise la fonctionnalité de chargement différé
        ajax: {
            url: "/clients/getData", // URL vers la méthode getData dans ClientController
            dataSrc: "", // La propriété contenant les données
        },
        columns: [
            { data: "nom" },
            { data: "adresse" },
            { data: "telephone" },
            { data: "abonnement" },
            {
                data: "prix",
                render: function (data) {
                    return data + " DH ";
                },
            },
            { data: "paiement" },
            {
                data: "status",
                render: function (data, type, row) {
                    return (
                        '<div class="flex flex-col items-center">' +
                        '<span class="inline-flex px-2 text-xs font-semibold rounded-full ' +
                        row.statusClass +
                        '">' +
                        data +
                        "</span>" +
                        '<div class="text-xs text-gray-500 mt-1"></div>' +
                        row.date +
                        "</div>"
                    );
                },
            },

            { data: "equipe" },
            {
                data: null,
                render: function (data, type, row) {
                    return (
                        '<a href="/client/' +
                        row.id +
                        '/edit" class="text-blue-500 hover:underline">Modifier</a>'
                    );
                },
            },
        ],
    });

    // Charge les données en arrière-plan et les injecte dans DataTables
    function loadDataInBackground() {
        $.ajax({
            url: "/clients/getData", // URL vers la méthode getData dans ClientController
            method: "GET",
            success: function (data) {
                $("#clientTable").DataTable().clear().rows.add(data).draw();
            },
        });
    }

    // Appelle la fonction pour charger les données en arrière-plan
    loadDataInBackground();
});
