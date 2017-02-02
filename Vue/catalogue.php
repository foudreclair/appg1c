<?php

$titre = "Domicile | Catalogue";
include 'Vue/gabarit.php';
include 'Modele/connexion_bdd.php';
if ($_SESSION['panier']==[]){
	$panier = "Pas d'articles dans le panier";
}
else {
	$panier = count($_SESSION['panier'])." article(s) dans votre panier";
}
//print_r($_SESSION['panier']);
?>

<div class = "corps">
	<?php
	if ($_SESSION['admin']=='1'){
		include 'Vue/newcat.php';
	}
	?>
	<h1>Bienvenue sur la page d'achats</h1>
	<button onclick='document.location.href="index.php?page=cmdclient" '>Voir mes commandes</button><br><br>
	<h3><?php echo $panier ?></h3>
	<?php

	if ($panier != "Pas d'articles dans le panier") {
		?>

	<form method = "post" action = "index.php?page=panier">
			<input type = "submit" name = 'commander' value = "Voir le panier"><br><br>
	</form>


		<?php
	}
	
?>

<p>Sélectionnez une catégorie</p>
<form action ="" method = "post" id ="categ">
<select id = "cat" name = "cat" onchange='document.getElementById("categ").submit()'>
		<option value = "rien">--</option>
		<option value = "tout">Tout</option>
	<?php
	include 'Modele/connexion_bdd.php';
	$req = $mysqli->query("SELECT * FROM categories");
	while ($don = $req ->fetch_array(MYSQLI_ASSOC)){
		?>
		<option value = "<?php echo $don['Id'] ?>"><?php echo $don['Nom'] ?></option>
		<?php
	}
	?>
	</select>
	</form>
	<br><br>

<?php
if (isset($_POST['cat'])){
	?>
	<!-- <h2>Catégorie : <?php echo $_POST['cat'] ?></h2> -->
	<?php

}

if (isset($_POST['cat']) && $_POST['cat']!="tout" && $_POST['cat']!="rien"){
	$idcat = $_POST['cat'];
$req = $mysqli->query("SELECT * FROM Catalogue WHERE Id_categorie = '$idcat'");
}
else {
	$req = $mysqli->query("SELECT * FROM Catalogue");
}
	while ($don = $req ->fetch_array(MYSQLI_ASSOC)){
		$cat = $don['Id_categorie'];
		$reqcat = $mysqli->query("SELECT * FROM categories WHERE Id = '$cat'");
		$cate = $reqcat ->fetch_array(MYSQLI_ASSOC);
		$catg = $cate['Nom'];
		
		
?>	

<div class = "capt">
	<ul>
		
		<li><?php echo $don['Nom'] ?></li>
		<li><?php echo $don['Description'] ?></li>
		<li>Catégorie : <?php echo $catg ?></li>
		<li>Prix : <?php echo $don['Prix'] ?> €</li>
		<form method = "post" action = "Controleur/achat.php?id=<?php echo $don['Id'] ?>">
			<li> Quantité : <input type="number" name="quant" min="0" max="100" step="1" value="0"></li><br>
			<input type = "submit" name = 'aj' value = "Ajouter au panier" >
		</form>
		
	</ul>
	</div>
<?php
}
?>
</div>

