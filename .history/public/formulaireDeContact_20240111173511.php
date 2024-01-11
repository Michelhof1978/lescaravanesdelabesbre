<?php include("head.php") ?>
    <meta name="description" content="Vous souhaitez organiser un séjour au Parc d'Attractions le Pal à plusieurs, possibilité de louer nos 3 caravanes placées côte à côte.">
    <title>Réservation hébergements - Le Pal</title>
</head>

<?php include("header.php") ?>

<?php
// Clé privée reCAPTCHA 
$config = include('./config/config.php');

// Utiliser la clé secrète reCAPTCHA
$secretKey = $config['recaptcha_secret_key'];

// Initialiser le message d'erreur
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier que tous les champs sont remplis
    if (
        isset($_POST["firstName"]) &&
        isset($_POST["lastName"]) &&
        isset($_POST["phoneNumber"]) &&
        isset($_POST["email"]) &&
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
            $message = "Vous avez un nouveau message :\n" .
                "Nom : " . htmlspecialchars($_POST["firstName"]) . "\n" .
                "Prénom : " . htmlspecialchars($_POST["lastName"]) . "\n" .
                "Téléphone : " . htmlspecialchars($_POST["phoneNumber"]) . "\n" .
                "Email : " . htmlspecialchars($_POST["email"]) . "\n" .
                "Message : " . htmlspecialchars($_POST["message"]);
               
                $object = "Nouveau Message";
               // $retour = mail("postmaster@lescaravanesdelabesbre.fr", "Nouveau Message", $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));
                $retour = mail("michel.hof@hotmail.fr", "Nouveau Message", $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));

            if ($retour) {
                // Redirection vers une page de confirmation après la soumission du formulaire
                echo '<script>window.location.replace("confirmationContactRenseignements.php");</script>';
                exit();
            } else {
                $error_message = "Une erreur est survenue lors de l'envoi du formulaire. Veuillez réessayer.";
            }
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

<!-- HTML -->
<h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index" id="contact"><strong>NOUS CONTACTER</strong></h4>

<form class="needs-validation" id="myForm" onsubmit="return validateForm()" novalidate action="#" method="POST">    <fieldset class="mb-5 ms-2 me-2">

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
                    <div class="form-outline mb-4">
    <label for="phoneNumber" class="form-label">Numéro de Téléphone</label>
    <input name="phoneNumber" type="tel" id="phoneNumber" class="form-control" placeholder="Téléphone" pattern="[0-9]{10,15}" required>
    <div class="invalid-feedback">
        Veuillez saisir un numéro de téléphone valide (au moins 10 chiffres).
    </div>
                    </div>
                </div>

                <div class="form-outline mb-4">
    <label for="email" class="form-label">Adresse Email</label>
    <div class="input-group has-validation">
        <input name="email" type="email" id="email" class="form-control" placeholder="Email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|fr)$">
        <div class="invalid-feedback">
            Veuillez saisir une adresse email valide avec un domaine .com ou .fr.
        </div>
    </div>
</div>


                    <div class="form-floating ">
                        <textarea name="message" class="form-control " id="message" required></textarea>
                        <label for="message">Message</label>
                        <div class="invalid-feedback">
                            Veuillez saisir votre message.
                        </div>
                    </div>

                     <!-- Case à cocher RGPD -->
    <div class="form-check mb-4 mt-3">
        <input class="form-check-input" type="checkbox" id="rgpdCheckbox">
        <label class="form-check-label" for="rgpdCheckbox">
            J'accepte que mes données personnelles soient traitées conformément à la politique de confidentialité.
        </label>
        <div class="invalid-feedback" id="rgpdError" style="display: none;">
            Vous devez accepter la politique de confidentialité.
        </div>
    </div>

                    <div class="g-recaptcha m-4" data-sitekey="6Ld72FwnAAAAABXBamvH-_h6-dyX_phTGFlAWCgR"></div>

                    <button type="submit" value="Valider" id="send-data" class="btn btn-primary btn-block mb-4">
                        Envoyez
                    </button>
                </div>
            </div>
        </fieldset>
    </form>



    <?php include("footer.php") ?>

    <!-- FORMULAIRE DE CONTACT + FORMULAIRE RESA -->
<!-- //Ajoute automatiquement date de naissance enfant à chaque fois que l'utilisateur ajoute un enfant -->
<!-- //restriction champs formulaire -->
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
    function validateForm() {
    var phoneNumberInput = document.getElementById("phoneNumber");
    var phoneNumberValue = phoneNumberInput.value;

    // Vérifier si la valeur du numéro de téléphone contient uniquement des chiffres
    var phoneRegex = /^[0-9]+$/;

    if (!phoneRegex.test(phoneNumberValue)) {
        alert("Veuillez saisir uniquement des chiffres pour le numéro de téléphone.");
        return false;
    }

    return true;
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


</body>

</html>