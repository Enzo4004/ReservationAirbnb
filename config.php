<?php
 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

 //En gros la function "connectToDB() sert a connecté notre base de données a notre projet en cours. 
 function connectToDB() {
	try {
		// Création d'une nouvelle instance PDO pour se connecter à la base de données MySQL
		// - hôte : localhost sur le port 3306
		// - nom de la base de données : pscine_reservation
		$pdo = new PDO("mysql:host=localhost:3306;dbname=pscine_reservation", "Enzo Ramon", "HelmutRosabelle2");

		// Définir le mode de gestion des erreurs : ici, une exception sera levée en cas d'erreur SQL
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Retourner l'objet PDO pour pouvoir l'utiliser ailleurs dans le code
		return $pdo;
	} catch(PDOException $e) {
		// En cas d'échec de la connexion, lever une exception avec un message personnalisé
		throw new Exception("Impossible de se connecter à la DB : " . $e->getMessage());
	}
}
