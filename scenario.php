<?php

if (empty($_GET['voir'])){
	include 'Vue/newscenario.php';
}
else {
	include 'voirscenario.php';
}

?>