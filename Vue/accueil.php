<?php

$titre = "Domisile | Accueil";


$contenu = "";
include 'gabarit.php';
if(isset($_SESSION['mail']) AND isset($_SESSION['id'])) 
{

?>

<div class='corps'>
	<h1>Bonjour <?php echo $_SESSION['mail'];?>!</h1>
	<h2>Consultez l'état de vos capteurs : </h2>
	<?php foreach ($val as $key => $value) {
	?>
	<ul>
		<li>Nom du capteur : <?php echo $val[$key][0]['Id_Capteur'] ?></li>
		<li>Pièce : <?php echo $val[$key][0]['Id_Pieces'] ?></li>
		<li>Type : <?php echo $val[$key][0]['Id_Fonctionnalite'][0] ?></li>
		<li>Valeur demandée : <?php echo $val[$key][0]['Consigne'] ?></li>
		<li>Valeur actuelle : </li>
	</ul>
	<?php
	}
	else {
		echo 'Vous n �tes pas connect�s !';
	}
	?>
</div>
