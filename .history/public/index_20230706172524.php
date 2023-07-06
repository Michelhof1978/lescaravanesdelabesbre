<?php include("header.php") ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Linking BoxIcon for Icon -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Nous vous proposons des hébergements dans un camping à Dompierre sur Besbre dans le département de l'Allier à 5 km du parc d'attractions le Pal.">
  <meta name="google-site-verification" content="TN5Z1jlnBqKrTXXUwTE4EKfAVepwE9MnH218KsAHNB8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Camping Le Pal : Profitez d'une expérience inoubliable au cœur de la nature !</title>

  <link href="../css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  
  <link rel="icon" type="image/x-icon" href="../images/logo.ico">


  <link rel="canonical" href="https://lescaravanesdelabesbre.fr/" />

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
</head>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-59DVV3P" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<script>
  //CREATION POPUP UNIQUEMENT EN JS 
  // Création de la div pour afficher l'image + position
  var imgDiv = document.createElement("div");
  imgDiv.style.position = "fixed";
  imgDiv.style.top = "57%";
  imgDiv.style.left = "50%";
  imgDiv.style.transform = "translate(-50%, -50%)";
  imgDiv.style.zIndex = "9999" //Pour afficher au dessus de tout élément


  // Création de l'image à afficher
  var img = document.createElement("img");
  img.src = "../images/pal50.webp";
  img.style.height = '450px';
  img.style.Width = '60 %';

  // Ajout de l'image à la div
  imgDiv.appendChild(img);

  // Ajout de la div au body de la page
  document.body.appendChild(imgDiv);

  // Affichage de l'alerte après 3 secondes
  setTimeout(function() {
    alert("Le Pal fête ses 50 Ans !");

    // Suppression de la div contenant l'image
    document.body.removeChild(imgDiv);
  }, 2000);


  //POPUP = Problème de blocage des éditeurs modernes pour raison de sécurité 
  // function openPopup() {
  //   // Spécifiez l'URL de la page à ouvrir dans la popup
  //   var popupUrl = "../images/pal50.png";

  //   // Spécifiez les dimensions de la popup
  //   var popupWidth = 270;
  //   var popupHeight = 380;

  //   // Calculez la position du centre de la fenêtre
  //   var leftPosition = (window.screen.width - popupWidth) / 2;
  //   var topPosition = (window.screen.height - popupHeight) / 2;

  //   // Ouvrir la popup
  //   window.open(popupUrl, "Le Pal fête ses 50 ans", "width=" + popupWidth + ",height=" + popupHeight + ",left=" + leftPosition + ",top=" + topPosition);
  // }

  // // Appelez la fonction pour ouvrir la popup
  // openPopup();
</script>


<section class="index mt-5">

  

    <h1 class=" pb-2 text-center  border border-3 rounded  h1Index pt-1 text-white "><strong>Camping Le Pal : Profitez d'une expérience inoubliable au cœur de la nature !</strong> </h1>
    
    <!-- Météo + logoPal50-->
<?php  

$url = "https://api.openweathermap.org/data/2.5/weather?q=dompierre-sur-besbre&lang=fr&units=metric&appid=a2c110c02e86989d65348566c3ad09ff";
$raw = file_get_contents($url);//Récupérer le contenu de l api
$json = json_decode($raw);//Pour décoder en json le contenu de l api
// var_dump($json);//Pour afficher le json

$name = $json -> name;//On récupére la ville ds le tableau json et on vérifie si la ville est affiché à la fin du json donc reconnu

$weather = $json -> weather[0] -> main;//On récupre la météo
$desc =  $json -> weather[0] -> description;//On récupre la description de la meteo
// echo $weather  . " " . $desc;//Pour afficher la météo et voir si c est ok

$temp = $json -> main -> temp;//On récupére la température ds le fichier json
// $feels_like = $json -> main -> feels_like;//
// echo $temp . " " . $feels_like;//On vérifie si affichage en fin du json

$speed = $json -> wind -> speed;//On récupére la vitesse du vent
// $deg = $json -> wind -> deg;//on récupére la force du vent
// echo $speed . " " . $deg;//On affiche à la fin du json si ok, toujours vérifier si ok,  on voit la vitesse du vent + le degrés où il tourne

?>

          
            <div class="container-fluid ">
                <div class="row ">

                <div class="planPal col-xl-4 col-md-4 text-center mt-5">
<a href="../images/planPal.pdf "  download>
<img src="../images/pal50Ans.webp" alt="Plan le pal" title="Plan du Pal" class="logoPal50 img-fluid h-50" /> 
</a>
<h3 class="m-3 ps-4 textLogo50">Téléchargez le plan !</h3>
</div>

<div class="col-xl-4 col-md-4 mt-3 mb-5">
        <a href="https://m.facebook.com/festi.domp.3"><img src="../images/festiDomp.webp" alt="logo fest domp" class="img-fluid w-100" /></a>
    </div>

    

<div class=" col-xl-4 col-md-4 text-center pt-2  ">
<h2 class="textLogo50">Météo du jour <br> <strong><?php echo $name; ?></strong></h2>
                    <?php 
                        switch($weather)
                        {
                            case "Clear":
                                ?>

                                   <div class="icon sunny">
                                        <div class="sun">
                                            <div class="rays"></div>
                                        </div>
                                    </div> 

                                <?php
                                break;
    
                                case 'Drizzle':
                                ?>

                                <div class="icon sun-shower">
                                    <div class="cloud"></div>
                                        <div class="sun">
                                            <div class="rays"></div>
                                    </div>
                                        <div class="rain"></div>
                                </div>
                                
                                <?php 
                                break;
    
                                case 'Rain':
                                ?>

                                <div class="icon rainy">
                                    <div class="cloud"></div>
                                    <div class="rain"></div>
                                </div>

                                <?php 
                                break;
    
                                case 'Clouds':
                                ?>

                                <div class="icon cloudy">
                                    <div class="cloud"></div>
                                    <div class="cloud"></div>
                                </div>

                                <?php 
                                break;
    
                                case 'Thunderstorm':
                                ?>

                                <div class="icon thunder-storm">
                                    <div class="cloud"></div>
                                        <div class="lightning">
                                            <div class="bolt"></div>
                                            <div class="bolt"></div>
                                    </div>
                                </div>

                                <?php 
                                break;
    
                                case 'Snow':
                                ?>

                                <div class="icon flurries">
                                    <div class="cloud"></div>
                                        <div class="snow">
                                            <div class="flake"></div>
                                            <div class="flake"></div>
                                    </div>
                                </div>
    
                                <?php 
                                break;
                        }
                        ?>

                        <div class="textLogo50">
                            <h2>
                                <?php echo $temp; ?> °C <br />
                                <?php echo $speed; ?> Km/h <br /> 
                                <?php echo $desc; ?>
                        </h2>
                    </div>
                </div>
            </div>
            </div>
            <!-- fin Météo + logoPal50-->



          



            <div class="container ">
    <!--Section INTRO-->

    <div class="row ">
   

      <div class="col-sm-12 col-xl-6 ">
        <img src="../images/bannerIntro.webp" alt="Le Pal" class="img-fluid" />
      </div>
      <div class="col-sm-12 col-xl-6 ">
        <p class="textIntro lead bg-light rounded shadow p-4 pb-5 bg-white rounded ms-1 me-1 ">
          Profitez d'une expérience de camping unique au <strong> <a href="https://camping.mairie-dsb.fr/">Camping proche du Pal de Dompierre Sur Besbre</a>, situé à proximité du parc d'attractions <a href="https://www.lepal.com/">Le-Pal</a></strong>.
          Niché dans un cadre naturel exceptionnel en bordure d'une rivière et à proximité des commerces, ce site paisible et verdoyant offre une atmosphère propice à la détente et au ressourcement.

          Vous serez enchanté par l'ambiance caravane proposée par notre équipe. Des caravanes tout confort et entièrement équipées sont disponibles du <strong>03/07/2023 au 27/08/2023</strong> pour accueillir 4 personnes chacune (2 adultes et 2 enfants).
          En outre, une épicerie de base est fournie, comprenant café, sucre, sel, poivre, huile, etc.

          Notre équipe, dirigée par Isabelle, se fera un plaisir de vous aider à rendre votre séjour inoubliable. N'hésitez pas à nous contacter pour plus d'informations ou pour réserver votre séjour dès maintenant.
        </p>
      </div>
    </div>



  </div>
</section>

<!--Section: Content VIDEO PAL-->
<section class="text-center mt-4 m-2">
  <div class="container">
    <div class="row g-0">

      <div class=" col">
        <div class="videoPal  embed-responsive embed-responsive-16by9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/s77ml0_4XUA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>

      <div class=" col text-center d-none d-md-block align-self-center">
        <h2 class="billeterie text-dark display-6">Billeterie </h2>
        <a href="https://www.lepal.com/"><img src="../images/lePal.webp" alt="Logo le pal" class="logoPal img-fluid " /></a>
      </div>

      <div class=" col d-none d-xl-block">
        <div class="videoPal embed-responsive embed-responsive-16by9 ">
          <iframe class="embed-responsive-item videoPal1" src="https://www.youtube.com/embed/m7PrIAN_Krs" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>

    </div>
  </div>
</section>





<!--PROPOSITION LOGEMENTS-->
<section class="text-center clear mt-4 ms-2 me-2">
  <h4 class="mb-5 border border-3 rounded display-6 p-2 col m-2 h4Index text-white"><strong>LOCATION POUR 4 PERSONNES 79,00€ / NUIT</strong></h4>

  <div class="row locationIndex">
    <div class="col-lg-4 col-md-12 mb-4 ">
      <div class="card ">
        <div class="bg-image hover-overlay ripple " data-mdb-ripple-color="light">
          <img src="../images/caravane1.webp" alt="camping le pal" class="img-fluid " />
          <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
          </a>
        </div>
        <div class="card-body">
          <h5 class="card-title">Caravane BIG </h5>
          <p class="tarifs"><strong>79,00 €</strong></p>
          <p class="card-text">
            Nous vous proposons une caravane tout confort équipée pour 4 personnes (2 adultes et 2 enfants), avec un auvent, sur un emplacement du <strong>Camping "Les Bords de la Besbre"</strong> à Dompierre-sur-Besbre.
            Le camping est situé à proximité du <strong>parc d'attraction Le Pal </strong> ainsi que de toutes les commodités. Nous fournissons une épicerie de base comprenant du café, du sucre, de l'huile, du sel, etc. Le lit parental dispose d'un matelas de qualité avec des lattes de 140/190 et il y a également un lit convertible d'environ 110/140.
            Veuillez noter que les draps ne sont pas fournis, prévoyez donc 2 parures de lit en 140. <br>
            <strong>En réservant sur notre site lescaravanesdelabesbre.fr ou par téléphone au 06 86 41 31 71, vous pouvez bénéficier <p class="b">d'un tarif réduit par rapport à une réservation Airbnb.</p>d'un tarif réduit par rapport à une réservation Airbnb.</strong> <br>
            <a href="https://www.airbnb.fr/rooms/34618829?check_in=2023-07-07&check_out=2023-07-09&guests=1&adults=2&s=13&unique_share_id=9da18392-0809-4421-8f7b-23e32304aadb&source_impression_id=p3_1673810175_X9sGQDLRkdBr8tX%2F" class="btn btn-primary">Réservez !</a>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
          <img src="../images/caravane2.webp" alt="Hébergements le pal" class="img-fluid" />
          <a href="https://www.airbnb.fr/rooms/34376099?check_in=2023-07-07&check_out=2023-07-09&guests=1&adults=2&s=13&unique_share_id=0e8b24e2-1835-49a1-a4a3-18082f186b0a&source_impression_id=p3_1673810214_%2BUv5dalb9N5%2FDer5">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
          </a>
        </div>
        <div class="card-body">
          <h5 class="card-title">Caravane FLO</h5>
          <p class="tarifs"><strong>79,00 €</strong></p>
          <p class="card-text">
            Nous vous proposons une caravane tout confort équipée pour 4 personnes (2 adultes et 2 enfants), avec un auvent, sur un emplacement du <strong>Camping "Les Bords de la Besbre"</strong> à Dompierre-sur-Besbre.
            Le camping est situé à proximité du <strong>parc d'attraction Le Pal </strong> ainsi que de toutes les commodités. Nous fournissons une épicerie de base comprenant du café, du sucre, de l'huile, du sel, etc. Le lit parental dispose d'un matelas de qualité avec des lattes de 140/190 et il y a également un lit convertible d'environ 110/140.
            Veuillez noter que les draps ne sont pas fournis, prévoyez donc 2 parures de lit en 140. <br>
            <strong>En réservant sur notre site lescaravanesdelabesbre.fr ou par téléphone au 06 86 41 31 71, vous pouvez bénéficier d'un tarif réduit par rapport à Airbnb.</strong>
          </p>
          <a href="https://www.airbnb.fr/rooms/34376099?check_in=2023-07-07&check_out=2023-07-09&guests=1&adults=2&s=13&unique_share_id=0e8b24e2-1835-49a1-a4a3-18082f186b0a&source_impression_id=p3_1673810303_FnHo0G0d1awJpqSg" class="btn btn-primary">Réservez !</a>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
          <img src="../images/caravane3.webp" alt="hôtel le pal" class="img-fluid" />
          <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
          </a>
        </div>
        <div class="card-body">
          <h5 class="card-title">Caravane OLI</h5>
          <p class="tarifs"><strong>79,00 €</strong></p>
          <p class="card-text">
            Nous vous proposons une caravane tout confort équipée pour 4 personnes (2 adultes et 2 enfants), avec un auvent, sur un emplacement du <strong>Camping "Les Bords de la Besbre"</strong> à Dompierre-sur-Besbre.
            Le camping est situé à proximité du <strong>parc d'attraction Le Pal </strong> ainsi que de toutes les commodités. Nous fournissons une épicerie de base comprenant du café, du sucre, de l'huile, du sel, etc. Le lit parental dispose d'un matelas de qualité avec des lattes de 140/190 et il y a également un lit convertible d'environ 110/140.
            Veuillez noter que les draps ne sont pas fournis, prévoyez donc 2 parures de lit en 140. <br>
            <strong>En réservant sur notre site lescaravanesdelabesbre.fr ou par téléphone au 06 86 41 31 71, vous pouvez bénéficier d'un tarif réduit par rapport à Airbnb.</strong>
          </p>
          <a href="https://www.airbnb.fr/rooms/33922569?guests=1&adults=1&s=13&unique_share_id=dedc2c3e-e938-44ad-9f3d-ce705e5c250f&source_impression_id=p3_1673797473_hQe7qv%2BRa82qaxPN" class="btn btn-primary">Réservez !</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- FIN PROPOSITION LOGEMENTS-->


<!--Section CAROUSEL-->

<h4 class="mb-4  border border-3 rounded p-2 display-6  m-2 text-center text-white h4Index">VENEZ DECOUVRIR LA BEAUTE DE LA CAMPAGNE</h4>

<div class="container d-flex justify-content-center ">
  <div id="carouselExampleCaptions" class="carousel slide carousel carouselIndex ">

    <div class="carousel-indicators ">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>

    </div>

    <div class="carousel-inner ">
      <div class="carousel-item active ">
        <img src=" ../images/oies.webp" class="d-block w-100" alt="Tourisme Auvergne">
        <div class="carousel-caption d-none d-md-block">
          <h5>Ballades au bord des étangs</h5>
          <p>De multiples randonées à faire à pieds ou en vélo</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="../images/tournesol.webp" class="d-block w-100 " alt="Vacances Auvergne">
        <div class="carousel-caption d-none d-md-block">
          <h5>Champs de tournesols</h5>
          <p>Venez découvrir la beauté des paysages</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src=" ../images/poule.webp" class="d-block w-100 " alt="Vacances Allier">
        <div class="carousel-caption d-none d-md-block">
          <h5>Fermes Pédagogiques</h5>
          <p>Venez visiter des fermes pour le plaisir des enfants</p>
        </div>

      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </div>
</div>
<!--EndCarousel-->

<!--AvisClients-->

<section class="container-fluid avisClients mt-5">

  <div class="row align-items-center justify-content-center h-100 ">

    <div class="col-md-8 col-lg-6 p-3">
      <div class="bg-light shadow p-5">
        <div id="avi" class="text-center">
          Nous avons passé un excellent séjour chez cet hôte. Le logement était propre, confortable. L'hôte était également très accueillant et a répondu rapidement à toutes nos questions. Nous recommandons vivement cet endroit.
        </div>
        <div class="bg-secondary w-25 mx-auto p-1 my-4"></div>
        <div id="auteur" class="text-center">
          Louise
        </div>
      </div>

      <div id="nouveau" class="mt-2 text-center p-3 text-white font-weight-bold text-uppercase">
        Avis Clients
      </div>
    </div>

  </div>

</section>

<script>
  let nouveau = document.querySelector('#nouveau');
  let avi = document.querySelector('#avi');
  let auteur = document.querySelector('#auteur');
  let dernier = 0;
  let nombreAleatoire = 0;
  let avis = [
    ["Notre séjour chez Isabelle a été super ! L'hôte était très accueillant et la caravane était propre, confortable et bien situé. Nous avons vraiment apprécié notre séjour et nous recommandons vivement cet endroit !", "Carole"],
    ["Isabelle était très attentionnée et serviable, nous donnant des conseils sur les meilleurs endroits à visiter dans le coin. Nous avons adoré notre séjour ici et nous y retournerons certainement !", "Bastien"],
    ["Nous avons passé un excellent séjour au caravanes de la besbre! Logement confortable, l'hôte était très serviable et sympathique. Nous avons adoré l'emplacement, qui était proche du PAL. Nous recommandons vivement cet endroit.", "Pauline"],
    ["Nous avons passé un excellent séjour au camping. Tout était parfait, de la propreté de la caravane aux équipements fournis. La communication avec l'hôte était également excellente. Nous recommandons vivement cet endroit !", "Manu"],
    ["Nous avons été très impressionnés par la qualité du logement et l'hospitalité de l'hôte. Tout était propre et bien entretenu, et l'hôte était très sympathique et serviable. Nous le recommandons vivement.", "Marc"],

  ];

  // Fonction permettant de générer un nombre aléatoire
  function genererNombreEntier(max) {
    return Math.floor(Math.random() * Math.floor(max)); //Random donne entre 0 et 1 et floor pour arrondir au plus prêt
  }

  //Création evenement clic souris
  nouveau.addEventListener('click', () => {
    do {
      nombreAleatoire = genererNombreEntier(avis.length);
    } while (nombreAleatoire == dernier)

    avi.textContent = avis[nombreAleatoire][0]; //La propriété .textContent en JavaScript retourne ou définit le contenu textuel d'un élément HTML. Par exemple, si vous avez un élément de paragraphe avec du texte à l'intérieur, vous pouvez utiliser .textContent pour récupérer ce texte ou pour le remplacer par un nouveau texte.
    auteur.textContent = avis[nombreAleatoire][1];
    dernier = nombreAleatoire;
  }); //Ce code utilise un événement "click" sur un élément HTML avec l'id "nouveau". Lorsque l'événement est déclenché, le code génère un nombre aléatoire entier en utilisant la fonction "genererNombreEntier()" avec la longueur de l'array "avis". 

  //Ensuite, une boucle "do while" vérifie si le nombre aléatoire généré est différent de la dernière valeur stockée dans la variable "dernier". Si les deux valeurs sont égales, le code génère un nouveau nombre aléatoire jusqu'à ce qu'il obtienne une valeur différente.

  //Une fois que le code a obtenu un nombre aléatoire différent de la dernière valeur, il utilise ce nombre pour accéder à un élément spécifique de l'array "avis" et met à jour le contenu des éléments HTML avec les valeurs correspondantes en utilisant ".textContent".

  //Enfin, le code stocke la valeur aléatoire générée dans la variable "dernier", afin de s'assurer que la prochaine fois que l'événement "click" sera déclenché, le code ne répétera pas l'affichage du même élément que le précédent.                                    
</script>
<!--End Avis Clients-->



<?php include("formulaireContact.php") ?>

<?php include("footer.php") ?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-59DVV3P" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->