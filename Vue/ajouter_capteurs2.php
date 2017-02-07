<?php
$titre = 'Domicile | Ajouter un capteur';
$iduser = $_SESSION ['id'];
require ('Controleur/traitement.php');
include 'gabarit.php';
if (isset ( $_POST ['piecei'] ) && $_POST ['piecei'] != 'rien') {
	$_SESSION ['pie'] = $_POST ['piecei'];
}
if (isset ( $_POST ['app'] ) && $_POST ['app'] != 'rien') {
	$_SESSION ['app'] = $_POST ['app'];
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="stylereglage.css" type="text/css" />
<meta charset="utf-8">
</head>

<body>
	<div class="module3">
		<div class="module form-block">
		<div id="menu_appartement">
				<nav class="reglages">
					<ul>
						<li><a <?php activepage("reglages")?>href="index.php?page=reglages">Ajouter
								une maison</a></li>
						
						<li><a <?php activepage("ajoutcapteur")?> href="index.php?page=ajoutcapteur">Ajouter un capteur</a></li>

						<li><a <?php activepage("suppmaison")?> href="index.php?page=suppmaison">Supprimer une maison</a></li>
					</ul>
				</nav>
			</div>
			<br />
			<br />
			<h2>Choisir les types de capteurs à ajouter</h2>

<?php
if (isset ( $_SESSION ['app'] )) {
	if (isset ( $_SESSION ['pie'] )) {
		
		?>
<form method="post" action="Controleur/traitement.php">


				<p>Nommez ce capteur</p>
				<input type="text" name="nom_capteur" id="nom_capteur"></br> 
				<label>Choisir
					le type de capteur</label></br> 
					<select name="type_capteur"
					id="type_capteur">

					<option value="1">Température</option>
					<option value="2">Lumière</option>
					<option value="4">Détecteur de particules</option>
					<option value="5">Caméra</option>


					<option value="3">Humidité</option>

				</select>
				<p>Rentrez la clé du produit</p>
				<input type="text" name="id_capteur"> <input type="hidden"
					name="declencheur" id="declencheur" value="4"> <input type="submit"
					name="Valider" value="Valider">
			</form>
<?php
	} else {
		?>
	<form id="myform" action "" method="post">
				<p>Sélectionnez la pièce où vous souhaitez ajouter ce capteur :</p>
				<select name="piecei" id="piece" onchange=change()>
					<option value="rien">--</option>
	<?php
		include ('Modele/connexion_bdd.php');
		$ida = $_SESSION ['app'];
		$pieces = $mysqli->query ( "SELECT * FROM Pieces WHERE Id_Appartements = '$ida'" );
		while ( $piece = $pieces->fetch_array ( MYSQLI_ASSOC ) ) {
			?>
		<option value="<?php echo $piece['Id'] ?>"><?php echo $piece['Nom'] ?></option>
	<?php
		}
		?>
</select>
			</form>
			<script>
		function change(){
		    document.getElementById("myform").submit();
		}
</script>
<?php
	}
} else {
	?>
	<form id="myform2" action "" method="post">
				<p>Sélectionnez l'appartement où vous souhaitez ajouter ce capteur
					:</p>
				<select name="app" id="app" onchange=change()>
					<option value="rien">--</option>
	<?php
	include ('Modele/connexion_bdd.php');
	$ida = $_SESSION ['app'];
	$apps = $mysqli->query ( "SELECT * FROM Appartements WHERE Id_Utilisateur = '$iduser'" );
	while ( $app = $apps->fetch_array ( MYSQLI_ASSOC ) ) {
		?>
		<option value="<?php echo $app['Id'] ?>"><?php echo $app['Nom'] ?></option>
	<?php
	}
	?>
</select>
			</form>
			<script>
		function change(){
		    document.getElementById("myform2").submit();
		}
</script>
<?php
}
?>
<form method="post" action="Controleur/annul_capteur.php">
				<input type="submit" value="Annuler">
			</form>
		</div>
	</div>

</body>
