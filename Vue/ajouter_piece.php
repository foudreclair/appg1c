<?php
include ('Controleur/traitement.php');
$titre = 'Domicile | Nouvelle pièce';
include 'gabarit.php';
$iduser = $_SESSION['id'];
?>

<body>
	<div class ="module3">
	<div class ="module form-block"
	<h2> Ajouter une pièce </h2>
				<form method="post" action="Controleur/traitement.php">
					<p> Choix de l'appartement :
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
					</p>
					<p>Nom de la pièce : <input type="text" name="nom_piece" id="nom_piece"></p>

					<input type="hidden" name="declencheur" id="declencheur" value="2">
					<input type="submit" name="valider_appart" value ="Valider">
				</form>
		</div>
		</div>
				</body>

<?php include 'footer.php' ?>
