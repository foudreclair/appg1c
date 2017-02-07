<?php
$titre = 'Domisep | Mes commandes';
include 'gabarit.php';
include 'Modele/connexion_bdd.php';
$iduser = $_SESSION['id'];
?>
<div class = "module3">
<div class="module form-block">
	<h1>Consultez vos commandes : </h1>
	
	<?php
	
	
		$req = $mysqli -> query("SELECT * FROM Commande WHERE Id_Utilisateur = '$iduser'");
	

while($don = $req->fetch_array(MYSQLI_ASSOC)){

	?>

	
	<div class ="commandes">
	<div class = "panier" style="cursor:pointer" onclick ='affich("<?php echo $don['Id'] ?>")'>
				<p class = "nom"><?php echo $don['Nom'] ?></p>
				<p class = "nom"><?php echo $don['Prenom'] ?></p>
				<p class = "date"><?php echo $don['Date'] ?></p>
				<p class = "prix"><?php echo $don['Prix'] ?> €</p>
				<p class = "nom">Payé : <?php echo $don['Payement'] ?></p>
				<p class = "adresse"><?php echo $don['Adresse'] ?></p>
				<p class = "codepostal"><?php echo $don['CodePostal'] ?></p>
				<p class = "ville"><?php echo $don['Ville'] ?></p>
				<p><a href="Vue/pdf.php?cmd=<?php echo $don['KeyCom'] ?>" download="">Télécharger</a></p>

	</div>
	<div id = "<?php echo $don['Id'] ?>" style="display:none" class ="deroulant">
	
	
	<?php
	$idcom = $don['Id'];
	$reqachat = $mysqli -> query("SELECT * FROM Achats WHERE Id_Commande = '$idcom'");
	while($achat = $reqachat->fetch_array(MYSQLI_ASSOC)){
		$idcata = $achat['Id_Catalogue'];
		$reqnompdt = $mysqli -> query("SELECT * FROM Catalogue WHERE Id = '$idcata'");
		while($pdt = $reqnompdt->fetch_array(MYSQLI_ASSOC)){
			$nompdt = $pdt['Nom'];
			$idcat = $pdt['Id_categorie'];
		}
		$reqnomcat = $mysqli -> query("SELECT * FROM categories WHERE Id = '$idcat'");
		while($catnom = $reqnomcat->fetch_array(MYSQLI_ASSOC)){
			$nomcat = $catnom['Nom'];
			
		}
	?>

	<div class = "capt">
	<ul>
		
		<li>Nom du Produit : <?php echo $nompdt ?></li>
		<li>Catégorie : <?php echo $nomcat ?></li>
		<li>Quantité : <?php echo $achat['Quantite']?></li>
		<li>Expédié : <?php echo $achat['Expedition']?></li>
		
		
		
		
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
</div>
<script>


	function affich(val){
		//alert(titre);
		//var signe = document.getElementById(titre).value;
		//alert(signe);
		if (document.getElementById(val).style.display == 'block'){
			document.getElementById(val).style.display = 'none';
			//document.getElementById(id).innerHTML="+ "+val;
		}
		else {
			document.getElementById(val).style.display = 'block';
			//document.getElementById(id).innerHTML="- "+val;
			//alert(document.getElementById(titre).value.replace("+", "_"));
			//document.getElementById("men_"+val).setAttribute("src","Vue/menuouvert.png");
		}
}
	
</script>