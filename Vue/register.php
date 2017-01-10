<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
<?php
$titre = "Domisile | Cr?e votre compte";

$contenu = "";
include 'gabarit.php';

?>

<div class='corps'>
<?php 
	if(isset($_GET['succes'])) {
		echo '<center>Inscription r?ussi</center>';
	}
	if(isset($_GET['erreur'])) {
		$erreur = $_GET['erreur'];
		switch($erreur) {
			case 1 :
				echo '<center>Au moins un des champs est vide</center>';
				break;
			case 2 :
				echo '<center>Les mots de passe sont diff?rents</center>';
				break;
			case 3 :
				echo '<center>Un utilisateur avec cet identifiant existe deja</center>';
				break;
		}
	}
?>
	<h1>Cr?er votre compte</h1>
	<form method="post" action="Controleur/register.php" enctype="multipart/form-data">
		<fieldset><legend>Vos identifiants</legend>
	<label for="mail">Mail :</label><input name="mail" type="text" id="mail" /><br />
	<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" /><br />
	<label for="confirm">Confirmer le mot de passe :</label><input type="password" name="confirm" id="confirm" />
	</fieldset>
	<fieldset><legend>Vos informations</legend>
	<label for="Nom">Nom : </label><input name="nom" type="text" id="nom" /><br />
	<label for="Prenom">Prenom :</label><input name="prenom" type="text" id="prenom" /><br />
	<label for="Date_naissance">Date de naissance :</label><input type="text" id="datepicker" name="datepicker"><br />
	</fieldset>
	<input type="submit" value="S'inscrire" />
	</form>
</div>