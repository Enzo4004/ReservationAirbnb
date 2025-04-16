<?php if (!is_null($reservationForUser)) { ?>

<div>
    <p>Récap de la réservation :</p>
    <p>Nom : <?php echo $reservationForUser->name; ?></p>
    <p>Lieu : <?php echo $reservationForUser->place; ?></p>
    <p>Dates : <?php echo $reservationForUser->startDate->format('d-m-y'); ?> / <?php echo $reservationForUser->endDate->format('d-m-y'); ?></p>
    <p>Prix total : <?php echo $reservationForUser->totalPrice; ?></p>
    <p>Option de ménage ? : <?php echo $reservationForUser->cleaningOption ? "oui" : "non"; ?></p>
    <p>Statut : <?php echo $reservationForUser->status; ?></p>
    <?php if (!is_null($reservationForUser->comment)) { ?>
        <p>Commentaire : <?php echo $reservationForUser->comment; ?></p>
    <?php } ?>
</div>

<?php } ?>