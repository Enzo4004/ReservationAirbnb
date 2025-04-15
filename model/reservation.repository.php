<?php

// Fonction pour enregistrer une réservation dans la session
function persistReservation($reservation)
{

    // Démarre la session (obligatoire pour utiliser $_SESSION)
    session_start();

    // Stocke l'objet $reservation dans la session sous la clé "reservation"
    $_SESSION["reservation"] = $reservation;
}

// Fonction pour récupérer une réservation enregistrée en session
function findReservationForUser()
{

    // Démarre la session (nécessaire pour accéder à $_SESSION)
    session_start();


    // Vérifie si la clé "reservation" existe dans la superglobale $_SESSION
    if (array_key_exists('reservation', $_SESSION)) {

        // Si elle existe, retourne la réservation enregistrée
        return $_SESSION["reservation"];
    } else {

        // Sinon, retourne null (aucune réservation trouvée)
        return null;
    }



    // Retourne la réservation stockée dans la session (ou null si elle n'existe pas)
    return $_SESSION["reservation"];
}
