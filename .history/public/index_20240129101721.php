<?php include("head.php") ?>
<meta name="description" content="Nous vous proposons des hébergements dans un camping à Dompierre sur Besbre dans le département de l'Allier à 5 km du parc d'attractions le Pal.">
<title>Accueil Camping Le Pal </title>
</head>

<?php include("header.php") ?>

<h1 class="pb-2 mt-5 text-center border border-3 rounded h1Index pt-1 text-white"><strong>Camping Le Pal : Profitez d'une expérience inoubliable au cœur de la nature !</strong></h1>

<!-- PROPOSITION LOGEMENTS -->
<section class="index text-center clear mt-4 ms-2 me-2">

  <h4 class="mb-5 border border-3 rounded display-6 p-2 col m-2 h4Index text-white"><strong>LOCATION POUR 4 PERSONNES 82,00€ / NUIT</strong></h4>

  <div class="row locationIndex">
    <div class="col-lg-4 col-md-12 mb-4">
      <div class="card">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
          <img src="../images/caravane1.webp" alt="Caravane BIG - Hébergement pour 4 personnes" loading="lazy" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" class="img-fluid rounded-3 mt-4">
        </div>
        <div class="card-body">
          <h5 class="card-title">Caravane BIG </h5>
          <p class="tarifs"><strong>82,00 €</strong></p>
          <p class="card-text">
          Tarif pour 4 personnes max (2 adultes avec 2 enfants) avec la possibilité de louer simultanément plusieurs caravanes pour accueillir des familles nombreuses.<br>
         
          <strong>Découvrez en détail et en images les caractéristiques des caravanes sur la page 'Camping'.</strong><br>
          Linge de lit non inclus
        </p>
           

            <a href="resaContact.php" class="btn btn-primary">Réserver !</a>
         
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
          <img src="../images/caravane2.webp" alt="Hébergements le pal" loading="lazy" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" class="img-fluid rounded-3 mt-4">
        </div>
        <div class="card-body">
          <h5 class="card-title">Caravane FLO</h5>
          <p class="tarifs"><strong>82,00 €</strong></p>
          <p class="card-text">
          Tarif pour 4 personnes max (2 adultes avec 2 enfants) avec la possibilité de louer simultanément plusieurs caravanes pour accueillir des familles nombreuses.
          <br>
          <strong>Découvrez en détail et en images les caractéristiques des caravanes sur la page 'Camping'.</strong><br>
          Linge de lit non inclus 
          </p>
          <a href="resaContact.php" class="btn btn-primary">Réserver !</a> <br><br>
          
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
          <img src="../images/caravane3.webp" alt="hôtel le pal" loading="lazy" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" class="img-fluid rounded-3 mt-4">
          <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
          </a>
        </div>
        <div class="card-body">
          <h5 class="card-title">Caravane OLI</h5>
          <p class="tarifs"><strong>82,00 €</strong></p>
          <p class="card-text">
          Tarif pour 4 personnes max (2 adultes avec 2 enfants) avec la possibilité de louer simultanément plusieurs caravanes pour accueillir des familles nombreuses.
         <br>
          <strong>Découvrez en détail et en images les caractéristiques des caravanes sur la page 'Camping'.</strong> <br>
          Linge de lit non inclus
        </p>

          <a href="resaContact.php" class="btn btn-primary">Réserver !</a> <br><br>
          

        </div>
      </div>
    </div>
  </div>

  <!-- FIN PROPOSITION LOGEMENTS-->

  <!--ARTICLE JOURNAL-->
  <h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index"><strong>NOUS SOMMES PASSES DANS LE JOURNAL !</strong></h4>
  <div class="text-center">
    <img src="../images/laMontagne.webp" alt="logo journal la montagne" loading="lazy" class="img-fluid mb-5">
  </div>

  <div class="text-center mb-5">
    <img src="../images/articleLaMontagne.webp" alt="Article journal" loading="lazy" class="img-fluid videoPal w-75">
  </div>

  <!-- FIN ARTICLE JOURNAL-->

  <!-- Météo + logoPal50-->
  <?php

  $url = "https://api.openweathermap.org/data/2.5/weather?q=dompierre-sur-besbre&lang=fr&units=metric&appid=a2c110c02e86989d65348566c3ad09ff";
  $raw = file_get_contents($url); //Récupérer le contenu de l api
  $json = json_decode($raw); //Pour décoder en json le contenu de l api
  // var_dump($json);//Pour afficher le json

  $name = $json->name; //On récupére la ville ds le tableau json et on vérifie si la ville est affiché à la fin du json donc reconnu

  $weather = $json->weather[0]->main; //On récupre la météo
  $desc =  $json->weather[0]->description; //On récupre la description de la meteo
  // echo $weather  . " " . $desc;//Pour afficher la météo et voir si c est ok

  $temp = $json->main->temp; //On récupére la température ds le fichier json
  // $feels_like = $json -> main -> feels_like;//
  // echo $temp . " " . $feels_like;//On vérifie si affichage en fin du json

  $speed = $json->wind->speed; //On récupére la vitesse du vent
  // $deg = $json -> wind -> deg;//on récupére la force du vent
  // echo $speed . " " . $deg;//On affiche à la fin du json si ok, toujours vérifier si ok,  on voit la vitesse du vent + le degrés où il tourne

  ?>

  <h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index"><strong>INFOS LES CARAVANES DE LA BESBRE</strong></h4>
  <div class="container-fluid mt-5">
    <div class="row ">

      <div class="planPal col-xl-4 col-md-4 text-center mt-5">
        <a href="../images/planPal.pdf " download>
          <img src="../images/pal50Ans.webp" alt="Plan le pal" loading="lazy" title="Plan du Pal" class="logoPal50 img-fluid h-50">
        </a>

        <h3 class="m-3 ps-4 textLogo50">Téléchargez le plan !</h3>

      </div>

      <div class="col-xl-4 col-md-4 mt-3 mb-5">
        <a href="<?php echo FESTIDOMPFB_URL; ?>"><img src="../images/festiDomp.webp" alt="logo fest domp" loading="lazy" class="img-fluid w-100"></a>
      </div>



      <div class=" col-xl-4 col-md-4 text-center pt-2  ">
        <h2 class="textLogo50">Météo du jour <br> <strong><?php echo $name; ?></strong></h2>
        <?php
        switch ($weather) {
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
            <?php echo $temp; ?> °C <br>
            <?php echo $speed; ?> Km/h <br>
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
        <img src="../images/bannerIntro.webp" alt="Le Pal" loading="lazy" class="img-fluid rounded-2">
      </div>

      <div class="col-sm-12 col-xl-6 ">
        <p class="textIntro lead bg-light rounded shadow p-4 pb-5 bg-white rounded ms-1 me-1 ">
          Profitez d'une expérience de camping unique au <strong> <a href="<?php echo CAMPING_URL; ?>" target="_blank">Camping proche du Pal de Dompierre Sur Besbre</a>, situé à proximité du parc d'attractions <a href="<?php echo PAL_URL; ?>" target="_blank">Le-Pal</a></strong>.
          Niché dans un cadre naturel exceptionnel en bordure d'une rivière et à proximité des commerces, ce site paisible et verdoyant offre une atmosphère propice à la détente et au ressourcement.

          Vous serez enchanté par l'ambiance caravane proposée par notre équipe. Des caravanes tout confort et entièrement équipées sont disponibles du <strong>01/07/2024 au 01/09/2024</strong> pour accueillir 4 personnes chacune (2 adultes et 2 enfants).
          En outre, une épicerie de base est fournie, comprenant café, sucre, sel, poivre, huile, etc.

          Notre équipe, dirigée par Isabelle, se fera un plaisir de vous aider à rendre votre séjour inoubliable. N'hésitez pas à nous contacter pour plus d'informations ou pour réserver votre séjour dès maintenant.
        <strong>Le linge de lit n'est pas inclus</strong>
        </p>
      </div>
    </div>



  </div>
</section>

<!--Section: Content VIDEO PAL-->
<section class="text-center mt-4 m-2">
  <h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index"><strong>VISITE AU PARC LE PAL</strong></h4>
  
  <div class="text-center">
    <h2 class="mb-4">Nouvelle Attraction 2024 </h2>
    <img src="../images/attraction2024.jpg" alt="Nouvelle attraction le pal 2024" loading="lazy" class="img-fluid w-75 w-md-50 rounded-2 mb-5">
</div>

  
      <div class="container">
    <div class="row g-0 flex-column flex-md-row">

        <div class="col">
            <div class="videoPal embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="<?php echo YOUTUBE1_URL; ?>" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <div class="video-description">Bande Annonce Du Pal</div>
            </div>
        </div>

        <div class="col text-center align-self-center">
            <h2 class="billeterie text-dark display-6">Billeterie </h2>
            <a href="<?php echo PAL_URL; ?>"><img src="../images/lePal.webp" alt="Logo le pal" loading="lazy" class="logoPal img-fluid "></a>
        </div>

        <div class="col d-none d-md-block">
            <div class="videoPal embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="<?php echo YOUTUBE2_URL; ?>" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <div class="video-description">Visite du Pal</div>
            </div>
        </div>

    </div>
</div>


</section>


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
        <img src=" ../images/oies.webp" class="d-block w-100 rounded-2" alt="Tourisme En Auvergne" loading="lazy">
        <div class="carousel-caption d-none d-md-block">
          <h5>Ballades au bord des étangs</h5>
          <p>De multiples randonées à faire à pieds ou en vélo</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="../images/tournesol.webp" class="d-block w-100 rounded-2 " alt="Champs De Tournesol" loading="lazy">
        <div class="carousel-caption d-none d-md-block">
          <h5>Champs de tournesols</h5>
          <p>Venez découvrir la beauté des paysages</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src=" ../images/poule.webp" class="d-block w-100 rounded-2" alt="Poules et Poussins" loading="lazy">
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
<section class="container-fluid  mt-5"> <!--J'ai enlevé le background color -->
  <h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index"><strong>AVIS DE NOS CLIENTS</strong></h4>
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
        Cliquez Pour Visualiser Les Commentaires De Nos Clients !
      </div>
    </div>

  </div>

</section>


<?php include("footer.php") ?>

<!-- _____________________________________________________________________________________ -->

<!-- Affichage Popup -->
<script>
// Fonction pour vérifier si le popup a déjà été affiché
  function isPopupShown() {
    return document.cookie.indexOf("popupShown=true") !== -1;
  }

// Fonction pour définir le cookie indiquant que le popup a été affiché
  function setPopupShown() {
    document.cookie = "popupShown=true; expires=Thu, 01 Jan 2030 00:00:00 UTC; path=/";
  }

// Vérifier si le popup a déjà été affiché
  if (!isPopupShown()) {
// Création de la div pour afficher l'image + message + position
    let popupDiv = document.createElement("div");
    popupDiv.style.position = "fixed";
    popupDiv.style.top = "50%";
    popupDiv.style.left = "50%";
    popupDiv.style.transform = "translate(-50%, -50%)";
    popupDiv.style.zIndex = "9999"; // Pour afficher au-dessus de tout élément
    popupDiv.style.textAlign = "center";
    popupDiv.style.background = "white";
    popupDiv.style.padding = "20px";
    popupDiv.style.border = "1px solid #ccc";
    popupDiv.style.borderRadius = "8px";

// Création de l'image à afficher
    let img = document.createElement("img");
    img.src = "../images/lePal2024.png";
    img.style.height = '70%';
    img.style.width = '70%';

// Ajout de l'image à la div
    popupDiv.appendChild(img);

// Ajout du message à la div
    let message = document.createTextNode("");
    popupDiv.appendChild(document.createElement("br")); // Ajout d'un saut de ligne
    popupDiv.appendChild(message);

// Ajout de la div au body de la page
    document.body.appendChild(popupDiv);

// Suppression de la div contenant l'image et le message après 3 secondes
    setTimeout(function() {
      document.body.removeChild(popupDiv);
// Définir le cookie pour indiquer que le popup a été affiché
      setPopupShown();
    }, 8000);
  }
</script>

<!-- _____________________________________________________________________________________ -->

<!-- AFFICHAGE AVIS -->
<script>
// Sélectionne l'élément HTML avec l'id "nouveau" et le stocke dans la variable nouveau
  let nouveau = document.querySelector('#nouveau');
//Sélectionne l'élément HTML avec l'id "avi" (Endroit où va être afficher l'avis) et le stocke dans la variable avi.
  let avi = document.querySelector('#avi');
//Sélectionne l'élément HTML avec l'id "auteur" (Auteur de l'avis) et le stocke dans la variable auteur.
  let auteur = document.querySelector('#auteur');
// Initialise une variable dernier à 0 pour stocker le dernier indice utilisé lors de la génération aléatoire
  let dernier = 0;
//Initialise une variable nombreAleatoire à 0 pour stocker le nouvel indice généré aléatoirement
  let nombreAleatoire = 0;
// Initialise un tableau avis contenant plusieurs sous-tableaux, chacun représentant un avis avec le texte de l'avis et le nom de l'auteur.
  let avis = [
    ["Notre séjour chez Isabelle a été super ! L'hôte était très accueillant et la caravane était propre, confortable et bien situé. Nous avons vraiment apprécié notre séjour et nous recommandons vivement cet endroit !", "Carole"],
    ["Isabelle était très attentionnée et serviable, nous donnant des conseils sur les meilleurs endroits à visiter dans le coin. Nous avons adoré notre séjour ici et nous y retournerons certainement !", "Bastien"],
    ["Nous avons passé un excellent séjour au caravanes de la besbre! Logement confortable, l'hôte était très serviable et sympathique. Nous avons adoré l'emplacement, qui était proche du PAL. Nous recommandons vivement cet endroit.", "Pauline"],
    ["Nous avons passé un excellent séjour au camping. Tout était parfait, de la propreté de la caravane aux équipements fournis. La communication avec l'hôte était également excellente. Nous recommandons vivement cet endroit !", "Manu"],
    ["Nous avons été très impressionnés par la qualité du logement et l'hospitalité de l'hôte. Tout était propre et bien entretenu, et l'hôte était très sympathique et serviable. Nous le recommandons vivement.", "Marc"],

  ];

// Définit une fonction genererNombreEntier qui génère un nombre aléatoire entre 0 (inclus) et max (exclus).
  function genererNombreEntier(max) {
    return Math.floor(Math.random() * Math.floor(max)); //Random donne entre 0 et 1 et floor pour arrondir au plus prêt
  }

//Création evenement clic souris
//La fonction do while suivante génère un nouvel indice aléatoire tant qu'il est égal à l'indice précédent (dernier). Cela garantit que l'avis affiché ne sera pas le même que celui précédemment affiché.
  nouveau.addEventListener('click', () => {
    do {
      nombreAleatoire = genererNombreEntier(avis.length);
    } while (nombreAleatoire == dernier)

//Met à jour le contenu de l'élément avec l'id "avi" en utilisant le texte de l'avis correspondant à l'indice nombreAleatoire dans le tableau avis.
    avi.textContent = avis[nombreAleatoire][0]; //La propriété .textContent en JavaScript retourne ou définit le contenu textuel d'un élément HTML. Par exemple, si vous avez un élément de paragraphe avec du texte à l'intérieur, vous pouvez utiliser .textContent pour récupérer ce texte ou pour le remplacer par un nouveau texte.
    auteur.textContent = avis[nombreAleatoire][1];//Met à jour le contenu de l'élément avec l'id "auteur" en utilisant le nom de l'auteur correspondant à l'indice nombreAleatoire dans le tableau avis.
    dernier = nombreAleatoire;
  }); //Utilise un événement "click" sur un élément HTML avec l'id "nouveau". Lorsque l'événement est déclenché, le code génère un nombre aléatoire entier en utilisant la fonction "genererNombreEntier()" avec la longueur de l'array "avis". 

  //Ensuite, une boucle "do while" vérifie si le nombre aléatoire généré est différent de la dernière valeur stockée dans la variable "dernier". Si les deux valeurs sont égales, le code génère un nouveau nombre aléatoire jusqu'à ce qu'il obtienne une valeur différente.

  //Une fois que le code a obtenu un nombre aléatoire différent de la dernière valeur, il utilise ce nombre pour accéder à un élément spécifique de l'array "avis" et met à jour le contenu des éléments HTML avec les valeurs correspondantes en utilisant ".textContent".

  //Enfin, le code stocke la valeur aléatoire générée dans la variable "dernier", afin de s'assurer que la prochaine fois que l'événement "click" sera déclenché, le code ne répétera pas l'affichage du même élément que le précédent.                                    
</script>
<!--End Avis Clients-->

<!-- COOKIES -->
<script>
    // Fonction pour obtenir la valeur d'un cookie
    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) return match[2];
    }

    // Fonction pour définir un cookie avec une durée d'expiration (en jours)
    function setCookie(name, value, days) {
        var expires = '';
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = '; expires=' + date.toUTCString();
        }
        document.cookie = name + '=' + value + expires + '; path=/';
    }

    // Fonction appelée lorsqu'un utilisateur accepte les cookies
    function acceptCookies() {
        // Ajoutez ici le code pour définir les cookies ou effectuer d'autres actions nécessaires

        // Définir un cookie indiquant que l'utilisateur a accepté les cookies
        setCookie('cookieConsent', 'accepted', 365);

        document.getElementById('cookie-banner').style.display = 'none';
    }

    // Fonction appelée lorsqu'un utilisateur refuse les cookies
    function refuseCookies() {
        // Ajoutez ici le code pour gérer le refus des cookies

        document.getElementById('cookie-banner').style.display = 'none';
    }

    // Vérifier si l'utilisateur a déjà accepté les cookies
    if (getCookie('cookieConsent') !== 'accepted') {
        // Afficher la bannière de consentement après un délai (par exemple, 2 secondes)
        setTimeout(function() {
            document.getElementById('cookie-banner').style.display = 'block';
        }, 2000);
    }
</script>




</body>
  </html>