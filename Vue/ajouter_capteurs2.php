<?php
require ('../Controleur/traitement.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="stylereglage.css" type="text/css" />
	<meta charset="utf-8">
</head>
<body>
	<h2> Choisir les types de capteurs à ajouter </h2>


<form method="post" action="../Controleur/traitement.php">

			<?php
				for ($i=0; $i <$_SESSION['nombre_capteurs']; $i++) { 
				 echo ('<p> Nommer ce capteur </p> <input type="text" name="nom_capteur_$i" id="nom_capteur_$i"></br>
				 	<select name="type_capteur_$i" id="type_capteur_$i">
				 				<option value="temperature"> Température </option>
				 				<option value="lumiere"> Lumière </option>
				 				<option value="fumee"> Fumée </option>
				 				<option value="camera"> Caméra </option>
				 				<option value="co2"> co2 </option>
				 				<option value="onde_em"> Ondes électromagnétiques </option>
				 				<option value="humidite"> Humidité </option>
				 				<option value="capteur_ouverture"> Capteur ouverture </option>
				 				<option value="pluviometre"> Pluviomètre </option>
				 	</select>');
				}
			?>
	
			<input type="hidden" name="declencheur" id="declencheur" value="4">
			<input type="submit" name="Valider">
		</form>
?>
		
</body>