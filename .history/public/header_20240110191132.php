<body> 
<?php
// Constantes pour les URLs
define('AUTHOR_URL', 'https://cvmichel-hoffmann.fr/');
define('FACEBOOK_URL', 'https://www.facebook.com/lescaravanesdelabesbre/');
define('TOURISM_URL', 'https://tourisme.interco-abl.info/');
define('INSTAGRAM_URL', 'https://www.instagram.com/lescaravanesdelabesbre/?hl=fr');
define('METEO_URL', 'https://meteofrance.com/previsions-meteo-france/allier/3');
define('LINKEDIN_URL', 'https://www.linkedin.com/in/michel-h-245436203/');
define('GITHUB_URL', 'https://github.com/Michelhof1978/');
define('CAMPING_URL', 'https://camping.mairie-dsb.fr/');
define('PAL_URL', 'https://www.lepal.com/');
define('AIRBNB1_URL', 'https://www.airbnb.fr/rooms/34618829?check_in=2023-07-07&check_out=2023-07-09&guests=1&adults=2&s=13&unique_share_id=9da18392-0809-4421-8f7b-23e32304aadb&source_impression_id=p3_1673810175_X9sGQDLRkdBr8tX%2F');
define('AIRBNB2_URL', 'https://www.airbnb.fr/rooms/34376099?check_in=2023-07-07&check_out=2023-07-09&guests=1&adults=2&s=13&unique_share_id=0e8b24e2-1835-49a1-a4a3-18082f186b0a&source_impression_id=p3_1673810303_FnHo0G0d1awJpqSg');
define('AIRBNB3_URL', 'https://www.airbnb.fr/rooms/34376099?check_in=2023-07-07&check_out=2023-07-09&guests=1&adults=2&s=13&unique_share_id=0e8b24e2-1835-49a1-a4a3-18082f186b0a&source_impression_id=p3_1673810303_FnHo0G0d1awJpqSg');
define('FESTIDOMPFB_URL', 'https://m.facebook.com/festi.domp.3');
define('YOUTUBE1_URL', 'https://www.youtube.com/embed/s77ml0_4XUA');
define('YOUTUBE2_URL', 'https://www.youtube.com/embed/s77ml0_4XUA');

?>   
<header>
    <nav id="mainNavigation">
      <div class="pt-2 text-center border-bottom ">

      <img src="../images/logo.webp" alt="Logo Les caravanes De La Besbre" loading="lazy" style="height:160px " class="img-fluid logo ">

        <div class=" navbar-brand fs-2 textLogo">Les Caravanes De La Besbre <span class="orange">.</span></div>

        <img src="../images/papillons.gif" alt="Papillons" style="height:100px" loading="lazy" class="img-fluid">
      </div>


      <div class="navbar-expand-md ">
        <div class="text-center">

          <button class="navbar-toggler w-75  navbar-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="../images/hamburger.webp" loading="lazy" alt="Hamburger navbar" class="me-2 mt-1" style="height: 30px;"><span class="align-middle mt-1">Menu </span>
          </button>

        </div>

        <div class="text-center mt-3 collapse navbar-collapse " id="navbarSupportedContent">

          <ul class="navbar-nav mx-auto" id="menu">

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="informations.php">Informations</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="tourisme.php">Tourisme</a>
            </li>

            <li class="nav-item">
  <a class="nav-link" href="<?php echo PAL_URL; ?>" target="_blank">Billets Le Pal</a>
</li>


            <li class="nav-item">
              <a class="nav-link" href="camping.php">Le Camping</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="souvenirDeVacances.php">Souvenirs De Vacances</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="#contact">Contact</a>
            </li>

          </ul>

        </div>
      </div>
  </nav>
 

  <div class="container-fluid text-center m-0">
      <img src="../images/banner3.webp" loading="lazy" alt="Banner les caravanes de la besbre" class="banner">
    </div>

  </header>