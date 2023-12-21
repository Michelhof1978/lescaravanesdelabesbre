<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <style>
        .erreur-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php
    // Clé privée reCAPTCHA 
    $config = include('./config/config.php');

    // Utiliser la clé secrète reCAPTCHA
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

                $retour = mail("michel.hof@hotmail.fr", htmlspecialchars($_POST["objet"]), $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));
                // postmaster@lescaravanesdelabesbre.fr
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tZ1a9oSTXDA8ZlfbkYbNI2aIb6HH/lMx2ElEY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
