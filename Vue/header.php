<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titre ?></title>
	<link rel="stylesheet" href="Vue/style.css" type="text/css" />
	<link rel="stylesheet" href="Vue/styleadg.css" type="text/css" />
	 <style>


</style>
	<meta charset="utf-8">
</head>
<body>
<div class ="header">
	

	<nav class ="menu">
		
		<ul id="menu_deroulant" >
			<img src="Vue/logo3.png">
			<li><a <?php activepage("accueil")?> href="index.php?page=accueil">Accueil</a></li>
			<li><a <?php activepage("reglages")?> href="index.php?page=reglages">Gérer ma maison</a></li>
			<li><a <?php activepage("scenarios")?> href="index.php?page=scenarios">Scénarios</a></li>
			<li><a <?php activepage("stats")?> href="index.php?page=stats">Statistiques</a></li>
			<li><a <?php activepage("catalogue")?> href="index.php?page=catalogue">Catalogue</a></li>
			<li><a <?php activepage("contact")?> href="index.php?page=contact">Contact</a></li>

		</ul>
		
	</nav>
	</div>
	
	<div class="sous_menu">
		<ul>
    	
		</ul>
	</div>

</div>