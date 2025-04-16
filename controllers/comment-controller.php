<?php
// On importe les fichiers nécessaires (configuration, modèle et dépôt de réservation)
require_once('../config.php');
require_once('../model/reservation-repository.php');
require_once('../model/reservation-model.php');

// On récupère la réservation de l'utilisateur s'il en existe une
$reservationForUser = findReservationForUser();

// Si une requête POST est envoyée (par exemple, quand l'utilisateur soumet un formulaire)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Vérifie qu'une réservation existe et qu'elle est bien de type Reservation
        if ($reservationForUser && $reservationForUser instanceof Reservation) {

            // Récupère le commentaire envoyé par l'utilisateur dans le formulaire
            $comment = $_POST['comment'];

            // Ajoute le commentaire à la réservation
            $reservationForUser->leaveComment($comment);

            // Enregistre (sauvegarde) la réservation mise à jour
            persistReservation($reservationForUser);
        }
    } catch (Exception $e) {
        // En cas d'erreur, on récupère le message d'erreur
        $errorMessage = $e->getMessage();
    }
}

// Affiche la vue pour commenter la réservation
require_once('../view/comment-reservation-view.php');
