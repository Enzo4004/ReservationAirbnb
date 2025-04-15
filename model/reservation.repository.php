<?php

// Fonction pour enregistrer une réservation dans la session
function persistReservation($reservation) {
    
    // Démarre la session (obligatoire pour utiliser $_SESSION)
    session_start();

    // Stocke l'objet $reservation dans la session sous la clé "reservation"
    $_SESSION["reservation"] = $reservation;
}

// Fonction pour récupérer une réservation enregistrée en session
function findReservationForUser() {

    // Démarre la session (nécessaire pour accéder à $_SESSION)
    session_start();

    // Retourne la réservation stockée dans la session (ou null si elle n'existe pas)
    return $_SESSION["reservation"];
}
