<!DOCTYPE html>
<html>
<head>
<title><?php echo $titre ?></title>
<link rel="stylesheet" href="Vue/style.css" type="text/css" />
<link rel="stylesheet" href="Vue/stylead.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="Vue/dropit.js"></script>
<link rel="stylesheet" href="Vue/dropit.css" type="text/css" />
<meta charset="utf-8">
</head>
<body>
	<div class="header">
		<nav class="menu">
			<ul id="menu_deroulant">
				<img src="Vue/logo2.png">
				<li><a <?php activepage("accueil")?> href="index.php?page=accueil">Accueil</a></li>
				<li><a <?php activepage("reglages")?> href="index.php?page=reglages">Gérer
						ma maison</a></li>
				<li><a <?php activepage("scenarios")?>
					href="index.php?page=scenarios">Scénarios</a></li>
				<li><a <?php activepage("stats")?> href="index.php?page=stats">Statistiques</a></li>
				<li><a <?php activepage("catalogue")?>
					href="index.php?page=catalogue">Catalogue</a></li>
				<li><a <?php activepage("contact")?> href="index.php?page=contact">Contact</a></li>
			<?php if (isset($_SESSION['id'])) {?>
			<div class="nav-right">
					<img src="Vue/user2.svg" style="padding-top:0;width=30px;height=30px;"></img>
					<div class="nav-right2">
						<ul class="dropit">
							<li class="dropit-trigger dropit-open"><a href="#"><?php echo $_SESSION['prenom']; ?></a>
								<ul class="dropit-submenu">
									<li><a href="#">Modifier mon profil</a></li>
									<li><a href="#">Se déconnecter</a></li>
								</ul></li>
						</ul>
				</div>
				</div>
			<?php }?>
		</ul>
		</nav>
	</div>
	</div>
<script>
$(document).ready(function() {
    $('.menu').dropit();
});</script>
	</div>
