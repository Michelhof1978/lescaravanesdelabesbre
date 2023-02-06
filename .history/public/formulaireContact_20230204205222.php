<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nom = $_POST["nom"];
	$email = $_POST["email"];
	$message = $_POST["message"];

	$to = "destinataire@exemple.com";
	$subject = "Nouveau message de $nom";
	$txt = "Nom : $nom\n\nEmail : $email\n\nMessage : $message";
	$headers = "From: $email" . "\r\n" .
	"CC: michel.hof@hotmail.fr";

	mail($to,$subject,$txt,$headers);

	echo "Message envoyé!";
}

?>




