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
				<li <?php activepage("accueil")?>><a href="index.php?page=cmd">Gérer les commandes</a></li>
				<li <?php activepage("accueil")?>><a href="index.php?page=cleactiv">Clés d'activation</a></li>
			<?php
			}
			?>
	<h1><a href="index.php?page=deconnexion"><input type="submit" value="Se déconnecter"></h1></input></a>

	<h2>Consultez l'état de vos capteurs : </h2>
	<?php 
	foreach ($valscenar as $key => $val) {
	?>
	
	<h2 style="cursor:pointer" onclick ='affich("<?php echo $nomscenar[$key] ?>",this.id)' id = "titre_<?php echo $nomscenar[$key] ?>">+ <?php echo $nomscenar[$key] ?></h2>
	
	
	
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
	
	<?php
	}

	?>

</div>
<script>
	document.getElementById("infos").style.visibility = "hidden";
	document.getElementById("infos").style.display = 'none';

	function affich(val,id){
		//alert(titre);
		//var signe = document.getElementById(titre).value;
		//alert(signe);
		if (document.getElementById(val).style.display == 'block'){
			document.getElementById(val).style.display = 'none';
			document.getElementById(id).innerHTML="+ "+val;
		}
		else {
			document.getElementById(val).style.display = 'block';
			document.getElementById(id).innerHTML="- "+val;
			//alert(document.getElementById(titre).value.replace("+", "_"));
			//document.getElementById("men_"+val).setAttribute("src","Vue/menuouvert.png");
		}
}
	
</script>