<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../images/logo.png">
  <link href="../css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
  <link rel="icon" type="image/x-icon" href="../images/logo.ico">
  <meta property="og:title" content="Les Caravanes De La Besbre">
  <meta property="og:description" content="Propositions d'hébergements proche du Pal">
  <meta property="og:image" content="../images/logo.ico">

<!-- COOKIES -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.1/cookieconsent.min.css"> -->
  <script>
  // Fonction pour charger Google Analytics si les cookies sont acceptés
  function chargerGoogleAnalytics() {
    // Vérifier si l'utilisateur a accepté les cookies
    let cookies = document.cookie.split(';');
    let cookiesAccepted = cookies.some(function(cookie) {
      return cookie.trim().startsWith("cookiesAccepted=");
    });

    // Charger Google Analytics uniquement si les cookies sont acceptés
    if (cookiesAccepted) {
      // Remplacez 'UA-XXXXXXXXX' par votre ID Google Analytics
      let gaTrackingCode = 'UA-32-930029-2';
      let gaScript = document.createElement('script');
      gaScript.async = true;
      gaScript.src = 'https://www.googletagmanager.com/gtag/js?id=' + gaTrackingCode;
      document.head.appendChild(gaScript);

      gaScript.onload = function () {
        window.dataLayer = window.dataLayer || [];
        function gtag() {
          dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', gaTrackingCode);
      };
    }
  }

  // Appeler la fonction pour charger Google Analytics au chargement de la page
  window.onload = function() {
    checkCookiesAccepted();
    chargerGoogleAnalytics();
  };
</script>
<!-- Ajout du style ds le head car ds fichier css, impossible d'appliquer le style -->
  <style>
    @media only screen and (max-width: 767px) {
      .text-center p {
        font-size: 9px;
      }
    }
  </style>

  <!-- Google Tag Manager OBLIGATOIRE DE LE METTRE DANS LE HEAD-->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-59DVV3P');
  </script>
  <!-- End Google Tag Manager -->