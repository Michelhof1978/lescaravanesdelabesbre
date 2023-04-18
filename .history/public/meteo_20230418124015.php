<?php  

$url = "https://api.openweathermap.org/data/2.5/weather?q=dompierre-sur-besbre&lang=fr&units=metric&appid=a2c110c02e86989d65348566c3ad09ff";
$raw = file_get_contents($url);//Récupérer le contenu de l api
$json = json_decode($raw);//Pour décoder en json le contenu de l api


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Titre de la page</title>
  </head>
  <body>
    <h1>Titre principal</h1>
    <p>Paragraphe de texte.</p>
    <ul>
      <li>Élément de liste 1</li>
      <li>Élément de liste 2</li>
      <li>Élément de liste 3</li>
    </ul>
  </body>
</html>
