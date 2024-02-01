<div class="row d-flex justify-content-center">
    <?php include("head.php"); ?>
    <meta name="description" content="Vous souhaitez organiser un séjour au Parc d'Attractions le Pal et vous avez besoins de renseignements complémentaires.">
    <title>Formulaire de Contact - Hébergement Le Pal</title>
</head>

<?php include("header.php"); ?>

<?php
// Clé privée reCAPTCHA
$config = include('./config/config.php');
$secretKey = $config['recaptcha_secret_key'];

// Initialiser le message d'erreur
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier que tous les champs sont remplis
    if (
        isset($_POST["nom"]) &&
        isset($_POST["prenom"]) &&
        isset($_POST["telephone"]) &&
        isset($_POST["email"]) &&
        isset($_POST["message"]) &&
        isset($_POST['g-recaptcha-response'])
    ) {
        // Validation du CAPTCHA
        $captchaResponse = $_POST['g-recaptcha-response'];
        
        $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify";
        $recaptchaData = [
            'secret' => $secretKey,
            'response' => $captchaResponse,
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($recaptchaData),
            ],
        ];

        $context = stream_context_create($options);
        $jsonResponse = file_get_contents($recaptchaUrl, false, $context);
        $recaptchaResult = json_decode($jsonResponse, true);

        if ($recaptchaResult['success']) {
            // Le CAPTCHA est valide = traitement du formulaire
            // (le reste du code ici reste inchangé)
        } else {
            // Le CAPTCHA est invalide, affichez un message d'erreur
            $error_message = "CAPTCHA invalide, veuillez réessayer.";
        }
    } else {
        // Les champs sont manquants, afficher un message d'erreur
        $error_message = "Veuillez remplir tous les champs du formulaire.";
    }
}
?>

<h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index" id="contact"><strong>DEMANDE DE RENSEIGNEMENTS</strong></h4>

<form class="needs-validation" id="myForm" onsubmit="return validateContactForm()" novalidate action="#" method="POST">
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

                    <!-- Ajoutez ici les autres champs du formulaire -->

                    <div class="form-check mb-4 mt-3">
                        <input class="form-check-input" type="checkbox" id="rgpdCheckbox" name="rgpdCheckbox">
                        <label class="form-check-label" for="rgpdCheckbox">
                            J'accepte que mes données personnelles soient traitées conformément à la politique de confidentialité.
                        </label>
                        <div class="invalid-feedback" id="rgpdError" style="display: none;">
                            Vous devez accepter la politique de confidentialité.
                        </div>
                    </div>

                    <div class="g-recaptcha m-4" data-sitekey="6Ld72FwnAAAAABXBamvH-_h6-dyX_phTGFlAWCgR"></div>

                    <button type="submit" value="Valider" id="send-data" class="btn btn-primary btn-block mb-4">
                        Envoyer
                    </button>
                </div>
            </div>
        </div>
    </fieldset>
</form>

<?php include("footer.php"); ?>

</body>
</html>
