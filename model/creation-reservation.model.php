<?php

class Reservation {

	// Informations de la réservation, saisies par l'utilisateur
	public $name;             // Nom de la personne qui réserve
	public $place;            // Lieu de réservation
	public $startDate;        // Date de début de la réservation (objet DateTime)
	public $endDate;          // Date de fin de la réservation (objet DateTime)
	public $cleaningOption;   // Option de nettoyage (booléen : true/false)

	// Prix et état de la réservation
	public $nightPrice;       // Prix par nuit (fixé ici à 1000)
	public $totalPrice;       // Prix total de la réservation (calculé)
	public $status;           // Statut actuel de la réservation (ex. : "CART", "PAID", "CANCELED")

	// Dates liées au processus de réservation
	public $bookedAt;         // Date de création de la réservation
	public $canceledAt;       // Date d'annulation (si applicable)
	public $paidAt;           // Date de paiement (si applicable)

	// Commentaire laissé par l'utilisateur
	public $comment;          // Texte du commentaire
	public $commentedAt;      // Date du commentaire

	/**
	 * Constructeur : appelé automatiquement lors de l’instanciation avec `new Reservation(...)`
	 * Initialise les propriétés principales de l'objet à partir des paramètres
	 */
	public function __construct($name, $place, $startDate, $endDate, $cleaningOption) {
		
		// Vérifie si la longueur du nom est inférieure à 2 caractères
		if (strlen($name) < 2) {
    
			// Si oui, on lance une exception avec un message d’erreur
			throw new Exception('Le nom doit comporter plus de deux caractères');
		}

		// Affectation des valeurs saisies par l'utilisateur
		$this->name = $name;
		$this->place = $place;
		$this->startDate = $startDate;
		$this->endDate = $endDate;
		$this->cleaningOption = $cleaningOption;

		// Prix fixe par nuit (peut être modifié plus tard si besoin)
		$this->nightPrice = 1000;

		// Calcul du prix total : nombre de nuits * prix par nuit + frais fixes (ex. : ménage)
		$totalPrice = (
			($this->endDate->getTimestamp() - $this->startDate->getTimestamp()) 
			/ (3600 * 24)  // conversion des secondes en jours
			* $this->nightPrice
		) + 5000; // 5000 est ici un montant fixe ajouté (ex: pour le nettoyage)

		$this->totalPrice = $totalPrice;

		// Date de réservation : maintenant
		$this->bookedAt = new DateTime();

		// Statut initial de la réservation
		$this->status = "CART";
	}

	/**
	 * Méthode pour annuler une réservation.
	 * Seules les réservations au statut "CART" peuvent être annulées.
	 */
	public function cancel() {
		if ($this->status === "CART") {
			$this->status = "CANCELED";
			$this->canceledAt = new DateTime(); // date actuelle
		}
	}

	/**
	 * Méthode pour valider le paiement d’une réservation.
	 * Change le statut à "PAID" et enregistre la date de paiement.
	 */
	public function pay() {
		if ($this->status === 'CART') {
			// On simule un paiement ici
			$this->status = "PAID";
			$this->paidAt = new DateTime(); // date actuelle
		}
	}

	/**
	 * Méthode pour laisser un commentaire après paiement.
	 * Seules les réservations "PAID" peuvent recevoir un commentaire.
	 */
	public function leaveComment($userComment) {
		if ($this->status === "PAID") {
			$this->comment = $userComment;
			$this->commentedAt = new DateTime(); // date actuelle
		}
	}

}
