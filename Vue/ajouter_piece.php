<?php
require ('../Controleur/traitement.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titre ?></title>
	<link rel="stylesheet" href="stylereglage.css" type="text/css" />
	<meta charset="utf-8">
</head>
<body>
	<h2> Ajouter une pièce </h2>
				<form method="post" action="../Controleur/traitement.php">
					<p> Choix de l'appartement : 
					<select name="appartement_selectionne">

					<?php 
					$i=0;
					while ($donnes = $result->fetch_array()) {
					echo "<option value=" . '$donnes[$i]' . "> $donnes[$i]</option>";
					$i=$i+1;
					}
					?>
						</select>
					</p>
					<p>Nom de la pièce : <input type="text" name="nom_piece" id="nom_piece"></p>
					<input type="hidden" name="declencheur" id="declencheur" value="2">
					<input type="submit" name="valider_appart">
				</form>
				</body>
