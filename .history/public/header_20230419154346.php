<head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>

<body>

<div id="mainNavigation">

  <nav role="navigation" >

    <div class="pt-2 text-center border-bottom ">
      
      <img id="logo" src="../images/logo.webp" alt="Logo Les caravanes De La Besbre" style="height:160px " class="img-fluid logo ">

      <div class=" navbar-brand fs-2 textLogo" href="#">Les Caravanes De La Besbre <span class="orange">.</span></div> 
      
      <img src="../images/papillons.gif" alt="Papillons" style="height:100px " class="img-fluid">
    </div>

    
 
  <div class="navbar-expand-md ">
    <div class=" text-center  ">

       <button class="navbar-toggler w-75  navbar-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <img src="../images/hamburger.webp" alt="Hamburger navbar" class="me-2 mt-1" style="height: 30px;"><span class="align-middle mt-1">Menu </span>
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
          <a class="nav-link" href="https://www.lepal.com/">Vente Billets</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="camping.php">Le Camping</a>
        </li>

        <li class="nav-item">
        <a class="nav-link " #contact  href="#contact">Contact</a>
        </li>
        
      </ul>
     
    </div>
  </div>
</div>


</nav>

<div class="container-fluid text-center m-0 ">
<img src="../images/banner3.webp" alt="Banner les caravanes de la besbre" class="banner ">
</div>
<--!Météo 
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

          
            <div class="container-fluid py-5 ">
                <div class="row ">

                <div class="planPal col-xl-6 col-md-6 text-center mt-5">
<a href="../images/planPal.pdf "  download>
<img src="../images/pal50Ans.webp" alt="Plan le pal" title="Plan du Pal" class="logoPal50 img-fluid h-50" /> 
</a>
<h3 class="m-3 ps-4 textLogo50">Téléchargez le plan !</h3>
</div>

<div class=" col-xl-6 col-md-6 text-center pt-2  ">
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




          



