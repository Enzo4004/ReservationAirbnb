<?php 
// Inclusion des fichiers nécessaires

require_once('../config.php');                        // Fichier de configuration global (connexion BDD, constantes, etc.)
require_once('../model/reservation.repository.php'); // Fonctions de gestion des réservations (accès à la base de données)
require_once('../model/creation-reservation.model.php');      // Définition de la classe Reservation (objet et méthodes associées)

// Initialisation des variables de retour utilisateur
$message = "";  // Message d'information ou succès (non utilisé ici mais prêt à l'emploi)
$error = "";    // Message d'erreur en cas d'échec

// Récupération de la réservation en cours pour l'utilisateur (depuis la session ou autre contexte)
$bookingForUser = findReservationForUser() ?? null;

// Si le formulaire a été soumis en POST (par exemple via un bouton "Annuler la réservation")
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Si une réservation existe
    if ($bookingForUser) {
        
        // Appelle la méthode de l'objet qui marque la réservation comme annulée
        $bookingForUser->cancel();

        try {
            // Tente de sauvegarder les changements dans la base de données
            persistReservation($bookingForUser);
        } catch (Exception $e) {
            // En cas d'erreur pendant la sauvegarde, capture et stocke le message de l'exception
            $error = $e->getMessage();
        }
    }
}

// Inclusion de la vue qui affichera le contenu (HTML + message ou erreur)
require_once('../view/cancel-reservation.view.php');
?>
