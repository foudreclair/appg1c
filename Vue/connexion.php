<?php
$titre = "Domisile | Page de connexion";
include 'gabarit.php';

?>

<?php

if (isset ( $_GET ["erreur"] )) {
	switch ($_GET ["erreur"]) {
		case 1 :
			echo 'Au moins un des champs est vide.';
			break;
		case 2 :
			echo "L'identifiant ou le mot de passe est incorrect.";
			break;
	}
}
if (isset ( $_GET ["page"] )) {
	if ($_GET ["page"] == "deconnexion") {
		echo 'Vous êtes désormais déconnecté.';
	}
}
?>

 <div class="container">
        <div class="card card-container">
      <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
	
		<form method="post"  class="form-signin" action="Controleur/connexion.php" id="con">
		<span id="reauth-email" class="reauth-email"></span>
			<input id="mail " type="text" name="mail"
				placeholder="Entrez votre email"
				onchange='validtext(this.value,"mailvalid")'> <label id="mailvalid"></label><br />
			<input type="password" name="password" placeholder="Mot de passe"><br>
			<br />
			<div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Se connecter</button>
			<a href="index.php?page=register"><button  name='register'type="button" class="btn btn-primary">Créer un compte</button></a>
		</form>
	</div>
</center>
	</header>
	
</div>
<script>
function isEmail(myVar){
     // La 1ère étape consiste à définir l'expression régulière d'une adresse email
     var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');

     return regEmail.test(myVar);
   }
function validtext(val,id){
	if (isEmail(val)) {
		
		var verif = file('http://localhost:80/appg1c/Vue/verifbdd.php?mail='+val);
		//document.getElementById(id).innerHTML = verif;
		if (verif !=0){
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
</script>