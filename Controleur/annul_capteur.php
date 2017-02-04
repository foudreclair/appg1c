<?php

session_start();
unset($_SESSION['app']);
unset($_SESSION['pie']);
header('Location:../index.php?page=reglages');
?>