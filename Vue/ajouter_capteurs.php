<?php
require ('../Controleur/traitement.php');

?>

<body>
	<h2> Choisir le nombre de capteurs dans la pièce </h2>
		<form method="post" action="../Controleur/traitement.php">
			<input type="number" name="nombre_capteurs" id="nombre_capteurs">
			<input type="hidden" name="declencheur" id="declencheur" value="3">
			<input type="submit" name="valider">
		</form>
</body>

<?php include 'footer.php' ?>
