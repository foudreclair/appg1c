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

			<h1>Choisissez l'appartement à supprimer :</h1>


	<p>Supprimer Appartement</p>
 	<form action="../Controleur/traitement.php" method="post">
	<select name="appart_select">

<?php
			//	$i=0;
				require ('../Modele/connexion_bdd.php');
				$result = $mysqli->query("SELECT Id from Appartements");
				$donnes = $result->fetch_array(MYSQLY_NUM);

				/*for ($i=0; $i < 800; $i++) {
					echo $donnes[$i];
				}
				*/
				while ($donnes = $result->fetch_array(MYSQLY_NUM)) {
				echo $donnes[$i];
				echo "<option value=" . '$donnes[$i]' . ">$donnes[$i] $Nom</option>";
				$i=$i+1;
			}
?>

		</select>
			<form>
				<input type="hidden" name="declencheur" id="declencheur" value="10">
				<input type="submit" value="Supprimer">
			</form>
		</form>


</body>
