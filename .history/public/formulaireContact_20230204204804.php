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




<?php
if(isset($_POST['submit'])) {
  $to = "michel.hof@hotmail.fr";
  $subject = "Nouveau message à partir du formulaire de contact";
  $message = "Nom : " . $_POST['firstname'] ;
             "Prénom: " . $_POST['lastname'] ;
             "Téléphone : " . $_POST['phoneNumber'] ;
             "Email : " . $_POST['email'] ;
             "Objet : " . $_POST['objet'];
             "Message : " . $_POST['message'];
  $headers = "From: " . $_POST['email'];
  mail($to, $subject, $message, $headers);
  echo "Votre message a été envoyé avec succès";
}
?>