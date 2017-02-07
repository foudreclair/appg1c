<?php
$titre = "Cocoricode | Gestion des commandes";
include 'gabarit.php';
include 'Modele/connexion_bdd.php';
if ($_SESSION ['admin'] != '1') {
	header ( 'Location: index.php?page=accueil' );
} else {
	
	?>
<div class="module3">
	<div class="module form-block">
		<h1>Consultez et validez les commandes :</h1>
		<button onclick='document.location.href="index.php?page=cmd" '>Voir
			toutes les commandes</button><br>
		<br>
		<button
			onclick='document.location.href="index.php?page=cmd&voir=nonpaye" '>Voir
			les commandes non payées</button>
		<br>
		<br>
	<?php
	
	if ($_GET['voir'] == "nonpaye") {
		$req = $mysqli->query ( "SELECT * FROM Commande WHERE Payement ='Non'" );
	} else {
		$req = $mysqli->query ( "SELECT * FROM Commande" );
	}
	
	while ( $don = $req->fetch_array ( MYSQLI_ASSOC ) ) {
		?>

	
	<div class="commandes">
			<div class="panier" style="cursor: pointer"
				onclick='affich("<?php echo $don['Id'] ?>")'>
				<p class="nom"><?php echo $don['Nom'] ?></p>
				<p class="nom"><?php echo $don['Prenom'] ?></p>
				<p class="date"><?php echo $don['Date'] ?></p>
				<p class="prix"><?php echo $don['Prix'] ?> €</p>
				<p class="nom">Payé : <?php echo $don['Payement'] ?></p>
				<p class="adresse"><?php echo $don['Adresse'] ?></p>
				<p class="codepostal"><?php echo $don['CodePostal'] ?></p>
				<p class="ville"><?php echo $don['Ville'] ?></p>

			</div>
			<div id="<?php echo $don['Id'] ?>" style="display: none"
				class="deroulant">

				<button
					onclick='document.location.href="Controleur/expcom.php?type=com&val=exp&id=<?php echo $don['Id'] ?>" '>Tout
					expédier</button>
	<?php
		if ($don ['Payement'] == 'Non') {
			?>
	<button
					onclick='document.location.href="Controleur/valpay.php?val=pay&id=<?php echo $don['Id'] ?>" '>Valider
					le payement</button>
				<br>
	<?php
		} else {
			?>
	<button
					onclick='document.location.href="Controleur/valpay.php?val=suppay&id=<?php echo $don['Id'] ?>" '>Annuler
					le payement</button>
				<br>
	<?php
		}
		?>
	<?php
		$idcom = $don ['Id'];
		$reqachat = $mysqli->query( "SELECT * FROM Achats WHERE Id_Commande = '$idcom'" );
		while ( $achat = $reqachat->fetch_array( MYSQLI_ASSOC ) ) {
			$idcata = $achat ['Id_Catalogue'];
			$reqnompdt = $mysqli->query ( "SELECT * FROM Catalogue WHERE Id = '$idcata'" );
			while ( $pdt = $reqnompdt->fetch_array ( MYSQLI_ASSOC ) ) {
				$nompdt = $pdt ['Nom'];
				$idcat = $pdt ['Id_categorie'];
			}
			$reqnomcat = $mysqli->query ( "SELECT * FROM categories WHERE Id = '$idcat'" );
			while ( $catnom = $reqnomcat->fetch_array ( MYSQLI_ASSOC ) ) {
				$nomcat = $catnom ['Nom'];
			}
			?>

	<div class="capt">
					<ul>

						<li>Nom du Produit : <?php echo $nompdt ?></li>
						<li>Catégorie : <?php echo $nomcat ?></li>
						<li>Quantité : <?php echo $achat['Quantite']?></li>
						<li>Expédié : <?php echo $achat['Expedition']?></li>
		<?php
			if ($achat ['Expedition'] == "Non") {
				?>
		<button
							onclick='document.location.href="Controleur/expcom.php?type=art&val=exp&id=<?php echo $achat['Id'] ?>" '>Expédier</button>
		<?php
			} else {
				?>
			<button
							onclick='document.location.href="Controleur/expcom.php?type=art&val=supexp&id=<?php echo $achat['Id'] ?>" '>Annuler
							l'expédition</button>
			<?php
			}
			?>
		
		
		
	</ul>
				</div>
	
	<?php
		}
		?>
</div>
		</div>
	</div>
<?php
	}
	
	?>

</div>
<script>


	function affich(val){

		if (document.getElementById(val).style.display == 'block'){
			document.getElementById(val).style.display = 'none';
		}
		else {
			document.getElementById(val).style.display = 'block';
		}
}
	
</script>
<?php
}
?>