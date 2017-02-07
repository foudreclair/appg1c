<?php
function genal(){
	$characts    = 'abcdefghijklmnopqrstuvwxyz';
    $characts   .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
	$characts   .= '1234567890'; 
	$code_aleatoire      = ''; 

	for($i=0;$i < 30;$i++)   
	{ 
        $code_aleatoire .= substr($characts,rand()%(strlen($characts)),1); 
        
	}
	return $code_aleatoire;
}
	
function gen(){
	$code = genal();
	include '../Modele/connexion_bdd.php';
	$reqexist = $mysqli ->query("SELECT * FROM Utilisateur WHERE KeyUser='$code'");
	$compte = 0;
	while ($exist = $reqexist ->fetch_array(MYSQLI_ASSOC)){
		$compte+=1;
	}
	while ($compte != 0){
		$code = genal();
		$reqexist = $mysqli ->query("SELECT * FROM Utilisateur WHERE KeyUser='$code'");
		$compte = 0;
		while ($exist = $reqexist ->fetch_array(MYSQLI_ASSOC)){
			$compte+=1;
		}
	}
	return $code;

}
//$code = gen();
//echo $code;
//echo $code_aleatoire; 
?>