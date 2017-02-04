<?php

if (!empty($_GET['creer'])){
	include 'Vue/newscenario.php';
}
else {
	include 'voirscenario.php';
}

?>