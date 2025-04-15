<?php

// Inclusion du fichier de configuration (connexion à la base de données, constantes, etc.)
require_once('../config.php');

// Inclusion du fichier contenant le modèle de création de réservation
require_once('../model/creation-Reservation.model.php');
//Inclusion du fichiee contenant le systeme d'enregistrement des réservations .
require_once('../model/Reservation.repository.php');

// Initialisation resa=null
$reservation = null;
// varibale error qui a pour valeur null        
$error = null;

// Vérification que le formulaire a bien été soumis en méthode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupération des données envoyées par l'utilisateur via le formulaire
    $name = $_POST['name'];         // Nom de la personne qui réserve
    $place = $_POST['place'];       // Lieu de réservation

    // Conversion des dates reçues en objets DateTime (plus pratique pour le traitement)
    $startDate = new DateTime($_POST['start-date']);  // Date de début
    $endDate = new DateTime($_POST['end-date']);      // Date de fin

    // Vérification si l'option "nettoyage" a été sélectionnée dans le formulaire
    // Si l'option est cochée, la valeur "on" est envoyée => on la convertit en booléen
    if ($_POST['cleaning-option'] === "on") {
        $cleaningOption = true;
    } else {
        $cleaningOption = false;
    }

    try {
        // je créé une réservation : une instance de classe, en lui envoyant les données attendues
        $reservation = new Reservation($name, $place, $startDate, $endDate, $cleaningOption);

        // Appelle la fonction persistReservation en lui passant l'objet $reservation
        // Cette fonction va enregistrer la réservation dans la session PHP,et permet de me rtouver plus facilement.
        persistReservation($reservation);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }


    // Appelle la fonction findReservationForUser() pour récupérer la réservation stockée en session,
    // et la stocke dans la variable $reservationForUser pour l'utiliser plus loin dans le code
    $reservationForUser = findReservationForUser();



    // Création d'une nouvelle réservation avec les données fournies
    // On instancie un objet Reservation avec les paramètres récupérés
    $reservation = new Reservation($name, $place, $startDate, $endDate, $cleaningOption);

    // Construction du message de confirmation avec le prix calculé automatiquement par la classe
    $message = "Votre réservation est confirmée, au prix de " . $reservation->totalPrice;
}

// Inclusion de la vue qui affiche le formulaire et le message de confirmation
require_once('../view/create-reservation.view.php');
