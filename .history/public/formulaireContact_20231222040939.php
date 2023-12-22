

<?php
// Clé privée reCAPTCHA 
$config = include('./config/config.php');

// Utilisation de la clé secrète reCAPTCHA
$secretKey = $config['recaptcha_secret_key'];

// Section pour les messages d'erreur
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $champsManquants = array();

    // Vérifier que tous les champs sont remplis
    if (
        isset($_POST["firstName"]) &&
        isset($_POST["lastName"]) &&
        isset($_POST["phoneNumber"]) &&
        isset($_POST["email"]) &&
        isset($_POST["nombreAdultes"]) &&
        isset($_POST["nombreEnfants"]) &&
        isset($_POST["dateNaissanceEnfant1"]) &&
        isset($_POST["dateArrivee"]) &&
        isset($_POST["dateDepart"]) &&
        isset($_POST["message"]) &&
        isset($_POST['g-recaptcha-response'])
    ) {
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
            $message = "Réservation de caravanes au Parc d'Attractions Le Pal :\n" .
                "Nom : " . htmlspecialchars($_POST["firstName"]) . "\n" .
                "Prénom : " . htmlspecialchars($_POST["lastName"]) . "\n" .
                "Téléphone : " . htmlspecialchars($_POST["phoneNumber"]) . "\n" .
                "Email : " . htmlspecialchars($_POST["email"]) . "\n" .
                "Nombre d'adultes : " . htmlspecialchars($_POST["nombreAdultes"]) . "\n" .
                "Nombre Enfants : " . htmlspecialchars($_POST["nombreEnfants"]) . "\n" .
                "Date de naissance : " . htmlspecialchars($_POST["dateNaissanceEnfant1"]) . "\n" .
                "Date d'arrivée : " . htmlspecialchars($_POST["dateArrivee"]) . "\n" .
                "Date de départ : " . htmlspecialchars($_POST["dateDepart"]) . "\n" .
                "Message : " . htmlspecialchars($_POST["message"]);

            $retour = mail("michel.hof@hotmail.fr", "Réservation de caravanes - Le Pal", $message, "From: contact@lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));

            if ($retour) {
                // Redirection vers une page de confirmation après la soumission du formulaire
                header('Location: confirmationContactResa.php');
                exit();
            } else {
                $error_message = "Une erreur est survenue lors de l'envoi du formulaire. Veuillez réessayer.";
            }
        } else {
            // Le CAPTCHA est invalide, afficher un message d'erreur
            $error_message = "CAPTCHA invalide, veuillez réessayer.";
        }
    } else {
        // Les champs sont manquants, afficher un message d'erreur
        $champsManquants = array(
            "firstName",
            "lastName",
            "phoneNumber",
            "email",
            "nombreAdultes",
            "nombreEnfants",
            "dateNaissanceEnfant1",
            "dateArrivee",
            "dateDepart",
            "message",
            "g-recaptcha-response"
        );

        $error_message = "Veuillez remplir tous les champs du formulaire. Les champs manquants sont : " . implode(", ", $champsManquants);
    }
}
?>


<h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index" id="contact"><strong>NOUS CONTACTER</strong></h4>

<form class="needs-validation" id="formulaire" novalidate action="#" method="POST">
    <fieldset class="mb-5 ms-2 me-2">

        <div class="row d-flex justify-content-center">
            <div class="col-md-6">

                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">

                    <div class="col">
                        <div class="form-outline">
                            <input name="firstName" type="text" id="firstName" class="form-control" placeholder="Prénom" required />
                            <label for="firstName" class="form-label"></label>
                            <div class="invalid-feedback">
                                Veuillez saisir votre prénom.
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-outline">
                            <input name="lastName" type="text" id="lastName" class="form-control" placeholder="Nom" required />
                            <label for="lastName" class="form-label"></label>
                            <div class="invalid-feedback">
                                Veuillez saisir votre nom.
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <<div class="form-outline">
    <label for="phoneNumber" class="form-label">Numéro de Téléphone</label>
    <input name="phoneNumber" type="tel" id="phoneNumber" class="form-control" placeholder="Téléphone" pattern="[0-9]{10,}" required>
    <div class="invalid-feedback">
        Veuillez saisir un numéro de téléphone valide (au moins 10 chiffres).
    </div>
</div>

                    </div>

                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
    <label for="email" class="form-label">Adresse Email</label>
    <div class="input-group has-validation">
        <input name="email" type="email" id="email" class="form-control" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <div class="invalid-feedback">
            Veuillez saisir une adresse email valide.
        </div>
    </div>
</div>

                <!-- <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="objet" id="renseignements" value="Renseignements" checked>
        <label class="form-check-label" for="renseignements">Renseignements</label> -->


                <div class="form-floating ">
                    <textarea name="message" class="form-control " id="message" required></textarea>
                    <label for="message">Message</label>
                    <div class="invalid-feedback">
                        Veuillez saisir votre message.
                    </div>
                </div>

                <div class="g-recaptcha m-4" data-sitekey="6Ld72FwnAAAAABXBamvH-_h6-dyX_phTGFlAWCgR"></div>

                <!-- Section pour les messages d'erreur -->
                <div id="error-message" class="text-center text-danger mb-4"></div>


                <!-- Submit button -->
                <button type="submit" value="Valider" id="send-data" class="btn btn-primary btn-block mb-4 ">
                    Envoyez
                </button>

            </div>
        </div>
    </fieldset>
</form>

