<?php
$titre = "Domisile | Statistiques";


include 'gabarit.php';
//print_r($stattot);
?>
<div class ="corps">
	<h1>Consultez vos dernières valeurs et statistiques :</h1><br>
<?php
foreach ($stattot as $key => $value) {


?>
<table>
	<tr>
		<th>Dernières valeurs : </th>
	</tr>
	<tr>
		<td><?php echo $value['0'] ?></td>
<?php
unset($value['0']);
foreach ($value as $key => $val) {
	?>
	<td><?php echo $val ?></td>
	<?php
}
?>
</tr>
</table><br><br><br>
<?php
}
?>
</div>