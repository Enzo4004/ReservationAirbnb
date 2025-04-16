<?php
// Inclusion des fichiers de configuration et des classes nécessaires
require_once('../config.php');                          // Fichier de configuration global (BD, constantes, etc.)
require_once('../model/reservation.repository.php');   // Contient les fonctions de manipulation des réservations
require_once('../model/creation-reservation.model.php');        // Contient la classe Reservation (modèle objet)

// Initialisation des messages pour le retour utilisateur
$message = "";  // Message d'information ou de succès
$error = "";    // Message d'erreur

// Récupère la réservation actuelle de l'utilisateur si elle existe en session ou autre mécanisme
$bookingForUser = findReservationForUser() ?? null;   

// Vérifie si le formulaire a été soumis via une requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si une réservation existe pour l'utilisateur
    if ($bookingForUser) {
        // Appelle la méthode qui marque la réservation comme payée
        $bookingForUser->pay();
        
        // Message de confirmation à afficher à l'utilisateur
        $message = "Vous avez payé votre réservation. Merci.";
        
        try {
            // Sauvegarde la réservation mise à jour (persist = enregistrer dans la BD)
            persistReservation($bookingForUser);
        } catch (Exception $e) {
            // En cas d'erreur lors de l'enregistrement, on capture le message de l'exception
            $error = $e->getMessage();
        }
    }
}

// Inclusion de la vue qui va afficher la page (HTML + données comme $message ou $error)
require_once('../view/pay.view.php');
?>
