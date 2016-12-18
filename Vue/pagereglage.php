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
		<div id="left_bloc">
			<p>Surface Totale (en m²)  <input placeholder="20m²" type="number" step="1" method="post" name="surface"></p>
			<p> Nombre de pièce <input placeholder="5" type="number" step="1" method="post" name="nombre_piece">
			<p> Adresse 
				<input type="test" name="adresse" placeholder="28 rue Notre Dame des Champs" method="post"> 
				<input type="number" name="code_postal" placeholder="75006" method="post">
				<input type="text" name="pays" placeholder="France" method="post">
			</p>
			<p> Nombre de personnes dans l'appartement
				<input type="number" name="nombre_personne" step="1" method="post">
			</p>
			<input type="button" value="Valider" name="valider_appart">

		</div>
	
</body>