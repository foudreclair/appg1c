<?php
$titre = "Domisep | Mon panier";
include 'gabarit.php';
include 'Modele/connexion_bdd.php';

?>
<div class ="module3">
<div class ="form form-block">
	<h1>Votre panier : </h1>
	<h2>Articles : </h2>
	<div class = "panier">
		<p>Nom</p>
		<p>Quantité</p>
		<p>Prix</p>
		<p>Prix total</p>
		<p></p>
	</div>
	<?php
	$total = 0;
	foreach ($_SESSION['panier'] as $key => $value) {
		$pdt = $value['0'];
		$req = $mysqli->query("SELECT * FROM Catalogue WHERE Id = '$pdt'");
		while ($don = $req->fetch_array(MYSQLI_ASSOC)){
			$prix = str_replace(',', '.', $don['Prix']);
			//echo floatval($prix);
			
			$cattotal = $prix * $value['1'];
			//echo $cattotal;
			$total +=$cattotal;
			?>
			<div class = "panier">
				<p><?php echo $don['Nom'] ?></p>
				<p><?php echo $value['1'] ?></p>
				<p><?php echo $don['Prix'] ?> €</p>
				<p><?php echo str_replace('.', ',', $cattotal) ?> €</p>
				<p><a href="Controleur/suppachat.php?key=<?php echo $key ?>">Supprimer</a></p>
			</div>
			<?php			
		}
	}
	?>
	<br>
	<br>
	<h2>Bilan : </h2>
	<div class = "panier">
		<p><?php echo count($_SESSION['panier'])." article(s)" ?></p>
		<p></p>
		<p></p>
		<p><?php echo $total ?> €</p>
	</div>
	<br>
	<br>
	<form action = "Controleur/commander.php" method = "post">
		<h3>Adresse de livraison : </h3>
		<input type = "text" name = "adresse" placeholder= "Adresse">
		<input type = "text" name = "CodePostal" placeholder= "Code Postal">
		<input type = "text" name = "ville" placeholder= "Ville">
		<input type = "submit" name = "commander" value = "Valider et commander">
	</form>
</div>
</div>
<?php
$_SESSION['prixtot']=$total;
?>
