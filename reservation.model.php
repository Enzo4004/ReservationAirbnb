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
    function  __construct($name, $place, $startDate, $endDate,$CleaningOption)     { 

      // utilisateur envoie ces valeurs
		// temporairement "en dur"
		$this->name = $name;
		$this->place = $place;
		$this->startDate = $startDate;
		$this->endDate = $endDate;
		$this->cleaningOption = $cleaningOption;

		$this->nightPrice = 1500;

        // valeurs calculées automatiquement
		$totalPrice = (($this->endDate->getTimestamp() - $this->startDate->getTimestamp()) / (3600 * 24) * $this->nightPrice) + 5000;

		$this->totalPrice = $totalPrice;
		$this->bookedAt = new DateTime();
		$this->status = "CART";
	}


        // Création d'une nouvelle instance de la classe Reservation avec les paramètres suivants :
        // $name           : nom du client ou de la réservation
        // $place          : lieu de la réservation (ex: une chambre, une maison, etc.)
        // $startDate      : date de début de la réservation
        // $endDate        : date de fin de la réservation
        // $CleaningOption : option de nettoyage choisie (ex: standard, premium, aucun)
         $reservation = new Reservation($name, $place, $startDate, $endDate,$CleaningOption)
        
         function cancel() {
            // Vérifie si le statut de l'objet est "CART"
            if ($this->status === "CART") {
                // Si le statut est "CART", alors on le change en "CANCELED"
                $this->status = "CANCELED";
            }
        }
        
        $reservation->cancel();    
               
               
        
        // Affichage de l'objet complet
        var_dump($this);
        
    }  

// objet basé sur la classe Reservation / instance de classe Reservation
// il contient toutes les propriétés de la classe

$name = "Enzo";
$place = "Paris 16";
$start = new DateTime('2025-04-04');
$end = new DateTime('2025-04-05');
$cleaning = false;

$reservation = new Reservation($name , $place, $start, $end, $cleaning);

       
       

?>