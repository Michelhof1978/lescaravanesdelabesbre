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
define('AIRBNB1_URL', 'https://www.lepal.com/');
define('AIRBNB1_URL', 'https://www.lepal.com/');
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