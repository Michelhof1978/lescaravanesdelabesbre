<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consentement aux Cookies</title>
    <style>
        #cookie-banner {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #f0f0f0;
            padding: 10px;
            text-align: center;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }
        #cookie-banner p {
            margin: 0;
        }
        #cookie-banner button {
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div id="cookie-banner">
    <p>Nous utilisons des cookies pour améliorer votre expérience sur notre site. Acceptez-vous l'utilisation des cookies ?</p>
    <button onclick="acceptCookies()">Accepter</button>
    <button onclick="refuseCookies()">Refuser</button>
</div>

<!-- Votre contenu de site web va ici -->

<script>
    // Vérifie si l'utilisateur a déjà donné son consentement
    if (!localStorage.getItem('cookieConsent')) {
        // Affiche la bannière de consentement après un délai (par exemple, 2 secondes)
        setTimeout(function() {
            document.getElementById('cookie-banner').style.display = 'block';
        }, 2000);
    }

    // Fonction appelée lorsqu'un utilisateur accepte les cookies
    function acceptCookies() {
        localStorage.setItem('cookieConsent', 'true');
        document.getElementById('cookie-banner').style.display = 'none';
        // Ajoutez ici le code pour définir les cookies ou effectuer d'autres actions nécessaires
    }

    // Fonction appelée lorsqu'un utilisateur refuse les cookies
    function refuseCookies() {
        localStorage.setItem('cookieConsent', 'false');
        document.getElementById('cookie-banner').style.display = 'none';
        // Ajoutez ici le code pour gérer le refus des cookies
    }
</script>

</body>
</html>
