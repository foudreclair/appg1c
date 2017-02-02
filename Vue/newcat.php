<?php

?>
<h1 style="cursor:pointer" onclick = 'affich("nouvcat","Ajouter une catégorie","tnouvcat")' id = "tnouvcat">+ Ajouter une catégorie</h1>
<div style="display:none" id = 'nouvcat'>
<form action = "Controleur/newcat.php" method = "post">
	
	<p>Nom : </p>
	<input type="text" name="nom"></br>
	<p>Description : </p>
	<TEXTAREA name = "description"></TEXTAREA><br>

	<input type = "submit" value = "Valider" name = "valider">

</form>
</div>
<h1 style="cursor:pointer" onclick = 'affich("suppcat","Supprimer une catégorie","tsuppcat")' id = "tsuppcat">+ Supprimer une catégorie</h1>
<div style="display:none" id = 'suppcat'>
<form action = "Controleur/suppcat.php" method = "post">
	
	<p>Catégorie à supprimer : </p>
	<select id = "suppc" name = "suppc" onchange="valid()">
		<option value = "rien">--</option>
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

	<input id = "valsupp" type = "submit" value = "Valider" name = "valider">

</form>
</div>
<h1 style="cursor:pointer" onclick = 'affich("ajpdt","Ajouter un produit","tajpdt")' id = "tajpdt">+ Ajouter un produit</h1>
<div style="display:none" id = 'ajpdt'>
<form action = "Controleur/ajpdt.php" method = "post">
	
	<p>Dans quelle catégorie voulez-vous ajouter ce produit ?</p>
	<select id = "ajc" name = "ajc" onchange="valid2()">
		<option value = "rien">--</option>
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
	<p>Nom : </p>
	<input type="text" name="nomaj" id ="nomaj" oninput="valid2()"></br>
	<p>Description : </p>
	<TEXTAREA name = "descriptionaj"></TEXTAREA><br>
	<p>Prix : </p>
	<input type="number" name="eur" min="0" max="1000" step="5" value="00">
	<input type="number" name="cent" min="0" max="99" step="5" value="00"><br><br>
	<input id = "valaj" type = "submit" value = "Valider" name = "valider">

</form>
</div>
<script type="text/javascript">
document.getElementById("valaj").disabled="true";
document.getElementById("valsupp").disabled="true";
function valid2(){
	if (document.getElementById("ajc").value != "rien" && document.getElementById("nomaj").value != ""){
		document.getElementById("valaj").disabled="";
	}
	else {
		document.getElementById("valaj").disabled="true";
	}
}
function valid(){
	
	if (document.getElementById("suppc").value != "rien"){
		document.getElementById("valsupp").disabled="";
	}
	else {
		document.getElementById("valsupp").disabled="true";
	}
}
function affich(val,titre,id){
		
		if (document.getElementById(val).style.display == 'block'){
			document.getElementById(val).style.display = 'none';
			document.getElementById(id).innerHTML="+ "+titre;
		}
		else {
			document.getElementById(val).style.display = 'block';
			document.getElementById(id).innerHTML="- "+titre;
			
		}
	}
</script>