<?php
$titre = "Domisile | Page de connexion";
include 'gabarit.php';

if (isset ( $_GET ["erreur"] )) {
	switch ($_GET ["erreur"]) {
		case 1 :
			$erreur = 'Au moins un des champs est vide.';
			break;
		case 2 :
			$erreur = "L'identifiant ou le mot de passe est incorrect.";
			break;
	}
}
if (isset ( $_GET ["page"] )) {
	if ($_GET ["page"] == "deconnexion") {
		$erreur = 'Vous êtes désormais déconnecté.';
	}
}
?>
<link rel="stylesheet"
	href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
<!-- Form Module-->
<div class="module2">
	<div class="module form-module">
		<div class="toggle">
			<div class="tooltip">S'enrengistrer</div>
		</div>
		<h2>Se connecter</h2>
			<?php
			
if (isset ( $erreur )) {
				echo '<font color="red">' . $erreur . '</font>';
			}
			?>
			<form method="post" action="Controleur/connexion.php" id="con">
			<label id="mailvalid"></label><br> <input id="mail " type="text"
				name="mail" placeholder="Entrez votre email"
				onchange='validtext(this.value,"mailvalid")'> <input type="password"
				name="password" placeholder="Mot de passe"><br>
			<button type="submit" name='connexion'>Se connecter</button>
		</form>
	</div>
	<div class="form">
		<h2>Create an account</h2>
		<form method="post" action="Controleur/register.php"
			enctype="multipart/form-data" id="register">
			<div>
				<label for="mail">Mail : </label><input name="mail" type="text"
					id="mail" onchange='validmail(this.value)'><label
					style="color: red" id="errmail"></label><br />
			</div>
			<div id="password">
				<label for="password">Mot de Passe : </label><input type="password"
					name="password" oninput='validmdp(this.value)' id="pass" /><label
					style="color: red" id="errmdp"></label><br />
			</div>
			<div id="confirm">
				<label for="confirm">Confirmer le mot de passe : </label><input
					type="password" name="confirm" oninput='validmdp2(this.value)' /><label
					style="color: red" id="errmdp2"></label>
			</div>

			<div id="infos">
				<label>Vos informations</label> <label for="Nom">Nom : </label><input
					name="nom" type="text" id="nom" /><br /> <label for="Prenom">Prenom
					: </label><input name="prenom" type="text" id="prenom" /><br /> <label
					for="Date_naissance">Date de naissance : </label><input type="text"
					id="datepicker" name="datepicker"><br />
			</div>
			<br>
			<button id="sub" type="submit">S'inscrire</button>
		</form>
	</div>
</div>

<!--  Javascript pour le form -->

<script
	src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
function isEmail(myVar){
     // La 1Ã¨re Ã©tape consiste Ã  dÃ©finir l'expression rÃ©guliÃ¨re d'une adresse email
     var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');

     return regEmail.test(myVar);
   }
function validtext(val,id){
	if (isEmail(val)) {
		
		var verif = file('ht	p://localhost:80/appg1c/Vue/verifbdd.php?mail='+val);
		//document.getElementById(id).innerHTML = verif;
		if (verif){
			document.getElementById(id).innerHTML = "Email correct ! ";
		}
		else{
			document.getElementById(id).innerHTML = "Email inexistant !"+verif;
		}
	}
	else {
		document.getElementById(id).innerHTML = "Email invalide !";
	}

}

function validform(){
	var mail = document.getElementById("mail");
	if (isEmail(mail)){
		document.getElementById("con").submit();
	}

}
function file(fichier)
     {
     if(window.XMLHttpRequest) // FIREFOX
          xhr_object = new XMLHttpRequest();
     else if(window.ActiveXObject) // IE
          xhr_object = new ActiveXObject("Microsoft.XMLHTTP" );
     else
          return(false);
     xhr_object.open("GET", fichier,false );
     xhr_object.send(null);
     if(xhr_object.readyState == 4) return(xhr_object.responseText);
     else return(false);
     }

//Toggle Function
$('.toggle').click(function(){
  $(this).children('i').toggleClass('fa-pencil');
  $('.form').animate({
    height: "toggle",
    'padding-top': 'toggle',
    'padding-bottom': 'toggle',
    opacity: "toggle"
  }, "slow");
});
//Javascript Register
setInterval("validform()", 1000);
document.getElementById("sub").disabled = "true";
document.getElementById("infos").style.visibility = "hidden";
document.getElementById("infos").style.display = 'none';
document.getElementById("password").style.visibility = "hidden";
document.getElementById("password").style.display = 'none';
document.getElementById("confirm").style.visibility = "hidden";
document.getElementById("confirm").style.display = 'none';
//document.getElementById("sub").style.visibility = "hidden";
//document.getElementById("sub").style.display = 'none';
valmail = false;
valmdp = false;
valmdp2 = false;
function IsMail(Mail)
{
var regExpression= /^[a-zA-Z0-9_}{+\-_]+(\.[a-zA-Z0-9_}{+\-_]+)*@[a-zA-Z0-9\-\.]*[a-zA-Z0-9](\.[a-zA-Z0-9\.\-]*[a-zA-Z0-9\.])*[\.][a-zA-Z]{2,4}$/;
var result = regExpression.test(Mail);
return result;
}
function valid(val) {
		document.getElementById(val).style.visibility = "visible";
    	document.getElementById(val).style.display = 'block';
}
function unvalid(val) {
	if (val == 'infos'){
		document.getElementById(val).style.visibility = "hidden";
    	document.getElementById(val).style.display = 'none';
	}
	else {
		document.getElementById(val).style.visibility = "hidden";
    	document.getElementById(val).style.display = 'none';
		document.getElementById(val).value= '';
	}
		
}
function validmail(val) {
	
	if (IsMail(val)){
		var verif = file('http://localhost:80/appg1c/Vue/verifbdd.php?mail='+val);
		if (verif !=0){
			document.getElementById("errmail").innerHTML="Email existant ! ";
			unvalid("password");
		}
		else {
			
			document.getElementById("errmail").innerHTML="Email valide !"+verif;
			valmail = true;
			valid("password");
		}
		
	}
	else {
		document.getElementById("errmail").innerHTML="Email invalide !";
		unvalid("password");
	}
}
function validmdp(val) {
	if (val.length > 7){
		valid("confirm");
		valmdp = true;
		document.getElementById("errmdp").innerHTML="";
	}
	else {
		document.getElementById("errmdp").innerHTML="Mot de passe trop court !";
		unvalid("confirm");
	}
}
function validmdp2(val) {
	var mdp = document.getElementById('pass').value;
	if (val == mdp){
		document.getElementById("errmdp2").innerHTML="";
		valid("infos");
		//valid("sub");
		valmdp2 = true;
	}
	else {
		document.getElementById("errmdp2").innerHTML="Erreur de mot de passe";
		unvalid("infos");
		//unvalid("sub");
	}
}
function validform(){
	var nom = document.getElementById('nom').value;
	var prenom = document.getElementById('prenom').value;
	var date = document.getElementById('datepicker').value;
	if (valmail == true && valmdp == true && valmdp2 ==true && nom != '' && prenom != '' && date != '') {
		document.getElementById("sub").disabled = "";
	}
}
function file(fichier) {
	     {
     if(window.XMLHttpRequest) // FIREFOX
          xhr_object = new XMLHttpRequest();
     else if(window.ActiveXObject) // IE
          xhr_object = new ActiveXObject("Microsoft.XMLHTTP" );
     else
          return(false);
     xhr_object.open("GET", fichier,false);
     xhr_object.send(null);
     if(xhr_object.readyState == 4) return(xhr_object.responseText);
     else return(false);
     }
}
</script>

<?php include 'Vue/footer.php'?>