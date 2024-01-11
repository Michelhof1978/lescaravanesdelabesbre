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
               
                $object = "Nouvelle reservation";
                // $retour = mail("postmaster@lescaravanesdelabesbre.fr", "Nouvelle reservation", $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));
                $retour = mail("michel.hof@hotmail.fr", "Nouvelle reservation", $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));

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

    
 
<h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index" id="contact"><strong>RÉSERVATION DE CARAVANES</strong></h4>

<form class="needs-validation" id="formulaire" novalidate action="#" method="POST" onsubmit="return validateForm();">
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
                    <div class="form-outline mb-4">
    <label for="phoneNumber" class="form-label">Numéro de Téléphone</label>
    <input name="phoneNumber" type="tel" id="phoneNumber" class="form-control" placeholder="Téléphone" pattern="[0-9]{15,}" required>
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



<div class="form-outline mb-4">
    <label class="form-label round" for="nombreAdultes">Nombre d'adultes :</label>
    <input name="nombreAdultes" type="number" id="nombreAdultes" class="form-control" placeholder="Indiquez le nombre d'adultes" required min="0">
    <div class="invalid-feedback">
        Veuillez saisir un nombre d'adultes valide.
    </div>
</div>

<div class="form-outline mb-4">
    <label class="form-label round" for="nombreEnfants">Nombre d'enfants :</label>
    <input name="nombreEnfants" type="number" id="nombreEnfants" class="form-control" placeholder="Indiquez le nombre d'enfants" required min="0" onchange="ajouterChampsDateNaissance()">
    <div class="invalid-feedback">
        Veuillez saisir un nombre d'enfants valide.
    </div>
</div>


                    <div id="containerDatesNaissance" class="mb-4">
                        <h5 class="form-label round">Informations sur les enfants :</h5>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="dateNaissanceEnfant1">Date de naissance enfant 1 :</label>
                                <input name="dateNaissanceEnfant1" type="date" id="dateNaissanceEnfant1" class="form-control" required>
                                <div class="invalid-feedback">
                                    Veuillez saisir la date de naissance de l'enfant.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label round" for="dateArrivee">Date d'arrivée :</label>
                        <input name="dateArrivee" type="date" id="dateArrivee" class="form-control" required>
                        <div class="invalid-feedback">
                            Veuillez sélectionner la date d'arrivée.
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label round" for="dateDepart">Date de départ :</label>
                        <input name="dateDepart" type="date" id="dateDepart" class="form-control" required>
                        <div class="invalid-feedback">
                            Veuillez sélectionner la date de départ.
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

  
 <!-- //Ajoute automatiquement date de naissance enfant à chaque fois que l'utilisateur ajoute un enfant -->
<!-- //restriction champs formulaire -->
Pour empêcher l'envoi du formulaire lorsque le numéro de téléphone comporte des lettres, vous pouvez modifier la fonction `validateForm()` dans la section `<script>` de la page. Voici une version modifiée qui vérifie si le numéro de téléphone ne contient que des chiffres :

```javascript
function validateForm() {
    // Validation de l'adresse e-mail
    var emailInput = document.getElementById('email');
    var emailValue = emailInput.value.trim();
    // Expression régulière pour valider l'adresse e-mail avec plusieurs domaines
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|fr|net|org|eur)$/;

    if (!emailRegex.test(emailValue)) {
        alert('Veuillez saisir une adresse email valide avec un domaine .com, .fr, .net, .org, ou .eur.');
        emailInput.focus();
        return false;
    }

    // Validation du numéro de téléphone
    var phoneNumberInput = document.getElementById('phoneNumber');
    var phoneNumberValue = phoneNumberInput.value.trim();

    // Vérification si la valeur du numéro de téléphone contient uniquement des chiffres
    var phoneRegex = /^[0-9]+$/;
    if (!phoneRegex.test(phoneNumberValue)) {
        alert('Veuillez saisir un numéro de téléphone valide (chiffres uniquement).');
        phoneNumberInput.focus();
        return false;
    }

    // Expression régulière pour valider le numéro de téléphone (au moins 10 chiffres)
    var phoneLengthRegex = /^[0-9]{10,15}$/;

    if (!phoneLengthRegex.test(phoneNumberValue)) {
        alert('Veuillez saisir un numéro de téléphone valide (au moins 10 chiffres).');
        phoneNumberInput.focus();
        return false;
    }

    // Validation des dates d'arrivée et de départ
    var dateArriveeInput = document.getElementById('dateArrivee');
    var dateDepartInput = document.getElementById('dateDepart');
    var dateArriveeValue = dateArriveeInput.value.trim();
    var dateDepartValue = dateDepartInput.value.trim();

    if (new Date(dateArriveeValue) > new Date(dateDepartValue)) {
        alert('La date de départ doit être ultérieure à la date d\'arrivée.');
        dateDepartInput.focus();
        return false;
    }

    // Validation du RGPD
    var rgpdCheckbox = document.getElementById('rgpdCheckbox');
    if (!rgpdCheckbox.checked) {
        alert('Vous devez accepter la politique de confidentialité.');
        return false;
    }

    return true;
}
```

Avec cette version, le formulaire ne sera soumis que si le numéro de téléphone est composé uniquement de chiffres.
</body>

</html>