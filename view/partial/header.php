<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Permet de configurer le site en responsive -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
    
        <!-- Import du fichier style.css -->
        <link rel="stylesheet" href="../css/style.css?v=<?= time(); ?>" />

        <!-- Nomme l'onglet du navigateur -->
        <title>Renta'Roof</title>
</head>

<body>
<header>
    <nav>
        <ul>
            <li><a href="create-reservation.controller.php">Créer</a></li>
            <li><a href="pay-reservation.controller.php">Payer</a></li>
            <li><a href="cancel-reservation.controller.php">Annuler</a></li>
        </ul>
    </nav>
</header>