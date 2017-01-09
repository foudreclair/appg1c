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
	<nav class ="menu_appartement">
		<ul>
			<li><a href="#">Ajouter un appartement/pièce</a></li>
			<li><a href="#">Modifier un appartement</a></li>
			<li><a href="#">Supprimer un appartement</a></li>
		</ul>
	</nav>
	<div id="full_bloc">
		<form class="left_bloc" method="post" action="../Controleur/traitement.php">
			<h2> Ajouter un appartement</h2>
			<p> Nom appartement : 
				<input type="text" name="nom_appartement" id="nom_appartement">
			</p>
			<p>Type appartement
				<select name="type_appartement" id="type_appartement">
					<option value="primaire"> Primaire</option>
					<option value="secondaire"> Secondaire </option>
				</select>
			</p>
			<p> Rue
				<input type="text" name="adresse_appartement" id="adresse_appartement"> 
			</p>
			<p> Ville
				<input type="text" name="ville_appartement" id="ville_appartement">
			</p>
			<p> Pays de Résidence
				<input type="text" name="pays_appartement" id="pays_appartement">
				<input type="hidden" name="declencheur" id="declencheur" value="1">
			</p>
			<p> Nombre de personnes dans l'appartement
				<input type="number" name="nombre_personne_appartement" id="nombre_personne_appartement" step="1">
			</p>
			<input type="submit" value="Valider">
		</form>
		<div class="right_bloc">
			
			<form method="post" action="../Controleur/traitement.php">
				<p>Nombre de capteurs : <input type="number" name="nombre_capteurs" id="nombre_capteurs" step="1" /></p>
				<input type="submit" name="valider_nombre_capteurs">
				<input type="hidden" name="declencheur" id="declencheur" value="3">
			</form>
			<form method="post" action="pagereglage.php">
				<?php
				for ($i=0; $i < "nombre_capteurs"; $i++) { 
				 	echo '<input type="text" name="nom_capteur" id="nom_capteur"></br>
				 	<select name="fonctionnalite" id="type_capteur">
				 				<option value="temperature"> Température </option>
				 				<option value="lumiere"> Lumière </option>
				 				<option value="fumee"> Fumée </option>
				 				<option value="camera"> Caméra </option>
				 				<option value="co2"> co2 </option>
				 				<option value="onde_em"> Ondes électromagnétiques </option>
				 				<option value="humidite"> Humidité </option>
				 				<option value="capteur_ouverture"> Capteur ouverture </option>
				 				<option value="pluviometre"> Pluviomètre </option>
				 	</select>';
					}
				?>
				<input type="submit">
			</form>

				<input type="hidden" name="declencheur" value="2">
				<input type="submit" name="valider_capteurs">
			</form>
		</div>
	
</body>