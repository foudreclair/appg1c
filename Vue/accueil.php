<?php
$titre = "Domisile | Accueil";


$contenu = "";
include 'gabarit.php';
//print_r($val);
?>

<div class='corps'>
	


<div class='corps'>
	<h1>Bonjour <?php echo $_SESSION['mail'];?>!</h1>

	<h2>Consultez l'état de vos capteurs : </h2>
	<?php foreach ($val as $key => $value) {
	?>
	<div class = "capt">
	<ul>
		
		<li>Nom du capteur : <?php echo $val[$key][0]['Id_Capteur'] ?></li>
		<li>Pièce : <?php echo $val[$key][0]['Id_Pieces'] ?></li>
		<li>Type : <?php echo utf8_encode($val[$key][0]['Id_Fonctionnalite'][0])?></li>
		<p>Valeur demandée : </p>
		<form method = "post" action = "Controleur/modifications.php?id=<?php echo $val[$key][0]['Id'] ?>">
			<input type ="text" name = "consigne" placeholder = "<?php echo $val[$key][0]['Consigne'] ?>">
			<input type = "submit" name = 'Modifier' value = "Modifier">
		</form>
		
	</ul>
	</div>
	<?php
	}
	

	

	?>
</div>
