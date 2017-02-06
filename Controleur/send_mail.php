<?php
require_once('PHPMailer/_lib/class.phpmailer.php');
define('GMailUSER', 'isepg1c2016@gmail.com'); // utilisateur Gmail
define('GMailPWD', 'sucemabite'); // Mot de passe Gmail


function smtpMailer($to, $from, $from_name, $subject, $body) {
	$mail = new PHPMailer();  // Cree un nouvel objet PHPMailer
	$mail->IsSMTP(); // active SMTP
	$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
	$mail->SMTPAuth = true;  // Authentification SMTP active
	$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = GMailUSER;
	$mail->Password = GMailPWD;
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		return 'Mail error: '.$mail->ErrorInfo;
	} else {
		return true;
	}
}

$reglages = smtpmailer('isepg1c2016@gmail.com', 'isepg1c2016@gmail.com', 'Cocoricode', 'Premier mail envoyer depuis notre site !', 'Cocoricode');
echo $reglages;

?>
