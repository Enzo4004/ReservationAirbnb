<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     try {
 
         // permet de vérifier si une variable est un objet et si cet objet est une instance d'une classe précise 
         // (ici instanceof vérifie si "reservationForUser" est un objet et si "reservationForUser" est une instance
         // de la classe "Reservation")
         if ($reservationForUser && $reservationForUser instanceof Reservation) {
 
             // Appel de la méthode pour annuler la réservation de l'utilisateur depuis le model
             $reservationForUser->cancel();
             persistReservation($reservationForUser);
 
         }
     } catch (Exception $e) {
         $errorMessage = $e->getMessage();
     }
 }
 
 require_once('../view/cancel-reservation-view.php');