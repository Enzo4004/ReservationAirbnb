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
 	
 	<h1>Laisser un commentaire sur une réservation</h1>
 
 	<?php require_once('../view/partials/_resume-reservation.view.php'); 
			require_once("../view/pay.view.php");
          require_once("../view/partial.php");		
	?>
 
 
 	<form method="POST">
 
 		<label> Commentaire
 			<input type="text" name="comment" required />
 		</label>
 
 		<button type="submit">Valider le commentaire</button>
 
 	</form>
 
 
 
 </main>
 
 </body>
 </html>