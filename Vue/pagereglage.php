<?php
require ('Controleur/traitement.php');
// include 'gabarit.php';
// on l'utilise?
?>
<link rel="stylesheet" href="stylereglage.css" type="text/css" />
	<div class="module3">
		<div class="form form-block">
			<div id="menu_appartement">
				<nav class="reglages">
					<ul>
						<li><a <?php activepage("reglages")?>href="index.php?page=reglages">Ajouter
								une maison</a></li>
						<li><a <?php activepage("ajoutpiece")?>href="index.php?page=ajoutpiece">Ajouter
								une pièce</a></li>
						<li><a <?php activepage("ajoutcapteur")?> href="index.php?page=ajoutcapteur">Ajouter un capteur</a></li>

						<li><a <?php activepage("suppmaison")?> href="index.php?page=suppmaison">Supprimer une maison</a></li>
					</ul>
				</nav>
			</div>

			<div id="full_bloc">
				<form class="left_bloc" method="post"
					action="Controleur/traitement.php">
					
					<br />
					<br />
					<h2>Ajouter une maison</h2>
					<p>
						Ma maison : <input type="text" name="nom_appartement"
							id="nom_appartement">
					</p>
					<p>
						Type de maison <select name="type_appartement"
							id="type_appartement">
							<option value="primaire">Primaire</option>
							<option value="secondaire">Secondaire</option>
						</select>
					</p>
					<p>
						Rue <input type="text" name="adresse_appartement"
							id="adresse_appartement">
					</p>
					<p>
						Ville <input type="text" name="ville_appartement"
							id="ville_appartement">
					</p>
					<p>
						Pays de Résidence <input type="text" readonly="readonly" value ="France" name="pays_appartement"
							id="pays_appartement"> <input type="hidden" name="declencheur"
							id="declencheur" value="1">
					</p>
					<p>
						Nombre de personnes dans la maison <input type="number"
							name="nombre_personne_appartement"
							id="nombre_personne_appartement" step="1" value="0" min="0">
					</p>
					<input type="submit" value="Valider">
				</form>


			</div>
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

