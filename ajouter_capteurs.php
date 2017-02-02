<?php


?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titre ?></title>
	<link rel="stylesheet" href="stylereglage.css" type="text/css" />
	<meta charset="utf-8">
</head>
<body>
	<h2> Choisir le nombre de capteurs dans la pièce </h2>
		<form method="post" action="../Controleur/traitement.php">
			<input type="number" name="nombre_capteurs" id="nombre_capteurs">
			<input type="hidden" name="declencheur" id="declencheur" value="page_ajouter_capteur">
			<input type="submit" name="valider">
		</form>
</body>