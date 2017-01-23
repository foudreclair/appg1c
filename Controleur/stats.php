<?php

include('Modele/connexion_bdd.php');

$stattot=[];
$statnom =[];
$resultstattot = $mysqli->query("SELECT DISTINCT Type FROM Statistiques");
//print_r($resultstattot);
while ($statstot = $resultstattot ->fetch_array(MYSQLI_ASSOC)) {
	//print_r($statstot);
	$type = $statstot['Type'];
	$stat=[];
	array_push($statnom, $type);
	$resultstat = $mysqli->query("SELECT * FROM Statistiques WHERE Type = '$type' ");
	while ($stats = $resultstat ->fetch_array(MYSQLI_ASSOC)){
		array_push($stat, $stats['Valeur']);
	}
	array_push($stattot, $stat);
}

include 'Vue/stats.php';
?>