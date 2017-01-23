<!DOCTYPE html>
<html lang="fr">
<head>
<title><?php echo $titre; //include('Vue/fonctions.php')?></title>
<!-- Bootstrap core CSS -->
<link href="Vue/css/bootstrap.min.css" rel="stylesheet">
<link href="Vue/css/style.css" rel="stylesheet">
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- jQuery -->
<script src="Vue/js/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="Vue/js/bootstrap.min.js"></script>


<!-- Bootstrap Core JavaScript -->
<script src="Vue/js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
</head>
<body>
	<div class="header">

		<nav class="navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#navbar" aria-expanded="false"
						aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php?page=connexion"><img
						width="200" height="30" src="Vue/logo2.png"></img></a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li <?php activepage("accueil")?>><a href="index.php?page=accueil">Accueil</a></li>
						<li <?php activepage("reglages")?>><a
							href="index.php?page=reglages">Reglages</a></li>
						<li <?php activepage("scenarios")?>><a
							href="index.php?page=scenarios">Scenarios</a></li>
						<li <?php activepage("stats")?>><a href="index.php?page=stats">Statistiques</a></li>
						<li <?php activepage("contact")?>><a href="index.php?page=contact">Contact</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
						<li class="dropdown navbar-right">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mon profil
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Editer mon profil</a></li>
          <li><a href="#">Se déconnecter</a></li>
        </ul>
      </li>
					</ul>

				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>

	</div>

	<div class="sous_menu">
		<ul>

		</ul>
	</div>