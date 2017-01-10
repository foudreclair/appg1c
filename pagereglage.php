<?php
$titre = "Domisile | Réglages";

include 'gabarit.php';
?>
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
				
			</p>
			<p> Nombre de personnes dans l'appartement
				<input type="number" name="nombre_personne_appartement" id="nombre_personne_appartement" step="1">
			</p>
			<input type="hidden" name="declencheur" id="declencheur" value="1">
			<input type="submit" value="Valider">
		</form>
	
		</div>
	
</body>