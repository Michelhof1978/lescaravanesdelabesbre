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

$rgpdAccepted = false;

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
        isset($_POST['rgpdCheckbox'])
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
            // Validation du RGPD
            if ($_POST['rgpdCheckbox'] === 'on') {
                $rgpdAccepted = true;
            }

            // Modifier le message pour inclure l'information sur l'acceptation des RGPD
            $message = "Réservation de caravanes au Parc d'Attractions Le Pal :\n" .
                "Nom : " . htmlspecialchars($_POST["firstName"]) . "\n" .
                "Prénom : " . htmlspecialchars($_POST["lastName"]) . "\n" .
                "Téléphone : " . htmlspecialchars($_POST["phoneNumber"]) . "\n" .
                "Email : " . htmlspecialchars($_POST["email"]) . "\n" .
                "Nombre d'adultes : " . htmlspecialchars($_POST["nombreAdultes"]) . "\n" .
                "Nombre Enfants : " . htmlspecialchars($_POST["nombreEnfants"]) . "\n" .
                // Récupérer le nombre d'enfants
                $nombreEnfants = isset($_POST["nombreEnfants"]) ? intval($_POST["nombreEnfants"]) : 0;
                // Ajouter les dates de naissance de chaque enfant dans le message
                for ($i = 1; $i <= $nombreEnfants; $i++) {
    $fieldName = "dateNaissanceEnfant" . $i;
    $message .= "Date de naissance enfant " . $i . " : " . htmlspecialchars($_POST[$fieldName]) . "\n";
}
 "\n" .
                "Date d'arrivée : " . htmlspecialchars($_POST["dateArrivee"]) . "\n" .
                "Date de départ : " . htmlspecialchars($_POST["dateDepart"]) . "\n" .
                "Message : " . htmlspecialchars($_POST["message"]) . "\n" .
                "RGPD accepté : " . ($rgpdAccepted ? 'Oui' : 'Non');

            $object = "Nouvelle reservation";
            //$retour = mail("postmaster@lescaravanesdelabesbre.fr", "Nouvelle reservation", $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));
             $retour = mail("michel.hof@hotmail.fr", "Nouvelle reservation", $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . htmlspecialchars($_POST["email"]));

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


<script>
//     function validateForm() {
//         // Validation de l'adresse e-mail
//         let emailInput = document.getElementById('email');//Obtention de l'élément HTML avec l'ID "email" (champ d'adresse e-mail).
//         let emailValue = emailInput.value.trim();//Obtention de la valeur de l'adresse e-mail avec les espaces blancs supprimés
//         let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;//Définition d'une expression régulière pour valider l'adresse e-mail.

// //Vérification si la valeur de l'adresse e-mail correspond à l'expression régulière. 
//         if (!emailRegex.test(emailValue)) {
//             alert('Veuillez saisir une adresse email valide.');//Affichage d'une alerte si la validation échoue
//             emailInput.focus();//éplace automatiquement le focus vers le champ d'adresse e-mail, attirant l'attention de l'utilisateur en cas d'échec de la validation.
//             return false;
//         }

// // Obtention de l'élément HTML avec l'ID "phoneNumber" (champ de numéro de téléphone)
//         let phoneNumberInput = document.getElementById("phoneNumber");
//         let phoneNumberValue = phoneNumberInput.value;//Obtention de la valeur du numéro de téléphone.

// // Vérifier si la valeur du numéro de téléphone contient uniquement des chiffres
//         let phoneRegex = /^[0-9]+$/;
// //Vérification si la valeur du numéro de téléphone correspond à l'expression régulière. Affichage d'une alerte si la validation échoue.
//         if (!phoneRegex.test(phoneNumberValue)) {
//             alert("Veuillez saisir uniquement des chiffres pour le numéro de téléphone.");
//             return false;
//         }


// // Validation des dates d'arrivée et de départ
//         let dateArriveeInput = document.getElementById('dateArrivee');//Obtient l'élément HTML avec l'ID "dateArrivee" (champ de date d'arrivée).
//         let dateDepartInput = document.getElementById('dateDepart');//Obtient l'élément HTML avec l'ID "dateDepart" (champ de date de départ).
//         let dateArriveeValue = dateArriveeInput.value.trim();//Obtient la valeur du champ de date d'arrivée avec les espaces blancs supprimés.
//         let dateDepartValue = dateDepartInput.value.trim();//Obtient la valeur du champ de date de départ avec les espaces blancs supprimés.

// //Vérifie si l'une des dates (d'arrivée ou de départ) est vide.
// //Si l'une des dates est vide, affiche une alerte indiquant que les dates d'arrivée et de départ ne peuvent pas être vides.
// //Renvoie false, indiquant que la validation a échoué.
//         if (dateArriveeValue === '' || dateDepartValue === '') {
//             alert('Les dates d\'arrivée et de départ ne peuvent pas être vides.');
//             return false;
//         }
// //Vérifie si la date de départ est ultérieure à la date d'arrivée.
// //Si la date de départ est antérieure ou égale à la date d'arrivée, affiche une alerte indiquant que la date de départ doit être ultérieure à la date d'arrivée.
//         if (new Date(dateArriveeValue) > new Date(dateDepartValue)) {
//             alert('La date de départ doit être ultérieure à la date d\'arrivée.');
//             dateDepartInput.focus();//Place le focus sur le champ de date de départ (dateDepartInput.focus()) pour attirer l'attention de l'utilisateur sur ce champ
//             return false;//Renvoie false, indiquant que la validation a échoué
//         }

// // Vérification si la case du consentement RGPD est cochée
//         let rgpdCheckbox = document.getElementById('rgpdCheckbox');
//         if (!rgpdCheckbox.checked) {
//             alert('Vous devez accepter la politique de confidentialité.');
//             rgpdCheckbox.focus();
//             return false;
//         }

// // Vérification si la réponse reCAPTCHA n'est pas vide
//         let recaptchaResponse = grecaptcha.getResponse();//Obtient la réponse du reCAPTCHA, en utilisant la bibliothèque reCAPTCHA API (grecaptcha).
//         if (recaptchaResponse.length == 0) {//Vérifie si la réponse reCAPTCHA est vide (non cochée).
//             alert('Veuillez cocher le reCAPTCHA.');//Affiche une alerte indiquant à l'utilisateur de cocher le reCAPTCHA.
//             return false;//indiquant que la validation a échoué en raison de la non-cochage du reCAPTCHA.
//         }
// // Si toutes les validations précédentes sont réussies, la fonction renvoie true indiquant que le formulaire est valide.
//         return true;
//     }

// // Fonction pour ajouter dynamiquement les champs de date de naissance des enfantsDéclaration de la fonction pour ajouter dynamiquement des champs de date de naissance en fonction du nombre d'enfants.
//     function ajouterChampsDateNaissance() {
//         const nombreEnfants = document.getElementById('nombreEnfants').value;//Obtention de la valeur du champ indiquant le nombre d'enfants
//         const containerDatesNaissance = document.getElementById('containerDatesNaissance'); //Obtention de l'élément conteneur pour les champs de date de naissance.

// // Supprime les champs de date de naissance existants
//         containerDatesNaissance.innerHTML = '';

// // Ajout dynamique de nouveaux champs de date de naissance en fonction du nombre d'enfants, utilisant une boucle for pour créer les éléments HTML nécessaires.
//         for (let i = 1; i <= nombreEnfants; i++) {
//             const divRow = document.createElement('div');//Crée un nouvel élément HTML de type <div> qui servira de ligne dans la disposition.
//             divRow.className = 'row mb-4';

//             const divCol = document.createElement('div');// Crée un nouvel élément HTML de type <div> qui servira de colonne dans la disposition.
//             divCol.className = 'col';

//             const label = document.createElement('label');//Crée un nouvel élément HTML de type <label>.
//             label.className = 'form-label';//Définit la classe CSS du label comme "form-label", ce qui pourrait être une classe spécifique à votre formulaire pour le styliser.
//             label.setAttribute('for', 'dateNaissanceEnfant' + i);//Ajoute un attribut for au label, indiquant l'ID du champ associé. L'ID est généré dynamiquement en fonction de la valeur de i.
//             label.innerText = 'Date de naissance enfant ' + i + ' :';//Définit le texte à afficher dans le label, indiquant le numéro de l'enfant.

//             const inputDate = document.createElement('input');//Crée un nouvel élément HTML de type <input>.
//             inputDate.name = 'dateNaissanceEnfant' + i;//Définit le nom du champ d'entrée (input) pour le soumettre correctement avec le formulaire.
//             inputDate.type = 'date';//Définit le type de champ d'entrée comme "date", indiquant que l'utilisateur doit entrer une date
//             inputDate.id = 'dateNaissanceEnfant' + i;//Définit l'ID du champ d'entrée, ce qui est important pour l'association avec le label.
//             inputDate.className = 'form-control';//Définit la classe CSS du champ d'entrée comme "form-control", ce qui pourrait être une classe Bootstrap pour le styliser.
//             inputDate.required = true;//Définit que le champ d'entrée est requis, ce qui signifie que l'utilisateur doit entrer une valeur.

//             divCol.appendChild(label);//Ajoute le label en tant qu'enfant de la colonne
//             divCol.appendChild(inputDate);//Ajoute le champ d'entrée en tant qu'enfant de la colonne.
//             divRow.appendChild(divCol);//Ajoute la colonne en tant qu'enfant de la ligne.
// //Ajoute la ligne (contenant le label et le champ d'entrée) en tant qu'enfant du conteneur spécifié pour les dates de naissance des enfants.
//             containerDatesNaissance.appendChild(divRow);
//         }
//     }
</script>

</body>
  </html>
