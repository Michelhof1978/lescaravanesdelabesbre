<?php  

$url = "https://api.openweathermap.org/data/2.5/weather?q=dompierre-sur-besbre&lang=fr&units=metric&appid=a2c110c02e86989d65348566c3ad09ff";
$raw = file_get_contents($url);//Récupérer le contenu de l api
$json = json_decode($raw);//Pour décoder en json le contenu de l api
var_dump($json);//Pour afficher le json

$name = $json -> name;//On récupére la ville ds le tableau json et on vérifie si la ville est affiché à la fin du json donc reconnu

$weather = $json -> weather[0] -> main;//On récupre la météo
$desc =  $json -> weather[0] -> description;//On récupre la description de la meteo
// echo $weather  . " " . $desc;//Pour afficher la météo et voir si c est ok

$temp = $json -> main -> temp;//On récupére la température ds le fichier json
$feels_like = $json -> main -> feels_like;//
// echo $temp . " " . $feels_like;//On vérifie si affichage en fin du json

$speed = $json -> wind -> speed;//On récupére la vitesse du vent
$deg = $json -> wind -> deg;//on récupére la force du vent
// echo $speed . " " . $deg;//On affiche à la fin du json si ok, toujours vérifier si ok,  on voit la vitesse du vent + le degrés où il tourne

?>

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Boostrap -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <!-- Style -->
            <link href="../css/style.css" rel="stylesheet">
            <title>Météo</title>
        </head>
        <body>
          
            <div class="container text-center py-5">
                <h1>Météo du jour à <strong><?php echo $name; ?></strong></h1>

                <div class="row justify-content-center align-items-center">

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

                        <div class="meteo_desc text-left">
                            <h2>
                                <?php echo $temp; ?> °C / Ressenti <?php echo $feels_like; ?> °C <br />
                                <?php echo $speed; ?> Km/h - <?php echo $deg; ?> ° <br /> 
                                <?php echo $desc; ?>
                        </h2>
                    </div>
                </div>
            </div>
        </body>
</html>