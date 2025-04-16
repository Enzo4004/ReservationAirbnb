	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Document</title>
		<link rel="stylesheet" href="../css/style.css">
	</head>

	<body>
		<?php require_once("../view/partial/header.php")?>
		
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
				// Vérifie si une réservation existe (est null) 
				if (!is_null($reservationForUser)) {
				?>

				<!-- Début du bloc d'affichage du récapitulatif -->
				<div>
					<p>Récap de la réservation :</p>

					<!-- Affiche le nom de la personne ayant fait la réservation -->
					<p>Nom : <?php echo $reservationForUser->name; ?></p>

					<!-- Affiche le lieu réservé (par exemple : Château de Versailles) -->
					<p>Lieu : <?php echo $reservationForUser->place; ?></p>

					<!-- Affiche les dates de début et de fin de la réservation, formatées en jour-mois-année -->
					<p>Dates :
						<?php echo $reservationForUser->startDate->format('d-m-y'); ?>
						/
						<?php echo $reservationForUser->endDate->format('d-m-y'); ?>
					</p>

					<!-- Affiche le prix total de la réservation -->
					<p>Prix total : <?php echo $reservationForUser->totalPrice; ?></p>

					<!-- Vérifie si l'option de ménage est activée : affiche "oui" si vrai, sinon "non" -->
					<p>Option de ménage ? :
						<?php echo $reservationForUser->cleaningOption ? "oui" : "non"; ?>
					</p>

				</div>
				<?php
				}
					?>

			<?php
				require_once("../controllers/pay-reservation.controller.php")			
			?>
	

		</main>

	</body>

	</html>