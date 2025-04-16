<?php

// Inclusion du fichier de configuration (connexion à la base de données, constantes, etc.)
require_once('../config.php');

// Inclusion du fichier contenant le modèle de création de réservation
require_once('../model/creation-reservation.model.php');
//Inclusion du fichiee contenant le systeme d'enregistrement des réservations .
require_once('../model/reservation.repository.php');

// Initialisation resa=null
$reservation = null;
// varibale error qui a pour valeur null        
$error = null;
$reservation = null;
$error = null;

// Vérifie si le formulaire a été envoyé en méthode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupération des valeurs envoyées par l'utilisateur
    // On utilise l'opérateur ?? pour donner une valeur "null" si la donnée n'est pas envoyée
    $name = $_POST['name'] ?? null;      // Nom de la personne
    $place = $_POST['place'] ?? null;    // Lieu choisi

    try {
        // Vérifie si les champs de date ne sont pas vides avant de créer les objets DateTime
        $startDate = !empty($_POST['start-date']) ? new DateTime($_POST['start-date']) : null;
        $endDate = !empty($_POST['end-date']) ? new DateTime($_POST['end-date']) : null;

        // Vérifie si l'option de ménage a été cochée
        // Si la case est cochée, $_POST['cleaning-option'] vaut "on"
        // Sinon, la clé n'existe même pas, donc on utilise isset() pour vérifier
        $cleaningOption = isset($_POST['cleaning-option']) && $_POST['cleaning-option'] === "on";

        // Création d'une nouvelle réservation avec les données reçues
        // La classe Reservation doit accepter ces paramètres dans son constructeur
        $reservation = new Reservation($name, $place, $startDate, $endDate, $cleaningOption);

        // Sauvegarde de la réservation, par exemple en session (fonction personnalisée)
        persistReservation($reservation);

    } catch (Exception $e) {
        // Si une erreur survient (ex: mauvaise date), on la stocke dans $error
        $error = "Une erreur est survenue : " . $e->getMessage();
    }

    // Conversion des dates reçues en objets DateTime (plus pratique pour le traitement)
    $startDate = isset($_POST['start-date']) ? new DateTime($_POST['start-date']) : null;//date ded début 
    $endDate = isset($_POST['end-date']) ? new DateTime($_POST['end-date']) : null; // date de fin 


    // Vérification si l'option "nettoyage" a été sélectionnée dans le formulaire
    // Si l'option est cochée, la valeur "on" est envoyée => on la convertit en booléen
    $cleaningOption = isset($_POST['cleaningOption']) && $_POST['cleaningOption'] === "on" ? true : false;

    try {
        // je créé une réservation : une instance de classe, en lui envoyant les données attendues
        $reservation = new Reservation($name, $place, $startDate, $endDate, $cleaningOption);

        // Appelle la fonction persistReservation en lui passant l'objet $reservation
        // Cette fonction va enregistrer la réservation dans la session PHP,et permet de me rtouver plus facilement.
        persistReservation($reservation);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }






    // Création d'une nouvelle réservation avec les données fournies
    // On instancie un objet Reservation avec les paramètres récupérés
    $reservation = new Reservation($name, $place, $startDate, $endDate, $cleaningOption);

    // Construction du message de confirmation avec le prix calculé automatiquement par la classe
    $message = "Votre réservation est confirmée, au prix de " . $reservation->totalPrice;
}
// Appelle la fonction findReservationForUser() pour récupérer la réservation stockée en session,
// et la stocke dans la variable $reservationForUser pour l'utiliser plus loin dans le code

$reservationForUser = findReservationForUser();

// Inclusion de la vue qui affiche le formulaire et le message de confirmation
require_once('../view/create-reservation.view.php');
