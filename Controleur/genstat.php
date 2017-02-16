<?php
//echo date("Y-m-d h:i:s");
include '../Modele/connexion_bdd.php';
for ($i=0; $i < 50; $i++) { 
	$date = date("Y-m-d h:i:s");
	$rand1 = rand(15,25);
	$mysqli ->query("INSERT INTO `bdd`.`Statistiques` (`Id`, `Date`, `Type`, `Valeur`, `Id_Capteur`) VALUES (NULL, '$date', 'Degré', '$rand1', '48')");
	$rand2 = rand(5,125);
	$mysqli ->query("INSERT INTO `bdd`.`Statistiques` (`Id`, `Date`, `Type`, `Valeur`, `Id_Capteur`) VALUES (NULL, '$date', 'Lux', '$rand2', '49')");
	$rand3 = rand(15,25);
	$mysqli ->query("INSERT INTO `bdd`.`Statistiques` (`Id`, `Date`, `Type`, `Valeur`, `Id_Capteur`) VALUES (NULL, '$date', 'Degré', '$rand3', '51')");
	$rand4 = rand(15,25);
	$mysqli ->query("INSERT INTO `bdd`.`Statistiques` (`Id`, `Date`, `Type`, `Valeur`, `Id_Capteur`) VALUES (NULL, '$date', 'Degré', '$rand4', '41')");
	$rand5 = rand(15,25);
	$mysqli ->query("INSERT INTO `bdd`.`Statistiques` (`Id`, `Date`, `Type`, `Valeur`, `Id_Capteur`) VALUES (NULL, '$date', 'Degré', '$rand5', '42')");
	$rand6 = rand(15,25);
	$mysqli ->query("INSERT INTO `bdd`.`Statistiques` (`Id`, `Date`, `Type`, `Valeur`, `Id_Capteur`) VALUES (NULL, '$date', 'Degré', '$rand6', '43')");
	$rand7 = rand(5,125);
	$mysqli ->query("INSERT INTO `bdd`.`Statistiques` (`Id`, `Date`, `Type`, `Valeur`, `Id_Capteur`) VALUES (NULL, '$date', 'Lux', '$rand7', '44')");
	$rand8 = rand(30,80);
	$mysqli ->query("INSERT INTO `bdd`.`Statistiques` (`Id`, `Date`, `Type`, `Valeur`, `Id_Capteur`) VALUES (NULL, '$date', '%', '$rand8', '50')");
	sleep(1);
}
?>