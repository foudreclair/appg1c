<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titre ?></title>
	<link rel="stylesheet" href="style.css" type="text/css" />
	<meta charset="utf-8">
</head>
<body>
<div class ="header">
	

	<nav class ="menu">
		<img src="logo.png">
		<ul>
			<li><a href="#">Accueil</a></li>
			<li><a href="#">Réglages</a></li>
			<li><a href="#">Scénarios</a></li>
			<li><a href="#">Statistiques</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
		
	</nav>
	</div>
	
	<div class="sous_menu">
		<ul>
		<?php foreach ($sous_menu as $ssmenu) {
		?>
			<li><?php echo $ssmenu ?></li>
		<?php
		}
		?>
		</ul>
	</div>

</div>

</body>
</html>