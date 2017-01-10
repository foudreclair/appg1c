<?php
$titre = "Domisile | Page de connexion";
include 'gabarit.php';

?>

<div class="corps">
<?php 

if(isset($_GET["erreur"])) {
	switch($_GET["erreur"]) {
		case 1 :
			echo 'Au moins un des champs est vide.';
			break;
		case 2 :
			echo "L'identifiant ou le mot de passe est incorrect.";
			break;
	}
}
if(isset($_GET["page"])) {
	if($_GET["page"] == "deconnexion") {
		echo 'Vous êtes désormais déconnecté.';
	}
}
?>
<h1>Connectez-vous pour accéder à la plateforme : </h1>
<div class ="form">
<form method ="post" action = "Controleur/connexion.php">
<input type = "text" name ="mail" placeholder="Entrez votre email"><br>
<input type ="password" name ="password" placeholder="Mot de passe"><br>
<input class ="button" type = "submit" name ='connexion' value ='Se connecter'>
<a href="index.php?page=register"><input class ="button" name ='register' value ='Créer un compte'></a>
</form>
</div>
</div>