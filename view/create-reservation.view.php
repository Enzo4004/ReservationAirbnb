<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">

 	<title>Document</title>
	<link rel="stylesheet" href="../css/style.css">
 </head>
 <body>
 
 	<header>
 
 		<nav>
 			<ul>
 
 			</ul>
 		</nav>
 
 	</header>
 
 
 <main>
 	
 	<h1>Créer une réservation</h1>
 
 	<form method="POST">
 
 		<label>Nom
 			<input type="text" name="name">
 		</label>
 
 		<label>Lieu
 			<select name="place">
 				<option value="chateau-versailles">Château de Versailles</option>
 				<option value="zad-limoges">ZAD de limoges</option>
 				<option value="renault-clio">Renault Clio</option>
 				<option value="maison-campagne">Maison de campagne</option>
 			</select>
 		</label>
 
 		<label>Date de début
 			<input type="date" name="start-date">
 		</label>
 
 		<label>Date de fin
 			<input type="date" name="end-date">
 		</label>
 
 		<label>Option de ménage ?
 			<input type="checkbox" name="cleaning-option">
 		</label>
 
 		<button type="submit">Créer la réservation</button>
 
 	</form>
	 

	 <?php 
		// Vérifie si la variable $error n'est pas nulle (donc qu'une erreur existe)
		if (!is_null($error)) { 
		?>
    	<!-- Si une erreur est présente, on affiche un message -->
    	<p>La réservation n'a pas été effectuée : <?php echo $error; ?></p>
		<?php 
		// Fin de la condition
} 
?>


	 <?php 
		// Vérifie si une réservation existe (n'est pas nulle)
		if (!is_null($reservation)) { 
		?>

		<!-- Début du bloc d'affichage du récapitulatif -->
		<div>
    	<p>Récap de la réservation :</p>

    	<!-- Affiche le nom de la personne ayant réservé -->
    	<p>Nom : <?php echo $reservation->name; ?></p>

    	<!-- Affiche le lieu de la réservation -->
    	<p>Lieu : <?php echo $reservation->place; ?></p>

    	<!-- Affiche les dates de début et de fin, formatées en jour-mois-année -->
    	<p>Dates : 
        <?php echo $reservation->startDate->format('d-m-y'); ?> 
        / 
        <?php echo $reservation->endDate->format('d-m-y'); ?>
    	</p>

   		<!-- Affiche le prix total de la réservation -->
    	<p>Prix total : <?php echo $reservation->totalPrice; ?></p>

    	<!-- Affiche "oui" si l'option ménage est activée, sinon "non" -->
    	<p>Option de ménage ? : 
        <?php echo $reservation->cleaningOption ? "oui" : "non"; ?>
    	</p>
		</div>


		<?php 

} 
	?>

 
 </main>
 
 </body>
 </html>