<?php 
// Inclusion du header commun à toutes les pages (menu, styles, etc.)
require_once("../partial/header.php")
?>

<?php if (isset($bookingForUser)) { // Vérifie si une réservation a été trouvée pour l'utilisateur ?>
	<main>
		<h2>Annuler votre réservation</h2>
		
		<div>
			<p>Résumé de la réservation :</p>

			<!-- Affiche le nom de la réservation -->
			<p>Nom : <?php echo $bookingForUser->name; ?></p>

			<!-- Affiche le lieu de la réservation -->
			<p>Lieu : <?php echo $bookingForUser->place; ?></p>

			<!-- Affiche les dates de début et de fin au format jour-mois-année -->
			<p>Dates : <?php echo $bookingForUser->startDate->format('d-m-y'); ?> / <?php echo $bookingForUser->endDate->format('d-m-y'); ?></p>

			<!-- Affiche le prix total -->
			<p>Prix total : <?php echo $bookingForUser->totalPrice; ?> $</p>

			<!-- Affiche si l’option de ménage est choisie (booléen transformé en oui/non) -->
			<p>Option de ménage ? : <?php echo $bookingForUser->cleaningOption ? "oui" : "non"; ?></p>

			<!-- Affiche le statut actuel de la réservation (ex : en attente, payée, annulée, etc.) -->
			<p>Statut : <?php echo $bookingForUser->status; ?></p>

			<!-- Si un message de confirmation ou d'information est défini, on l'affiche en vert -->
			<?php if (isset($message)) { ?>
				<p class="green"><?php echo $message ?></p>
			<?php } ?>
		</div>

		<!-- Formulaire pour déclencher le paiement de la réservation -->
		<form method="POST" action="">
			<!-- Bouton qui soumet le formulaire en POST pour payer la réservation -->
			<button class="submit2" type="submit">Payer la réservation</button>
		</form>

<?php 
} else { 
	// Si aucune réservation n'a été trouvée
?>
	<p>Vous n'avez pas de réservation connue.</p>
<?php 
} 
?>

<?php 
// Affiche un message d'erreur s’il y en a un
if (isset($error)) {
    echo $error;
} 
?>
</main>
