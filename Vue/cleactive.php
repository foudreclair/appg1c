<?php
$erreur = $_GET['erreur'];
$titre = "Domisep | Gestion des clés d'activation";
include 'gabarit.php';
if ($_SESSION['admin']!='1') {
	header('Location: index.php?page=accueil');
}
include 'Modele/connexion_bdd.php';
?>

<div class = "module3">
<div class ="form form-block">
	<h2><?php echo $erreur ?></h2>
	<h1>Créer une clé d'activation : </h1>
	<form method = "post" action = "Controleur/nouvcle.php">
		<input type = "text" name = "cle" placeholder = "Clé">
		<select name = "permission">
			<option value = "0">Utilisateur classique</option>
			<option value = "1">Administrateur</option>
		</select><br>
		<br>
		<input type = "submit" name ="valider" value = "Valider">
	</form>
	<h1>Récapitulatif des clés : </h1>
	<div class="panier">
			<p>Clé</p>
			<p>Permission</p>
			<p>Activée ?</p>
		</div>
	<?php
	$req = $mysqli ->query("SELECT * FROM CleAct");
	$compte = 0;
	while($cle = $req ->fetch_array(MYSQLI_ASSOC)){
		$compte +=1;
		if ($cle['Permission']=='1'){
			$perm = "Administrateur";
		}
		else {
			$perm = "Utilisateur";
		}
		?>
		<div class="panier">
			<p><?php echo $cle['Cle'] ?></p>
			<p><?php echo $perm?></p>
			<p><?php echo $cle['Activee'] ?></p>
		</div>
		<?php
	}
	if ($compte=='0'){
		?>
	 	<h2>Vous n'avez pas de clés</h2>
	 	<?php
	}	
	?>
</div>
</div>