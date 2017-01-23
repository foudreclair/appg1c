<?php
$titre = "Domicile | Accueil";

session_start();
$contenu = "";
include 'gabarit.php';
//print_r($val);

?>


	
 <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

<div class='corps'>
	<h1>Bonjour <?php echo $_SESSION['mail'];if ($_SESSION['admin']=='1') {echo " Vous êtes l'administrateur";}?>!</h1>
	<?php
			if ($_SESSION['admin']=='1') {
				?>
				<li <?php activepage("accueil")?>><a href="index.php?page=admin">Administration</a></li>
			<?php
			}
			?>
	<h1><a href="index.php?page=deconnexion"><input type="submit" value="Se déconnecter"></h1></input></a>

	<h2>Consultez l'état de vos capteurs : </h2>
	<?php 
	foreach ($valscenar as $key => $val) {
	?>
	<div onmouseover='affich("<?php echo $nomscenar[$key] ?>")' onmouseout='disp("<?php echo $nomscenar[$key] ?>")'>
	<h2><?php echo $nomscenar[$key] ?> : </h2>
	<div id = "<?php echo $nomscenar[$key] ?>" style="display:none" class ="deroulant"> 
	<?php
	
	foreach ($val as $key => $value) {
	?>
	<div class = "capt">
	<ul>
		
		<li>Nom du capteur : <?php echo $val[$key]['Id_Capteur'] ?></li>
		<li>Pièce : <?php echo $val[$key]['Id_Pieces'] ?></li>
		<li>Type : <?php echo utf8_encode($val[$key]['Id_Fonctionnalite'][0])?></li>
		<p>Valeur demandée : </p>
		<form method = "post" action = "Controleur/modifications.php?id=<?php echo $val[$key]['Id'] ?>">
			<input type ="text" name = "consigne" placeholder = "<?php echo $val[$key]['Consigne'] ?>"><br>
			<input type = "submit" name = 'Modifier' value = "Modifier">
		</form>
		
	</ul>
	</div>
	<?php
	}
	
	?>
	</div>
	</div>
	<?php
	}

	?>

</div>
<script>
	document.getElementById("infos").style.visibility = "hidden";
	document.getElementById("infos").style.display = 'none';
	function affich(val){

		document.getElementById(val).style.display = 'block';
	}
	function disp(val){
		
		document.getElementById(val).style.display = 'none';
	}
</script>