<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titre ?></title>
	<link rel="stylesheet" href="style.css" type="text/css" />
	<meta charset="utf-8">
</head>
<body>
<div class ="header">
	

	<div class ="menu">
		<img src="logo.png">
		<ul>
			<li>Accueil</li>
			<li>Réglages</li>
			<li>Scénarios</li>
			<li>Statistiques</li>
			<li>Contact</li>
		</ul>
		
	</div>
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