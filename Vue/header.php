<?php
require 'fonctions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titre ?></title>
	<link rel="stylesheet" href="Vue/style.css" type="text/css" />
	<meta charset="utf-8">
</head>
<body>
<div class ="header">
	

	<nav class ="menu">
		<img src="Vue/logo.png">
		<ul id="menu_deroulant">
			<li <?php activepage("accueil")?>><a href="index.php?page=accueil">Accueil</a></li>
			<li <?php activepage("reglages")?>><a href="index.php?page=reglages">Réglages</a></li>
			<li <?php activepage("scenarios")?>><a href="index.php?page=scenarios">Scénarios</a></li>
			<li <?php activepage("stats")?>><a href="index.php?page=stats">Statistiques</a></li>
			<li <?php activepage("contact")?>><a href="index.php?page=contact">Contact</a></li>
		</ul>
		
	</nav>
	</div>
	
	<div class="sous_menu">
		<ul>
    	
		</ul>
	</div>

</div>