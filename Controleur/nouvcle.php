<?php
include '../Modele/connexion_bdd.php';
$cle = $_POST['cle'];
$perm = $_POST['permission'];
$req = $mysqli -> query("SELECT * FROM CleAct WHERE Cle = '$cle'");
$exist = 0;
while ($don = $req ->fetch_array(MYSQLI_ASSOC)){
	$exist +=1;
}
//echo $exist;
if ($exist !='0'){
	//echo "erreur";
	header('Location: ../index.php?page=cleactiv&erreur=Clé%20éxistante');
}
else {
	$mysqli ->query("INSERT INTO `bdd`.`CleAct` (`Id`, `Cle`, `Permission`, `Activee`) VALUES (NULL, '$cle', '$perm', 'Non')");
header('Location: ../index.php?page=cleactiv');
}


?>