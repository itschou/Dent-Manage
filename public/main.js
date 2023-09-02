// Mise de la valeur par default pendant la création du client pour l'option "En période de teste"

$(document).ready(function () {
    // Au chargement de la page, vérifie la valeur initiale du select
    checkSelectedValue();
    setHiddenPrice();
    CalculatePourcentage();

    // Écouteur d'événement lorsque le select change
    $("#statusClientCreate").change(function () {
        checkSelectedValue();
    });

    $("#prixClientCreate").on("input", function () {
        setHiddenPrice();
    });

    $("#prixClientShow").on("input", function () {
        CalculateAmout();
    });
});

function CalculatePourcentage() {
    var argentTotal = $("#argentTotal").text().replace(" DH", "");
    var role = $("#roleUser").text();
    var pourcentage = ~~(50 / $("#nombreEquipeCollaborateurRevenue").text());
    var somme = 0;

    if (role === "Collaborateur") {
        $("#argentPourcentage").text((pourcentage / 100) * argentTotal + " DH");
        $("#TableauTotalPourcentage").text("Total avec " + pourcentage + "%");
    } else {
        $.ajax({
            url: "/clients/getData", // URL vers la méthode getData dans ClientController
            method: "GET",
            success: function (data) {
                // Initialisation des variables pour chaque type d'abonnement
                var abonnement = {"Mensuel": 1, "Trimestriel": 1, "Semestriel": 1, "Annuel": 600};
    
                // Parcours les données de la base de données
                for (var i = 0; i < data.length; i++) {
                    var client = data[i];
    
                    // Vérifie le type d'abonnement de ce client et ajoute la somme correspondante
                    if (client.abonnement === "Mensuel") {
                        somme += abonnement.Mensuel;
                    }
                    if (client.abonnement === "Trimestriel") {
                        somme += abonnement.Trimestriel;
                    }
                    if (client.abonnement === "Semestriel") {
                        somme += abonnement.Semestriel;
                    }
                    if (client.abonnement === "Annuel") {
                        somme += abonnement.Annuel;
                    }
                }
    
                // Utilise la somme ici, par exemple :
                $("#argentPourcentageBrut").text((((50 / 100) * argentTotal) - somme).toLocaleString() + " DH");
                $("#Totalhebergement").text(somme.toLocaleString() + " DH");
                $("#argentPourcentage").text(((50 / 100) * argentTotal) + " DH");
                $("#TableauTotalPourcentage").text("Total avec 50%");
            },
        });
    }
}


function checkSelectedValue() {
    var selectedValue = $("#statusClientCreate").val();
    var inputAmount = $("#prixClientCreate");

    if (selectedValue === "En période de teste") {
        inputAmount.val("200");
        inputAmount.prop("disabled", true);
    } else {
        inputAmount.val("");
        inputAmount.prop("disabled", false);
    }
}

// Calcule Simulation 

function CalculateAmout() {
    var prixMensuel = parseFloat($("#prixClientShow").val());

    // Prix normal
    var prixTrimestrielNormal = prixMensuel * 3;
    var prixSemestrielNormal = prixMensuel * 6;
    var prixAnnuelNormal = prixMensuel * 12;

    $("#prixMensuel").text(prixMensuel.toFixed(2) + " DH");
    $("#prixTrimestriel").text(prixTrimestrielNormal.toFixed(2) + " DH");
    $("#prixSemestriel").text(prixSemestrielNormal.toFixed(2) + " DH ");
    $("#prixAnnuel").text(prixAnnuelNormal.toFixed(2) + " DH ");

    // Prix après réduction

    var prixTrimestriel = prixTrimestrielNormal * 0.9;
    var prixSemestriel = prixSemestrielNormal * 0.8;
    var prixAnnuel = prixAnnuelNormal * 0.7;

    $("#prixMensuelReduc").text(prixMensuel.toFixed(2) + " DH");
    $("#prixTrimestrielReduc").text(prixTrimestriel.toFixed(2) + " DH");
    $("#prixSemestrielReduc").text(prixSemestriel.toFixed(2) + " DH ");
    $("#prixAnnuelReduc").text(prixAnnuel.toFixed(2) + " DH ");
}

function setHiddenPrice() {
    var prixMensuel = $("#prixClientCreate").val();
    $("#prixHidden").val(prixMensuel);
}

// Changement des prix en fonction du choix

// Calcule du pourcentage de chaque collaborateur
