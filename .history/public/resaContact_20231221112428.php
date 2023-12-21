<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Linking BoxIcon for Icon -->
    <!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <meta name="description" content="Vous souhaitez organiser un séjour au Parc d'Attractions le Pal à plusieurs, possibilité de louer nos 3 caravanes placées côte à côte.">
    <title>Réservation de Caravanes - Le Pal</title>
</head>

<body>

<?php include("header.php") ?>

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

            $retour = mail("postmaster@lescaravanesdelabesbre.fr", "Réservation de caravanes - Le Pal", $message, "From: contact@lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));

            if ($retour) {
                // Redirection vers une page de confirmation après la soumission du formulaire
                echo '<script>window.location.replace("confirmationReservation.php");</script>';
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

<h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index" id="contact"><strong>RÉSERVATION DE CARAVANES</strong></h4>

<form class="needs-validation" id="formulaire" novalidate action="#" method="POST">
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
                        <label for="phoneNumber" class="form-label">Téléphone</label>
                            <input name="phoneNumber" type="tel" id="phoneNumber" class="form-control" placeholder="Téléphone" required>
                            
                            <div class="invalid-feedback">
                                Veuillez saisir votre téléphone.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-outline mb-4">
                <label for="email" class="form-label">Adresse Email</label>
                    <div class="input-group has-validation">
                        <input name="email" type="email" id="email" class="form-control" placeholder="Email" required>
                    </div>
                    
                    <div class="invalid-feedback">
                        Veuillez saisir votre Email.
                    </div>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label round" for="nombreAdultes">Nombre d'adultes :</label>
                    <input name="nombreAdultes" type="number" id="nombreAdultes" class="form-control" placeholder="Indiquez le nombre d'adultes" required>
                    <div class="invalid-feedback">
                        Veuillez saisir le nombre d'adultes.
                    </div>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label round" for="nombreEnfants">Nombre d'enfants :</label>
                    <input name="nombreEnfants" type="number" id="nombreEnfants" class="form-control" placeholder="Indiquez le nombre d'enfants" required onchange="ajouterChampsDateNaissance()">
                    <div class="invalid-feedback">
                        Veuillez saisir le nombre d'enfants.
                    </div>
                </div>

                <div id="containerDatesNaissance" class="mb-4">
                    <h5 class="form-label round">Informations sur les enfants :</h5>
                    <div class="row">
                        <div class="col">
                            <label class="form-label" for="dateNaissanceEnfant1">Date de naissance enfant 1 :</label>
                            <input name="dateNaissanceEnfant1" type="date" id="dateNaissanceEnfant1" class="form-control" required>
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

                <div class="g-recaptcha m-4" data-sitekey="6Ld72FwnAAAAABXBamvH-_h6-dyX_phTGFlAWCgR"></div>

                <button type="submit" value="Valider" id="send-data" class="btn btn-primary btn-block mb-4">
                    Envoyez
                </button>
            </div>
        </div>
    </fieldset>
</form>

<?php include("footer.php") ?>

<script>
    // Fonction pour ajouter dynamiquement les champs de date de naissance des enfants
    function ajouterChampsDateNaissance() {
        const nombreEnfants = document.getElementById('nombreEnfants').value;
        const containerDatesNaissance = document.getElementById('containerDatesNaissance');

        // Supprime les champs de date de naissance existants
        containerDatesNaissance.innerHTML = '';

        // Ajoute les nouveaux champs en fonction du nombre d'enfants
        for (let i = 1; i <= nombreEnfants; i++) {
            const divRow = document.createElement('div');
            divRow.className = 'row mb-4';

            const divCol = document.createElement('div');
            divCol.className = 'col';

            const label = document.createElement('label');
            label.className = 'form-label';
            label.setAttribute('for', 'dateNaissanceEnfant' + i);
            label.innerText = 'Date de naissance enfant ' + i + ' :';

            const inputDate = document.createElement('input');
            inputDate.name = 'dateNaissanceEnfant' + i;
            inputDate.type = 'date';
            inputDate.id = 'dateNaissanceEnfant' + i;
            inputDate.className = 'form-control';
            inputDate.required = true;

            divCol.appendChild(label);
            divCol.appendChild(inputDate);
            divRow.appendChild(divCol);

            containerDatesNaissance.appendChild(divRow);
        }
    }
</script>
</body>

</html>
