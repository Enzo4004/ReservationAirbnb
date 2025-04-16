<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>

	<header>

		<nav>
			<ul>

			</ul>
		</nav>

	</header>


	<main>

		<h1>Annuler une réservation</h1>

		<?php if (isset($errorMessage)) { ?>
			<!-- Message d'erreur si il y en a -->
			<div>
				<h3><?php echo $errorMessage; ?></h3>
			</div>
		<?php } ?>

		<!-- Résumé de la réservation si il y en a une et permet de vérifier si une variable est un objet et si cet objet est une instance d'une classe précise 
         (ici instanceof vérifie si "reservationForUser" est un objet et si "reservationForUser" est une instance
         de la classe "Reservation") -->
		<?php if (!is_null($reservationForUser) && $reservationForUser instanceof Reservation) { ?>		

			<div>
				<p>Récap de la réservation :</p>
				<p>Nom : <?php echo $reservationForUser->name; ?></p>
				<p>Lieu : <?php echo $reservationForUser->place; ?></p>
				<p>Dates : <?php echo $reservationForUser->startDate->format('d-m-y'); ?> / <?php echo $reservationForUser->endDate->format('d-m-y'); ?></p>
				<p>Prix total : <?php echo $reservationForUser->totalPrice; ?></p>
				<p>Option de ménage ? : <?php echo $reservationForUser->cleaningOption ? "oui" : "non"; ?></p>
				<p>Statut : "<?php echo $reservationForUser->status ?></p> 
			</div>

		<?php } ?>

		<form method="POST">

			<button type="submit">Annuler la réservation</button>

		</form>

		<?php ?>

		<!-- Création d'un formulaire pour annuler la réservation-->
		<form method="POST">

			<div>
				<button type="submit">Annuler la réservation</button>
			</div>

		</form>

		<?php
		// Vérifie si une variable $errorMessage est définie
		if (isset($errorMessage)) {
		?>
			<!-- Si $errorMessage est définie, on affiche un bloc contenant le message d'erreur -->
			<div>
				<!-- Affiche le message d'erreur dans un titre de niveau 3 -->
				<h3><?php echo $errorMessage; ?></h3>
			</div>
		<?php
		} // Fin de la condition if
		?>







	</main>

</body>

</html>