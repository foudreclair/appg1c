<?php include ('../modele/connexion_bdd.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titre ?></title>
	<link rel="stylesheet" href="stylehome.css" type="text/css" />
	<meta charset="utf-8">
</head>
<body>
	<div class="left_bloc">
		<h3> Ma consommation </h3>
		<p> <?php echo $graph_consoelec ?> </p>
		<p> <?php echo $graph_temperature ?> </p> 
	</div>
	<div class="right_bloc">
		<h3>Etat de mon système</h3>
		<p> Etat alarme <?php echo $etat_alarme ?>  </p>
		<h4>Température</h4>
		<p> <?php echo $all_temperatures ?> </p>
		<h4>Lumière</h4>
		<p> <?php echo $all_lumieres ?> </p>
	</div>



</body>
</html>