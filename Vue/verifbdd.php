<?php
//echo "Mail : ". $_GET['mail'];
$mail = htmlentities($_GET['mail']);
include('../Modele/connexion_bdd.php');
$i = 0;
$result = $mysqli->query("SELECT * FROM Utilisateur WHERE Mail = '$mail'");
	while ($donnees = $result ->fetch_array(MYSQLI_ASSOC)){
		$i+=1;
	}
if ($i == 0){
	echo false;
}
else {
	echo true;
}
?>