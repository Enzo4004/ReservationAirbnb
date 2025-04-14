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


//fonction construct : en PHP est ce qu’on appelle un constructeur. C’est une méthode spéciale dans une classe qui est automatiquement appelée lorsqu’un objet est créé à partir de cette classe.
 function  __construct() { 

// Données saisies par l'utilis->name = "Enzo Ramon";
$this->place = "Paris 16";

// Création des objets DateTime pour les dates de début et de fin
$this->startDate = new DateTime("2025-04-25");
$this->endDate = new DateTime("2025-05-25");

// Prix par nuit
$this->nightprice = 1500;

// Option de nettoyage (peut être booléen ou chaîne, ici chaîne "True")
$this->CleaningOption = "True";

// Calcul automatique des valeurs
// On calcule la différence entre les dates en jours
$interval = $reservation->startDate->diff($this->endDate)->days;

// Prix total = (nombre de nuits * prix par nuit) + option ménage fixe à 5000
$totalPrice = ($interval * $this->nightprice) + 5000;

// Affectation du prix total
$this->totalPrice = $totalPrice;

// Date de réservation actuelle
$this->bookedAt = new DateTime();

// Statut de la réservation (ex : "CART", "CONFIRMED", etc.)
$this->status = "CART";

// Affichage de l'objet complet
var_dump($reservation);
}  
}

?>