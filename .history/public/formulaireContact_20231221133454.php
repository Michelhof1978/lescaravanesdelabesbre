<?php
    // Gestion de l'affichage des erreurs
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Clé privée reCAPTCHA 
    $config = include('./config/config.php');

    // Utilisation de la clé secrète reCAPTCHA
    $secretKey = $config['recaptcha_secret_key'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $champsManquants = array();

        // Vérifier que tous les champs sont remplis
        foreach (array("firstName", "email", "message", "g-recaptcha-response") as $champ) {
            if (!isset($_POST[$champ]) || empty($_POST[$champ])) {
                $champsManquants[] = $champ;
            }
        }

        if (!empty($champsManquants)) {
            echo "<div class='erreur-message'>Veuillez remplir tous les champs du formulaire. Les champs manquants sont : " . implode(', ', $champsManquants) . "</div>";
        } else {
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
            $result = file_get_contents($url, false, $context);
            $response = json_decode($result, true);

            if ($response['success']) {
                // Le CAPTCHA est valide = traitement du formulaire
                $message = "Message envoyé de :\n" .
                    "Nom : " . htmlspecialchars($_POST["firstName"]) . "\n" .
                    "Email : " . htmlspecialchars($_POST["email"]) . "\n" .
                    "Message : " . htmlspecialchars($_POST["message"]);

                $retour = mail("postmaster@lescaravanesdelabesbre.fr", htmlspecialchars($_POST["objet"]), $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));

                if ($retour) {
                    // Redirection vers une page de confirmation après la soumission du formulaire
                    echo '<script>window.location.replace("confirmationContactRenseignements.php");</script>';
                    exit();
                } else {
                    echo "<div class='erreur-message'>Une erreur est survenue lors de l'envoi du formulaire. Veuillez réessayer.</div>";
                }
            } else {
                // Le CAPTCHA est invalide, afficher un message d'erreur
                echo "<div class='erreur-message'>CAPTCHA invalide, veuillez réessayer.</div>";
            }
        }
    }
    <p

<h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index" id="contact"><strong>NOUS CONTACTER</strong></h4>

<form class="needs-validation" id="formulaire" novalidate action="#" method="POST">
    <fieldset class="mb-5 ms-2 me-2">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input name="firstName" type="text" id="firstName" class="form-control" placeholder="Prénom" required>
                            <label for="firstName" class="form-label"></label>
                            <div class="invalid-feedback">
                                Veuillez saisir votre prénom.
                            </div>
                        </div>
                    </div>
                    <!-- ... Autres champs du formulaire ... -->
                </div>
                <div class="form-outline mb-4">
                    <div class="input-group has-validation">
                        <input name="email" type="email" id="email" class="form-control " placeholder="Email" required>
                    </div>
                    <label for="email" class="form-label"></label>
                    <div class="invalid-feedback">
                        Veuillez saisir votre Email.
                    </div>
                </div>
                <!-- ... Autres champs du formulaire ... -->
                <div class="form-floating ">
                    <textarea name="message" class="form-control " id="message" required></textarea>
                    <label for="message">Message</label>
                    <div class="invalid-feedback">
                        Veuillez saisir votre message.
                    </div>
                </div>
                <div class="g-recaptcha m-4" data-sitekey="6Ld72FwnAAAAABXBamvH-_h6-dyX_phTGFlAWCgR"></div>
                <button type="submit" value="Valider" id="send-data" class="btn btn-primary btn-block mb-4 ">
                    Envoyez
                </button>
            </div>
        </div>
    </fieldset>
</form>


