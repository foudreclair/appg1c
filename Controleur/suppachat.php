<?php

unset($_SESSION['panier'][$_GET['key']]);
header("location:".  $_SERVER['HTTP_REFERER']);
?>
