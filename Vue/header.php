<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titre ?></title>
	 <!--   <link rel="stylesheet" href="Vue/style.css" type="text/css" /> -->
	 <style>

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #e7e7e7;
    background-color: #f3f3f3;
}

li {
    float: left;
}

li a {
    display: block;
    color: #666;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #ddd;
}

li a.active {
    color: white;
    background-color: #4CAF50;
}
</style>
	<meta charset="utf-8">
</head>
<body>
<div class ="header">
	

	<nav class ="menu">
		<img src="Vue/logo2.png">
		<ul id="menu_deroulant" >
			
			<li <?php activepage("accueil")?>><a href="index.php?page=accueil">Accueil</a></li>
			<li <?php activepage("reglages")?>><a href="index.php?page=reglages">Gérer ma maison</a></li>
			<li <?php activepage("scenarios")?>><a href="index.php?page=scenarios">Scénarios</a></li>
			<li <?php activepage("stats")?>><a href="index.php?page=stats">Statistiques</a></li>
			<li <?php activepage("catalogue")?>><a href="index.php?page=catalogue">Catalogue</a></li>
			<li <?php activepage("contact")?>><a href="index.php?page=contact">Contact</a></li>

		</ul>
		
	</nav>
	</div>
	
	<div class="sous_menu">
		<ul>
    	
		</ul>
	</div>

</div>