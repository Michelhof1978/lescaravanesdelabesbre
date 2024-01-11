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

<!-- HTML -->
<h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index" id="contact"><strong>NOUS CONTACTER</strong></h4>

<form class="needs-validation" id="myForm" onsubmit="return validateForm()" novalidate action="#" method="POST">
    <fieldset class="mb-5 ms-2 me-2">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label for="firstName" class="form-label">Prénom</label>
                            <input name="firstName" type="text" id="firstName" class="form-control" placeholder="Prénom" required>
                            <div class="invalid-feedback">
                                Veuillez saisir votre prénom.
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label for="lastName" class="form-label">Nom</label>
                            <input name="lastName" type="text" id="lastName" class="form-control" placeholder="Nom" required>
                            <div class="invalid-feedback">
                                Veuillez saisir votre nom.
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label for="phoneNumber" class="form-label">Numéro de Téléphone</label>
                            <input name="phoneNumber" type="tel" id="phoneNumber" class="form-control" placeholder="Téléphone" pattern="[0-9]{10,15}" required>
                            <div class="invalid-feedback">
                                Veuillez saisir un numéro de téléphone valide (au moins 10 chiffres).
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Adresse Email</label>
                    <div class="input-group has-validation">
                        <input name="email" type="email" id="email" class="form-control" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        <div class="invalid-feedback">
                            Veuillez saisir une adresse email valide.
                        </div>
                    </div>
                </div>
                <div class="form-floating">
                    <textarea name="message" class="form-control" id="message" required></textarea>
                    <label for="message">Message</label>
                    <div class="invalid-feedback">
                        Veuillez saisir votre message.
                    </div>
                </div>
                <div class="form-check mb-4 mt-3">
                    <input class="form-check-input" type="checkbox" id="rgpdCheckbox" name="rgpdCheckbox" required>
                    <label class="form-check-label" for="rgpdCheckbox">
                        J'accepte que mes données personnelles soient traitées conformément à la politique de confidentialité.
                    </label>
                    <div class="invalid-feedback" id="rgpdError" style="display: none;">
                        Vous devez accepter la politique de confidentialité.
                    </div>
                </div>
                <div class="g-recaptcha m-4" data-sitekey="6Ld72FwnAAAAABXBamvH-_h6-dyX_phTGFlAWCgR"></div>
                <div id="error-message" class="text-center text-danger mb-4"></div>
                <button type="submit" value="Valider" id="send-data" class="btn btn-primary btn-block mb-4">
                    Envoyer
                </button>
            </div>
        </div>
    </fieldset>
</form>
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

        // Validation des dates d'arrivée et de départ
        let dateArriveeInput = document.getElementById('dateArrivee');
        let dateDepartInput = document.getElementById('dateDepart');
        let dateArriveeValue = dateArriveeInput.value.trim();
        let dateDepartValue = dateDepartInput.value.trim();

        if (dateArriveeValue === '' || dateDepartValue === '') {
            alert('Les dates d\'arrivée et de départ ne peuvent pas être vides.');
            return false;
        }

        if (new Date(dateArriveeValue) > new Date(dateDepartValue)) {
            alert('La date de départ doit être ultérieure à la date d\'arrivée.');
            dateDepartInput.focus();
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
