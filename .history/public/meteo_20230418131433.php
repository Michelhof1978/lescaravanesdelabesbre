<?php  

$url = "https://api.openweathermap.org/data/2.5/weather?q=dompierre-sur-besbre&lang=fr&units=metric&appid=a2c110c02e86989d65348566c3ad09ff";
$raw = file_get_contents($url);//Récupérer le contenu de l api
$json = json_decode($raw);//Pour décoder en json le contenu de l api
var_dump($json);//Pour afficher le json
$name = $json -> name;//On récupére la ville ds le tableau json

$weather = $json -> weather[0] -> main;//On récupre la météo
$desc =  $json -> weather[0] -> description;//On récupre la description de la meteo
echo $weather = . $desc;//On récupre
?>

<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>       
  </body>
</html>
