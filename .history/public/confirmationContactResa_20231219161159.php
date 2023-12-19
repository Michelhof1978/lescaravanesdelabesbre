<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("head.php") ?>
    <meta name="description" content="Vous souhaitez organiser un séjour au Parc d'Attractions le Pal à plusieurs, possibilité de louer nos 3 caravanes placées côte à côte.">
    <title>Camping Dompierre Sur Besbre Proche Du Pal</title>
</head>

<body>
    <?php include("header.php") ?>

    <section class="confirmation">
        <h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index" id="contact"><strong>MERCI</strong></h4>

        <div class="text-center">
            <img src="./images/logo.png" alt="Le Pal" class="img-fluid  text-center w-25" />

            <div class="lead text-success display-4 text-center bg-light rounded shadow p-4 pb-5 bg-white rounded ms-1 me-1 mb-5">
                <p>Nous vous remercions sincèrement d'avoir choisi Les Caravanes De La Besbre pour votre prochaine réservation.<br>
                    Nous avons bien reçu votre formulaire de contact et nous vous confirmons que votre demande est en cours de traitement.
                </p>
            </div>
        </div>

        <!-- Bouton pour ouvrir une nouvelle fenêtre -->
        <button onclick="openConfirmationPage()">Ouvrir la page de confirmation</button>

        <!-- Le reste du contenu -->
    </section>

    <?php include("footer.php") ?>

    <!-- Votre script JavaScript pour ouvrir la nouvelle fenêtre -->
    <script>
        function openConfirmationPage() {
            // Spécifiez le lien de la page de confirmation ici
            var confirmationPageUrl = 'lien_de_votre_page_de_confirmation.html';

            // Ouvre une nouvelle fenêtre
            window.open(confirmationPageUrl, '_blank');
        }
    </script>
</body>

</html>
