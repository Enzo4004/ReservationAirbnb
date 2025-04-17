<?php
 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

 function connectToDB() {
	try {
		$pdo = new PDO("mysql:host=localhost:3306;dbname=pscine_reservation", "Enzo Ramon", "HelmutRosabelle2");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $pdo;
	} catch(PDOException $e) {
		throw new Exception("impossible de se connecter à la DB : " . $e->getMessage());
	}
}