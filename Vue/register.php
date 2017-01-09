<?php
$titre = "Domisile | Crée votre compte";
$contenu = "";
include 'gabarit.php';
?>

<div class='corps'>
	<h1>Créer votre compte</h1>
	<form method="post" action="Controleur/register.php" enctype="multipart/form-data">
		<fieldset><legend>Vos identifiants</legend>
	<label for="mail">Mail :</label><input name="mail" type="text" id="mail" /><br />
	<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" /><br />
	<label for="confirm">Confirmer le mot de passe :</label><input type="password" name="confirm" id="confirm" />
	</fieldset>
	<fieldset><legend>Vos informations</legend>
	<label for="Nom">Nom : </label><input name="nom" type="text" id="nom" /><br />
	<label for="Prenom">Prenom :</label><input name="prenom" type="text" id="prenom" /><br />
	</fieldset>
	<input type="submit" value="S'inscrire" />
	</form>
</div>