<?php
$titre = "Domicile | Accueil";

session_start();
$contenu = "";
include 'gabarit.php';
//print_r($val);

?>


	


<div class='corps'>
	<h1>Bonjour <?php echo $_SESSION['mail'];if ($_SESSION['admin']=='1') {echo " Vous êtes l'administrateur";}?>!</h1>
	<?php
			if ($_SESSION['admin']=='1') {
				?>
				<li <?php activepage("accueil")?>><a href="index.php?page=admin">Administration</a></li>
			<?php
			}
			?>
	<h1><a href="index.php?page=deconnexion"><input type="submit" value="Se déconnecter"></h1></input></a>

	<h2>Consultez l'état de vos capteurs : </h2>
	<?php 
	foreach ($valscenar as $key => $val) {
	?>
	<div onmouseover='affich("<?php echo $nomscenar[$key] ?>")' onmouseout='disp("<?php echo $nomscenar[$key] ?>")'>
	<h2><?php echo $nomscenar[$key] ?> : </h2>
	<div id = "<?php echo $nomscenar[$key] ?>" style="display:none" class ="deroulant"> 
	<?php
	
	foreach ($val as $key => $value) {
	?>
	<div class = "capt">
	<ul>
		
		<li>Nom du capteur : <?php echo $val[$key]['Id_Capteur'] ?></li>
		<li>Pièce : <?php echo $val[$key]['Id_Pieces'] ?></li>
		<li>Type : <?php echo utf8_encode($val[$key]['Id_Fonctionnalite'][0])?></li>
		<p>Valeur demandée : </p>
		<form method = "post" action = "Controleur/modifications.php?id=<?php echo $val[$key]['Id'] ?>">
			<input type ="text" name = "consigne" placeholder = "<?php echo $val[$key]['Consigne'] ?>"><br>
			<input type = "submit" name = 'Modifier' value = "Modifier">
		</form>
		
	</ul>
	</div>
	<?php
	}
	
	?>
	</div>
	</div>
	<?php
	}

	?>

</div>
<script>
	document.getElementById("infos").style.visibility = "hidden";
	document.getElementById("infos").style.display = 'none';
	function affich(val){

		document.getElementById(val).style.display = 'block';
	}
	function disp(val){
		
		document.getElementById(val).style.display = 'none';
	}
</script>