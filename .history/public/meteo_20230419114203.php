
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
          
            <div class="container py-5 ">
                <div class="row text-center">

                <div class="planPal col-6 text-center">
<a href="../images/planPal.pdf "  download>
<img src="../images/pal50Ans.webp" alt="Plan le pal" title="Plan du Pal" class="logoPal img-fluid h-50" /> 
</a>
<h3 class="mt-3">Téléchargez le plan !</h3>
</div>

<div class="meteoContainer  col-5 text-center pt-2">
<h2>Météo du jour <br> <strong><?php echo $name; ?></strong></h2>
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

                        <div class="">
                            <h2>
                                <?php echo $temp; ?> °C <br />
                                <?php echo $speed; ?> Km/h <br /> 
                                <?php echo $desc; ?>
                        </h2>
                    </div>
                </div>
            </div>
            </div>
        </body>
</html>