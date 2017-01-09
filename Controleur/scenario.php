<?php

if (!empty($_GET['page'])){
	include 'Vue/newscenario.php';
}
else {
	include 'voirscenario.php';
}

?>