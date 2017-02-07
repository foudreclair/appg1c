<?php
include ('Controleur/traitement.php');
$titre = 'Domisep | Nouvelle pièce';
include 'gabarit.php';
$iduser = $_SESSION ['id'];
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $titre ?></title>
<link rel="stylesheet" href="stylereglage.css" type="text/css" />
<meta charset="utf-8">
</head>
<body>
	<div class="module3">
		<div class="module form-block">
			<div id="menu_appartement">
				<nav class="reglages">
					<ul>
						<li><a <?php activepage("reglages")?>
							href="index.php?page=reglages">Ajouter une maison</a></li>
						<li><a <?php activepage("ajoutpiece")?>
							href="index.php?page=ajoutpiece">Ajouter une pièce</a></li>
						<li><a <?php activepage("ajoutcapteur")?>
							href="index.php?page=ajoutcapteur">Ajouter un capteur</a></li>

						<li><a <?php activepage("suppmaison")?>
							href="index.php?page=suppmaison">Supprimer une maison</a></li>
					</ul>
				</nav>
			</div>
			<h2>Ajouter une pièce</h2>
			<form method="post" action="Controleur/traitement.php">
				<p>
					Choix de l'appartement : <select name="appartement_selectionne">

					<?php
					
					include 'Modele/connexion_bdd.php';
					$result = $mysqli->query ( "SELECT * FROM Appartements WHERE Id_Utilisateur ='$iduser' " );
					while ( $donnes = $result->fetch_array ( MYSQLI_ASSOC ) ) {
						?>
					<option value="<?php echo $donnes['Id'] ?>"><?php echo $donnes['Nom'] ?></option>
					<?php
					}
					?>
						</select>
				</p>
				<p>
					Nom de la pièce : <input type="text" name="nom_piece"
						id="nom_piece">
				</p>

				<input type="hidden" name="declencheur" id="declencheur" value="2">
				<input type="submit" name="valider_appart" value="Valider">
			</form>
		</div>
	</div>
</body>