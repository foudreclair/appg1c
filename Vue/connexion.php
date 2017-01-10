<?php
$titre = "Domisile | Page de connexion";

if(isset($_GET["erreur"])) {
	$contenu = "Erreur de saisi";
	$contenu .= formulaire_connexion();
}
else {
	$contenu = formulaire_connexion();
}

include 'gabarit.php';

?>

<div class="corps">
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