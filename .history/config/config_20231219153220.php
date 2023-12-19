<?php
// Clé privée reCAPTCHA 
$secretKey = "6Ld72FwnAAAAAOU6O1IpTRr1yVRvmLrv9T0tYZSJ";

if (isset($_POST["message"]) && isset($_POST['g-recaptcha-response'])) {
    // Vérifier le CAPTCHA
    $captchaResponse = $_POST['g-recaptcha-response'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => $secretKey,
        'response' => $captchaResponse,
        'remoteip' => $ip
    );
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);

    if ($response['success']) {
        // Le CAPTCHA est valide = traitement du formulaire
        $message = "Message envoyé de :\n" .
            "Nom : " . $_POST["firstName"] . "\n" .
            "Prénom : " . $_POST["lastName"] . "\n" .
            "Téléphone : " . $_POST["phoneNumber"] . "\n" .
            "Email : " . $_POST["email"] . "\n" .
            "Objet : " . $_POST["objet"] . "\n" .
            "Message : " . $_POST["message"];

        $retour = mail("postmaster@lescaravanesdelabesbre.fr", $_POST["objet"], $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . $_POST["email"]);

        if ($retour) {
            // Redirection vers une page de confirmation après la soumission du formulaire
            echo '<script>window.location.replace("confirmationContactResa.php");</script>'; //Obligé de le faire en js car en php, il ne revnvoi pas a la page de confirmation
            exit();
        } else {
            echo "Une erreur est survenue lors de l'envoi du formulaire. Veuillez réessayer.";
        }
    } else {
        // Le CAPTCHA est invalide, affichez un message d'erreur
        echo "CAPTCHA invalide, veuillez réessayer.";
    }
}
?>