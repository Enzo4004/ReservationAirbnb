<?php



// Définition de la classe Reservation
class Reservation {
    public $name;              // Nom du client
    public $place;             // Lieu de réservation
    public $startDate;         // Date de début
    public $endDate;           // Date de fin
    public $nightprice;        // Prix par nuit
    public $status;            // Statut de la réservation
    public $bookedAt;          // Date de réservation
    public $CleaningOption;    // Option de nettoyage
    public $totalPrice;        // Prix total (à calculer)
}


    function  __construct() { 
// Création d'une nouvelle réservation (Attention au nom de classe)
$reservation = new Reservation();

// Données saisies par l'utilisateur
$reservation->name = "Enzo Ramon";
$reservation->place = "Paris 16";

// Création des objets DateTime pour les dates de début et de fin
$reservation->startDate = new DateTime("2025-04-25");
$reservation->endDate = new DateTime("2025-05-25");

// Prix par nuit
$reservation->nightprice = 1500;

// Option de nettoyage (peut être booléen ou chaîne, ici chaîne "True")
$reservation->CleaningOption = "True";

// Calcul automatique des valeurs
// On calcule la différence entre les dates en jours
$interval = $reservation->startDate->diff($reservation->endDate)->days;

// Prix total = (nombre de nuits * prix par nuit) + option ménage fixe à 5000
$totalPrice = ($interval * $reservation->nightprice) + 5000;

// Affectation du prix total
$reservation->totalPrice = $totalPrice;

// Date de réservation actuelle
$reservation->bookedAt = new DateTime();

// Statut de la réservation (ex : "CART", "CONFIRMED", etc.)
$reservation->status = "CART";

// Affichage de l'objet complet
var_dump($reservation);
}   

?>