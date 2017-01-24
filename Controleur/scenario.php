<?php

if (empty($_GET['voir'])){
	include 'Vue/newscenario.php';
}
else {
	include 'Vue/voirscenario.php';
}

?>