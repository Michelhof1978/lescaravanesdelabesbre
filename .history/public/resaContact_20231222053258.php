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
    <title>Réservation hébergements - Le Pal</title>
</head>

<body>
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

                $retour = mail("michel.hof@hotmail.fr", htmlspecialchars($_POST["objet"]), $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));

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

    <div class="container">
        <form method="post" id="contactForm" class="mt-4">
            <h1 class="mb-4">Réservation caravanes - Le Pal</h1>

            <?php
            // Afficher le message d'erreur s'il y en a un
            if (!empty($error_message)) {
                echo '<div class="alert alert-danger">' . $error_message . '</div>';
            }
            ?>

            <div class="mb-3">
                <label for="objet" class="form-label">Objet de votre message</label>
                <select class="form-select" id="objet" name="objet" required>
                    <option value="" disabled selected>Sélectionnez un objet</option>
                    <option value="Réservation caravane">Réservation de caravane</option>
                    <option value="Autre demande">Autre demande</option>
                </select>
            </div>

            <div class="row g-2">
                <div class="col-md">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                    </div>
                </div>
                <div class="col-md">
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Téléphone</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="nombreAdultes" class="form-label">Nombre d'adultes</label>
                <input type="number" class="form-control" id="nombreAdultes" name="nombreAdultes" min="1" required>
            </div>

            <div class="mb-3">
                <label for="nombreEnfants" class="form-label">Nombre d'enfants</label>
                <input type="number" class="form-control" id="nombreEnfants" name="nombreEnfants" min="0" required>
            </div>

            <div class="mb-3">
                <label for="dateNaissanceEnfant1" class="form-label">Date de naissance du premier enfant</label>
                <input type="date" class="form-control" id="dateNaissanceEnfant1" name="dateNaissanceEnfant1" pattern="\d{4}-\d{2}-\d{2}" required>
            </div>

            <div class="mb-3">
                <label for="dateArrivee" class="form-label">Date d'arrivée</label>
                <input type="date" class="form-control" id="dateArrivee" name="dateArrivee" pattern="\d{4}-\d{2}-\d{2}" required>
            </div>

            <div class="mb-3">
                <label for="dateDepart" class="form-label">Date de départ</label>
                <input type="date" class="form-control" id="dateDepart" name="dateDepart" pattern="\d{4}-\d{2}-\d{2}" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <div class="g-recaptcha" data-sitekey="<?php echo $config['recaptcha_site_key']; ?>"></div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>

    <?php include("footer.php") ?>
    
    <!-- //Ajoute automatiquement date de naissance enfant à chaque fois que l'utilisateur ajoute un enfant -->
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

<script>
    const formulaire = document.getElementById('contactForm');

    // Vérifier que tous les champs obligatoires sont remplis
    function checkRequiredFields() {
        for (const champ of document.querySelectorAll('input[required]')) {
            if (champ.value === '') {
                // La date est invalide.
                event.preventDefault();
                champ.focus();
                alert('Veuillez remplir tous les champs obligatoires.');
                return false;
            }
        }
        return true;
    }

    // Vérifier que les dates sont au bon format
    function checkDates() {
        const dateRegex = new RegExp(/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/);

        for (const champ of document.querySelectorAll('input[pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"]')) {
            if (!dateRegex.test(champ.value)) {
                // La date est invalide.
                event.preventDefault();
                champ.focus();
                alert('Veuillez saisir une date valide.');
                return false;
            }
        }

        return true;
    }

    formulaire.addEventListener('submit', function () {
        // Vérifier les champs obligatoires.
        if (!checkRequiredFields()) {
            return;
        }

        // Vérifier les dates.
        if (!checkDates()) {
            return;
        }

        // Le formulaire est valide, il peut être soumis.
        formulaire.submit();
    });
</script>

<script>
    const recaptcha = document.getElementById('g-recaptcha-response');

    formulaire.addEventListener('submit', function () {
        // Obtenir la réponse du CAPTCHA.
        const captchaResponse = recaptcha.value;
        if (captchaResponse === '') {
            // L'événement est empêché, et une alerte est affichée.
            event.preventDefault();
            alert('Veuillez valider le CAPTCHA.');
            return;
        }

        // Vérifier la réponse du CAPTCHA.
        // Utiliser la bibliothèque jQuery pour effectuer une requête AJAX.
        $.ajax({
            // L'URL du service reCAPTCHA.
            url: 'https://www.google.com/recaptcha/api/siteverify',
            // Les données à envoyer à la requête.
            data: {
                // La clé secrète reCAPTCHA.
                secret: '6Ld72FwnAAAAABXBamvH-_h6-dyX_phTGFlAWCgR',
                // La réponse du CAPTCHA.
                response: captchaResponse
            },
            // La méthode de la requête.
            method: 'POST',
            // Le type de données attendu en réponse.
            dataType: 'json',
            // La fonction à exécuter en cas de succès.
            success: function (response) {
                // Si la réponse n'est pas valide, l'événement est empêché, et une alerte est affichée.
                if (!response.success) {
                    event.preventDefault();
                    alert('CAPTCHA invalide, veuillez réessayer.');
                    return;
                }

                // La réponse est valide, le formulaire peut être soumis.
                formulaire.submit();
            }
        });
    });
</script>

</body>

</html>