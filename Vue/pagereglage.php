<?php
require ('Controleur/traitement.php');
//include 'gabarit.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titre ?></title>
	<link rel="stylesheet" href="stylereglage.css" type="text/css" />
	<meta charset="utf-8">
</head>
<body>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	  Launch demo modal
	</button>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class ="corps">
	<div id ="menu_appartement">
		<ul>
			<li><a onclick = "affich('newpie')">Ajouter une pièce</a></li>
			<li><a href="index.php?page=modifappart">Modifier un appartement</a></li>
			<li><a href="index.php?page=suppappart">Supprimer un appartement</a></li>
			<li><a href="index.php?page=ajoutcapteur">Ajouter un capteur</a></li>
		</ul>
	</div>
	<div id = "newpie">
	<h2> Ajouter une pièce </h2>
				<form method="post" action="Controleur/traitement.php">
					<p> Choix de l'appartement :</p> 
					<select name="appartement_selectionne">

					<?php 
					
					include 'Modele/connexion_bdd.php';
					$result =  $mysqli -> query("SELECT * FROM Appartements WHERE Id_Utilisateur ='$iduser' ");
					while ($donnes = $result->fetch_array(MYSQLI_ASSOC)) {
						?>
					<option value="<?php echo $donnes['Id'] ?>"><?php echo $donnes['Nom'] ?></option>
					<?php
					}
					?>
						</select>
					
					<p>Nom de la pièce : <input type="text" name="nom_piece" id="nom_piece"></p>

					<input type="hidden" name="declencheur" id="declencheur" value="2">
					<input type="submit" name="valider_appart" value ="Valider">
				</form>
	</div>
	<div id="full_bloc">
		<form class="left_bloc" method="post" action="Controleur/traitement.php">
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

		
	</div>
</div>
</body>
<script>
document.getElementById('newpie').style.visibility = "hidden";
document.getElementById('newpie').style.display = 'none';
function affich(val){
	if (document.getElementById(val).style.display == 'none'){
		document.getElementById(val).style.visibility = "visible";
    	document.getElementById(val).style.display = 'block';
	}
	else {
		document.getElementById('newpie').style.visibility = "hidden";
	document.getElementById('newpie').style.display = 'none';
	}
	
}
</script>