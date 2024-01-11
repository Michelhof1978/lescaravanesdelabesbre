<?php
// Clé privée reCAPTCHA 
$config = include('./config/config.php');

// Utiliser la clé secrète reCAPTCHA
$secretKey = $config['recaptcha_secret_key'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["message"]) && isset($_POST['g-recaptcha-response'])) {
        // Validation du CAPTCHA
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
        $result = @file_get_contents($url, false, $context);

        if ($result === false) {
            // Gestion de l'erreur
            echo "Erreur lors de la vérification reCAPTCHA. Veuillez réessayer.";
            exit();
        }

        $response = json_decode($result, true);

        if ($response['success']) {
            // Le CAPTCHA est valide = traitement du formulaire
            $message = "Message envoyé de :\n" .
                "Nom : " . htmlspecialchars($_POST["firstName"]) . "\n" .
                "Prénom : " . htmlspecialchars($_POST["lastName"]) . "\n" .
                "Téléphone : " . htmlspecialchars($_POST["phoneNumber"]) . "\n" .
                "Email : " . htmlspecialchars($_POST["email"]) . "\n" .
                "Objet : " . htmlspecialchars($_POST["objet"]) . "\n" .
                "Message : " . htmlspecialchars($_POST["message"]);

            $object = "Renseignements";
            // $retour = mail("postmaster@lescaravanesdelabesbre.fr", "Renseignements", $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));
            $retour = mail("michel.hof@hotmail.fr", "Renseignements", $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));

            if ($retour) {
                // Redirection vers une page de confirmation après la soumission du formulaire
                echo '<script>window.location.replace("confirmationContactRenseignements.php");</script>';
                exit();
            } else {
                echo "Une erreur est survenue lors de l'envoi du formulaire. Veuillez réessayer.";
            }
        } else {
            // Le CAPTCHA est invalide, affichez un message d'erreur
            echo "CAPTCHA invalide, veuillez réessayer.";
        }
    }
}
?>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function validateForm() {
        // Validation de l'adresse e-mail
        let emailInput = document.getElementById('email');
        let emailValue = emailInput.value.trim();
        let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegex.test(emailValue)) {
            alert('Veuillez saisir une adresse email valide.');
            emailInput.focus();
            return false;
        }

        // Validation du numéro de téléphone
        let phoneNumberInput = document.getElementById('phoneNumber');
        let phoneNumberValue = phoneNumberInput.value.trim();
        let phoneRegex = /^[0-9]{10,15}$/;

        if (!phoneRegex.test(phoneNumberValue)) {
            alert('Veuillez saisir un numéro de téléphone valide (au moins 10 chiffres, chiffres uniquement).');
            phoneNumberInput.focus();
            return false;
        }


        // Validation du RGPD
        let rgpdCheckbox = document.getElementById('rgpdCheckbox');
        if (!rgpdCheckbox.checked) {
            alert('Vous devez accepter la politique de confidentialité.');
            rgpdCheckbox.focus();
            return false;
        }

        // Validation du reCAPTCHA
        let recaptchaResponse = grecaptcha.getResponse();
        if (recaptchaResponse.length == 0) {
            alert('Veuillez cocher le reCAPTCHA.');
            return false;
        }

        return true;
    }
</script>
