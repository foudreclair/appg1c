<?php

	// Choix du contôleur
	if (! isset ( $_SESSION ["Id_User"] )) {
		include ("Controleur/login.php");
	} else {
		include ("Controleur/main.php");
	}