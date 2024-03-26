<?php include("head.php") ?>
<meta name="description" content="Vous souhaitez organiser un séjour au Parc d'Attractions le Pal à plusieurs, possibilité de louer nos 3 caravanes placées côte à côte.">
<title>Réservation hébergements - Le Pal</title>
</head>

<?php include("header.php") ?>

<?php
// Clé privée reCAPTCHA Dossier .gitignore, pas besoins de mettre le nom du dossier 
$config = include('./config/config.php');

// Utiliser la clé secrète reCAPTCHA
$secretKey = $config['recaptcha_secret_key'];

// Initialiser le message d'erreur
$error_message = '';

$rgpdAccepted = false;
$cgvAccepted = false;

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
        isset($_POST['g-recaptcha-response']) &&
        isset($_POST['rgpdCheckbox']) &&
        isset($_POST['cgvCheckbox'])
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
            // Validation du RGPD et des CGV
            if ($_POST['rgpdCheckbox'] === 'on' && $_POST['cgvCheckbox'] === 'on') {
                $rgpdAccepted = true;
                $cgvAccepted = true;
            } else {
                $rgpdAccepted = false;
                $cgvAccepted = false;
            }

            // Récupérer le nombre d'adultes
$nombreAdultes = isset($_POST["nombreAdultes"]) ? intval($_POST["nombreAdultes"]) : 0;

// Récupérer le nombre d'enfants
$nombreEnfants = isset($_POST["nombreEnfants"]) ? intval($_POST["nombreEnfants"]) : 0;

// Vérifier que le nombre d'adultes et le nombre d'enfants ne sont pas en dessous de 0
if ($nombreAdultes < 0) {
    $nombreAdultes = 0;
}

if ($nombreEnfants < 0) {
    $nombreEnfants = 0;
}

// Modifie le message pour inclure l'information sur l'acceptation des RGPD et des CGV
$message = "Une Nouvelle Réservation a été effectuée :\n \n" .
    "Nom : " . htmlspecialchars($_POST["firstName"]) . "\n \n" .
    "Prénom : " . htmlspecialchars($_POST["lastName"]) . "\n \n" .
    "Téléphone : " . htmlspecialchars($_POST["phoneNumber"]) . "\n \n" .
    "Email : " . htmlspecialchars($_POST["email"]) . "\n \n" .
    "Nombre d'adultes : " . htmlspecialchars($_POST["nombreAdultes"]) . "\n \n" .
    "Nombre Enfants : " . htmlspecialchars($_POST["nombreEnfants"]) . "\n \n";

// Ajout les dates de naissance de chaque enfant dans le message
for ($i = 1; $i <= $nombreEnfants; $i++) {
    $fieldName = "dateNaissanceEnfant" . $i;
    $dateNaissanceEnfant = htmlspecialchars($_POST[$fieldName]);

    // Convertir la date au format européen (jour/mois/année)
    $dateNaissanceEnfantFormat = date('d/m/Y', strtotime($dateNaissanceEnfant));

    // Calculer l'âge de l'enfant par rapport à la date d'aujourd'hui
    $dateNaissanceEnfantObj = new DateTime($dateNaissanceEnfant);
    $aujourdHui = new DateTime('today');
    $ageEnfant = $dateNaissanceEnfantObj->diff($aujourdHui)->y;

    $message .= "Date de naissance enfant " . $i . " : " . $dateNaissanceEnfantFormat . " (Âge : " . $ageEnfant . " ans)\n \n";
}


            // Convertir la date d'arrivée au format européen
$dateArriveeFormattee = date('d/m/Y', strtotime($_POST["dateArrivee"]));

// Convertir la date de départ au format européen
$dateDepartFormattee = date('d/m/Y', strtotime($_POST["dateDepart"]));

// Ajoute les dates formatées dans le message
// Modifie le message pour inclure l'information sur l'acceptation des RGPD et des CGV
$message .= "Date d'arrivée : " . htmlspecialchars($dateArriveeFormattee) . "\n \n" .
    "Date de départ : " . htmlspecialchars($dateDepartFormattee) . "\n \n" .
    "Message : " . htmlspecialchars($_POST["message"]) . "\n \n" .
    "RGPD accepté : " . ($rgpdAccepted ? 'Oui' : 'Non') . "\n \n" .
    "CGV acceptées : " . ($cgvAccepted ? 'Oui' : 'Non') . "\n \n";


            $object = "Nouvelle reservation";
            $retour = mail("postmaster@lescaravanesdelabesbre.fr", "Nouvelle reservation", $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));
            //$retour = mail("michel.hof@hotmail.fr", "Nouvelle reservation", $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));

            if ($retour) {
                // Redirection vers une page de confirmation après la soumission du formulaire
                echo '<script>window.location.replace("confirmationContactResa.php");</script>';
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
                                Veuillez saisir votre prénom. :h
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
                            <label for="phoneNumber" class="form-label">Téléphone</label>
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

                    <div class="form-outline mb-4">
                        <label class="form-label round" for="nombreAdultes">Nombre d'adultes :</label>
                        <input name="nombreAdultes" type="number" id="nombreAdultes" class="form-control" placeholder="Indiquez le nombre d'adultes" required min="0">
                        <div class="invalid-feedback">
                            Veuillez saisir le nombre d'adultes.
                        </div>
                    </div>

                    <div class="form-outline mb-4">
    <label class="form-label round" for="nombreEnfants">Nombre d'enfants :</label>
    <input name="nombreEnfants" type="number" id="nombreEnfants" class="form-control" placeholder="Indiquez le nombre d'enfants" required onchange="ajouterChampsDateNaissance()" min="0">
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

                    <div class="form-group">
                        <label for="message" class="mb-2">Message</label>
                        <div class="form-floating">
                            <textarea name="message" class="form-control" id="message" required></textarea>
                            <label for="message">Votre Message</label>
                            <div class="invalid-feedback">
                                Veuillez saisir votre message.
                            </div>
                        </div>
                    </div>

                    <!-- Case à cocher RGPD -->
                    <div class="form-check mb-4 mt-3">
                        <input class="form-check-input" type="checkbox" id="rgpdCheckbox" name="rgpdCheckbox">
                        <label class="form-check-label" for="rgpdCheckbox">
                            J'accepte que mes données personnelles soient traitées conformément à <a href="politiquedeConfidentialite.php">Politique De Confidentialité</a>.
                        </label>
                        <div class="invalid-feedback" id="rgpdError" style="display: none;">
                            Vous devez accepter la politique de confidentialité.
                        </div>
                    </div>

                    <!-- Case à cocher CGV -->
                <div class="form-check mb-4 mt-3">
                    <input class="form-check-input" type="checkbox" id="cgvCheckbox" name="cgvCheckbox">
                    <label class="form-check-label" for="cgvCheckbox">
                        J'accepte les <a href="conditionsGeneralesDeVente.php">Conditions Générales de Vente</a>.
                    </label>
                    <div class="invalid-feedback" id="cgvError" style="display: none;">
                        Vous devez accepter les Conditions Générales de Vente.
                    </div>
                </div>

                    <div class="g-recaptcha m-4" data-sitekey="6Ld72FwnAAAAABXBamvH-_h6-dyX_phTGFlAWCgR"></div>

                    <button type="submit" value="Valider" id="send-data" class="btn btn-primary btn-block mb-4">
                        Envoyez
                    </button>
                </div>
                
            </div>
            </div>
    </fieldset>
</form>


<?php include("footer.php") ?>

<!-- FORMULAIRE RESA -->
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

        

        // Obtention de l'élément HTML avec l'ID "phoneNumber" (champ de numéro de téléphone)
        let phoneNumberInput = document.getElementById("phoneNumber");
        let phoneNumberValue = phoneNumberInput.value;

        // Vérifier si la valeur du numéro de téléphone contient uniquement des chiffres
        let phoneRegex = /^[0-9]+$/;

        if (!phoneRegex.test(phoneNumberValue)) {
            alert("Veuillez saisir uniquement des chiffres pour le numéro de téléphone.");
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

       // Vérification si la case du consentement RGPD est cochée
// Récupère l'élément HTML avec l'ID "rgpdCheckbox"
let rgpdCheckbox = document.getElementById('rgpdCheckbox');

// Vérifie si la case du consentement RGPD n'est pas cochée
if (!rgpdCheckbox.checked) {
    // Affiche une alerte indiquant que l'utilisateur doit accepter la politique de confidentialité
    alert('Vous devez accepter la politique de confidentialité.');
    // Place le focus sur la case à cocher RGPD pour que l'utilisateur puisse la sélectionner
    rgpdCheckbox.focus();
    // Arrête l'exécution de la fonction et empêche la soumission du formulaire
    return false;
}


        // Vérification si la case du consentement CGV est cochée
// Récupère l'élément HTML avec l'ID "cgvCheckbox"
let cgvCheckbox = document.getElementById('cgvCheckbox');

// Vérifie si la case du consentement CGV n'est pas cochée
if (!cgvCheckbox.checked) {
    // Affiche une alerte indiquant que l'utilisateur doit accepter les Conditions Générales de Vente
    alert('Vous devez accepter les Conditions Générales de Vente.');
    // Place le focus sur la case à cocher CGV pour que l'utilisateur puisse la sélectionner
    cgvCheckbox.focus();
    // Arrête l'exécution de la fonction et empêche la soumission du formulaire
    return false;
}


        // Vérification si la réponse reCAPTCHA n'est pas vide
// Récupère la réponse reCAPTCHA à l'aide de la fonction grecaptcha.getResponse()
let recaptchaResponse = grecaptcha.getResponse();

// Vérifie si la longueur de la réponse reCAPTCHA est égale à zéro, ce qui signifie qu'elle est vide
if (recaptchaResponse.length == 0) {
    // Affiche une alerte indiquant à l'utilisateur de cocher le reCAPTCHA
    alert('Veuillez cocher le reCAPTCHA.');
    // Arrête l'exécution de la fonction et empêche la soumission du formulaire
    return false;
}


        return true;
    }

  // Fonction pour ajouter dynamiquement les champs de date de naissance des enfantsDéclaration de la fonction pour ajouter dynamiquement des champs de date de naissance en fonction du nombre d'enfants.
function ajouterChampsDateNaissance() {
    // Récupère la valeur du nombre d'enfants depuis l'élément HTML avec l'ID "nombreEnfants"
    const nombreEnfants = document.getElementById('nombreEnfants').value;
    // Récupère l'élément HTML avec l'ID "containerDatesNaissance"
    const containerDatesNaissance = document.getElementById('containerDatesNaissance');

    // Vide le contenu actuel du conteneur de dates de naissance pour éviter les doublons
    containerDatesNaissance.innerHTML = ''; // Supprime les champs de date de naissance existants

    // Boucle pour créer dynamiquement les champs de date de naissance en fonction du nombre d'enfants
    for (let i = 1; i <= nombreEnfants; i++) {
        // Crée un élément div pour chaque ligne
        const divRow = document.createElement('div');
        divRow.className = 'row mb-4';

        // Crée un élément div pour chaque colonne
        const divCol = document.createElement('div');
        divCol.className = 'col';

        // Crée un élément label pour indiquer le champ de date de naissance de chaque enfant
        const label = document.createElement('label');
        label.className = 'form-label';
        label.setAttribute('for', 'dateNaissanceEnfant' + i);
        label.innerText = 'Date de naissance enfant ' + i + ' :';

        // Crée un champ de saisie de date pour chaque enfant
        const inputDate = document.createElement('input');
        inputDate.name = 'dateNaissanceEnfant' + i;
        inputDate.type = 'date';
        inputDate.id = 'dateNaissanceEnfant' + i;
        inputDate.className = 'form-control';
        inputDate.required = true;

        // Ajoute le label et le champ de saisie de date dans la colonne
        divCol.appendChild(label);
        divCol.appendChild(inputDate);

        // Ajoute la colonne dans la ligne
        divRow.appendChild(divCol);

        // Ajoute la ligne dans le conteneur des dates de naissance
        containerDatesNaissance.appendChild(divRow);
    }
}

</script>
</body>
  </html>
