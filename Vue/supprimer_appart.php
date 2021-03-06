<?php
$titre = "Domisep | Supprimer un appartement";
include 'gabarit.php';
require ('Controleur/traitement.php');
// include ("Controleur/connexion.php");
$iduser = $_SESSION ['id'];
?>
<!--/////////////////////////////////////////////////////////////////// -->
<!DOCTYPE html>
<html>
<head>
<title><?php echo $titre ?></title>
<link rel="stylesheet" href="stylereglage.css" type="text/css" />
<meta charset="utf-8">
</head>
<!--/////////////////////////////////////////////////////////////////// -->
<body>
	<div class="module3">
		<div class="module form-block">
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

			<h1>Choisissez l'appartement à supprimer :</h1>
			<!--/////////////////////////////////////////////////////////////////// -->

			<form method="post" action="Controleur/traitement.php">

				<label for="Nom">Quel appartement souhaitez-vous supprimer ?</label>
				<br />
				<br />
				
				<select name="Nom" id="Nom">

			<?php
			try {
				$bdd = new PDO ( 'mysql:host=localhost;dbname=bdd', 'root', 'root' );
			} catch ( Exception $e ) {
				die ( 'Erreur : ' . $e->getMessage () );
			}
			$reponse = $bdd->query ( "SELECT * FROM Appartements WHERE Id_Utilisateur = '$iduser'" ); // **test2 à remplacer par ta table**
			while ( $donnees = $reponse->fetch () ) {
				?>
				 		<option value="<?php echo $donnees['Id']; ?>"> <?php echo $donnees['Nom']; ?></option>
						<?php
			}
			$reponse->closeCursor ();
			
			?>

			</select>
			<br />
			<br />
			 <input type="hidden" name="declencheur" id="declencheur"
					value="10"> <input type="submit" value="Supprimer">
			</form>
		</div>
	</div>
</body>
