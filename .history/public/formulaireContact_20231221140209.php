<?php
// Clé privée reCAPTCHA 
$config = include('./config/config.php');

// Utiliser la clé secrète reCAPTCHA
$secretKey = $config['recaptcha_secret_key'];
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
    foreach (array("firstName", "lastName", "phoneNumber", "email", "nombreAdultes", "nombreEnfants", "dateNaissanceEnfant1", "dateArrivee", "dateDepart", "message", "g-recaptcha-response") as $champ) {
        if (!isset($_POST[$champ]) || empty($_POST[$champ])) {
            $champsManquants[] = $champ;
        }
    }

    if (!empty($champsManquants)) {
        echo "<div class='erreur-message'>Veuillez remplir tous les champs du formulaire. Les champs manquants sont : " . implode(', ', $champsManquants) . "</div>";
    } else {
        // Le reste du code pour la validation du CAPTCHA et le traitement du formulaire
    }
}
?>

?>

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


