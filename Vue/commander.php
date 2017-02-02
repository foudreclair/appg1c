<?php
$titre = "Domicile | Validation";
include 'Vue/gabarit.php';
session_start();

?>
<div class = "corps">
	<h1>Panier validé</h1>
	<h3>Merci de régler votre commande de <?php echo $_SESSION['prixtot'] ?> € par chèque à l'adresse : </h3>
	<h3>Votre commande sera alors envoyée.</h3>
</div>