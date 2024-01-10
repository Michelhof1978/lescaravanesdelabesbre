<?php include("header.php") ?>

<head>
<meta name="description" content="Vacance en Auvergne">
<title>Tourisme auvergne Dompierre sur besbre</title>
</head>

<h1 class="pb-2 text-center  border border-3 rounded  h1Index pt-1 text-white mt-5">Souvenirs De Vacances</h1>

<div class=" mt-5 text-center bg-light rounded shadow p-4 pb-5 bg-white rounded ms-1 me-1 mb-3">
  <h3>Vous avez des souvenirs de vacances à partager ?</h3>
  <p class=" lead">
    Des vidéos, des images ou un petit message que vous souhaitez nous
    faire passer ? Nous serions ravis de les recevoir ! Vos contributions permettront à nos utilisateurs d'être
    guidés dans leurs futures escapades et de découvrir quelques balades secrètes à faire. N'oubliez pas :
    profitez de la vie à fond et partagez ces moments magiques avec la communauté ! Ensemble, créons des
    souvenirs inoubliables et inspirons nous mutuellement pour nos prochaines aventures. Merci de partager vos
    merveilleuses expériences de vacances avec nous !
  </p>
</div>



<div class="d-flex align-items-center justify-content-center ">
  <div class="container mt-5 mb-5">
    <div class="row">
      <!-- Bloc festi1 - à gauche -->
      <div class=" col-lg-6 mb-3">
        <div class="text-center">
          <img src="../images/festiDomp.webp" alt="logo festi domp" class="img-fluid w-75 text-center mb-3">
          <img src="../images/festi01.webp" alt="image concert festiDomp" class="videoPal embed-responsive embed-responsive-16by9 img-fluid mb-5 text-center w-75">
        </div>
        <div class="videoPal embed-responsive embed-responsive-4by3">
          <video controls class="embed-responsive-item videoPal1" src="../videos/festi01.mp4"></video>
        </div>
        <div class="videoPal embed-responsive embed-responsive-4by3 mt-5">
          <video controls class="embed-responsive-item videoPal1" src="../videos/festi04.mp4"></video>
        </div>
      </div>

      <!-- Bloc festi2 - à droite -->
      <div class="col-lg-6">
        <div class="">
          <img src="../images/laMontagne.webp" alt="logo journal la montagne" class="img-fluid mb-lg-5">
        </div>
        <div class="lead mt-5 text-center bg-light rounded shadow p-4 pb-5 bg-white rounded ms-1 me-1 mb-5">
          <p>
            «On n’avait jamais vu ça, sourit Séverine Villette, l’une des présidentes de l’association,
            avec en point d’orgue la soirée du samedi soir qui a accueilli à un moment près de 2.000 personnes !
            À un moment, on n’avait plus rien à proposer à manger au public ! Même le dimanche après-midi qui
            est d’habitude plus calme a été un vrai succès avec pas loin de 400 spectateurs, là aussi un record.
            On espère que le public sera de nouveau au rendez-vous l’année prochaine pour la 10e édition du
            festival ! Un anniversaire que l’on veut inoubliable ! »
          </p>
        </div>
        <div class="ms-lg-5">
          <img src="../images/festi03.webp" alt="concert festiDomp" class="videoPal embed-responsive embed-responsive-16by9 ms-5 img-fluid mb-5 text-center w-75">
          <img src="../images/festi02.webp" alt="concert festiDomp" class="videoPal embed-responsive embed-responsive-16by9 ms-5 img-fluid mb-5 text-center w-75">
        </div>

        <div class="lead mt-2 text-center bg-light rounded shadow p-2 pb-2 bg-white rounded ms-1 me-1">
          <p>
            Et encore <strong>BRAVO</strong> à FestiDomp pour cette superbe soirée
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="mt-5 text-center bg-light rounded shadow p-4 pb-5 bg-white rounded ms-1 me-1 mb-3">
  <p class="lead">
    A bientôt Pour De Nouvelles Aventures Avec <strong>LesCaravanesDeLaBesbre.fr</strong>
  </p>
</div>

<?php include("formulaireContact.php") ?>

<?php include("footer.php") ?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-M3CJ6F224B"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-M3CJ6F224B');
  </script>
  <!-- Google tag (gtag.js) -->


  <!-- Google Tag Manager -->
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
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-59DVV3P');
  </script>
  <!-- End Google Tag Manager -->

  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', '32-930029-2', 'auto'); //Id du site par rapport à google analytics, bien mettre à ce format
    ga('send', 'pageview');
  </script>

  <script>
    window.ga = window.ga || function() {
      (ga.q = ga.q || []).push(arguments)
    };
    ga.l = +new Date;
    ga('create', '32-930029-2', 'auto'); //id du site par rapport à google, toujours le mettre à ce format 
    ga('send', 'pageview');
  </script>

  <script async src='https://www.google-analytics.com/analytics.js'></script>

  <!-- End Google Analytics -->

  <!-- Google Tag Manager -->
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
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-59DVV3P');
  </script>
  <!-- End Google Tag Manager -->

  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', '32-930029-2', 'auto'); //Id du site par rapport à google analytics, bien mettre à ce format
    ga('send', 'pageview');
  </script>

  <script>
    window.ga = window.ga || function() {
      (ga.q = ga.q || []).push(arguments)
    };
    ga.l = +new Date;
    ga('create', '32-930029-2', 'auto'); //id du site par rapport à google, toujours le mettre à ce format 
    ga('send', 'pageview');
  </script>

  <script async src='https://www.google-analytics.com/analytics.js'></script>

  <!-- End Google Analytics -->

  <!-- Google Tag Manager -->
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
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-59DVV3P');
  </script>
  <!-- End Google Tag Manager -->

  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', '32-930029-2', 'auto'); //Id du site par rapport à google analytics, bien mettre à ce format
    ga('send', 'pageview');
  </script>

  <script>
    window.ga = window.ga || function() {
      (ga.q = ga.q || []).push(arguments)
    };
    ga.l = +new Date;
    ga('create', '32-930029-2', 'auto'); //id du site par rapport à google, toujours le mettre à ce format 
    ga('send', 'pageview');
  </script>

  <script async src='https://www.google-analytics.com/analytics.js'></script>

  <!-- End Google Analytics -->

  <!-- Google Tag Manager -->
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
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-59DVV3P');
  </script>
  <!-- End Google Tag Manager -->

  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', '32-930029-2', 'auto'); //Id du site par rapport à google analytics, bien mettre à ce format
    ga('send', 'pageview');
  </script>

  <script>
    window.ga = window.ga || function() {
      (ga.q = ga.q || []).push(arguments)
    };
    ga.l = +new Date;
    ga('create', '32-930029-2', 'auto'); //id du site par rapport à google, toujours le mettre à ce format 
    ga('send', 'pageview');
  </script>

  <script async src='https://www.google-analytics.com/analytics.js'></script>

  <!-- End Google Analytics -->

  <!-- Balisage JSON-LD généré par l'outil d'aide au balisage de données structurées de Google -->
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "LocalBusiness",
      "name": "Les Caravanes De La Besbre .",
      "image": "https://lescaravanesdelabesbre.fr/images/banner3.png",
      "telephone": "06 86 41 31 71"
    }
  </script>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-69SWVM55LB"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-69SWVM55LB');
  </script>


</body>

</html>