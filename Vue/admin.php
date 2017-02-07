<?php
$titre = "Domisep | Administration";
include 'Vue/gabarit.php';
?>
<div class="module3">
	<div class="module form-block">
		<h1>Cliquez pour supprimer :</h1>

	<?php
	foreach ( $tab as $key => $value ) {
		?>
			<div class="capt">
			<ul>
				<li>Id : <?php echo $tab[$key]['Id'] ?></li>
				<li>Nom : <?php echo $tab[$key]['Nom'] ?></li>
				<li>Prénom : <?php echo $tab[$key]['Prenom'] ?></li>
				<li>Date de naissance : <?php echo $tab[$key]['Date_naissance'] ?></li>
				<li>Adresse mail : <?php echo $tab[$key]['Mail'] ?></li>
				<br>
				<button
					onclick='supprimer("<?php echo $tab[$key]['Id'] ?>","<?php echo $tab[$key]['Nom'] ?>","<?php echo $tab[$key]['Prenom'] ?>")'>Supprimer
					le compte</button>
			</ul>
		</div>
		<?
	}
	?>
	</div>
</div>
<script>
function supprimer(id,nom,prenom){
	var c = confirm(id+nom+prenom);
	if (c==true){
		//var idsup = file('http://localhost:8888/appg1c/Vue/suppcompte.php?id='+id);
		document.location.href='http://localhost:8888/appg1c/Vue/suppcompte.php?id='+id;
	
	}
}
function file(fichier)
     {
     if(window.XMLHttpRequest) // FIREFOX
          xhr_object = new XMLHttpRequest();
     else if(window.ActiveXObject) // IE
          xhr_object = new ActiveXObject("Microsoft.XMLHTTP" );
     else
          return(false);
     xhr_object.open("GET", fichier, false);
     xhr_object.send(null);
     if(xhr_object.readyState == 4) return(xhr_object.responseText);
     else return(false);
 }
</script>