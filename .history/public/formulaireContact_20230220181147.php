


<?php
if (isset($_POST["message"])) {
$message = "Message envoye de :
Nom : ".$_POST["firstName"]."
Prenom : ".$_POST["lastName"]."
Telephone : ".$_POST["phoneNumber"]."
Email : ".$_POST["email"]."
Objet : ".$_POST["objet"]."
Message : ".$_POST["message"];

$retour = mail("isabelle.deschins@sfr.fr", $_POST["objet"], $message,"From:contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to:" . $_POST["email"]);

if ($retour) {
echo "<p>L'email a bien été envoyé</p>";
}
}
?>


