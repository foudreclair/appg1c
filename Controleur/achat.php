<?php

session_start();
if (!isset($_SESSION['panier'])){
	$_SESSION['panier']=[];
}
array_push($_SESSION['panier'],[$_GET['id'],$_POST['quant']]);
header("location:".  $_SERVER['HTTP_REFERER']);
?>
