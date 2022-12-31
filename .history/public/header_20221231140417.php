<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" type="text/css" href="../css/caroussel.scss">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  
  
<div class="container-fluid">

  <div class="row justify-content-around">  
    <div class=" col p-0"><img src="../images/logo.png" alt="Logo" width="150" height="130" ></div>
  <div class="navbar-brand fs-2 ps-3  col" href="#">Les Caravanes De La Besbre <span class="orange">.</span></div>
  <div class="collapse navbar-collapse  custom-line mx-5 c" id="navbarNav"><!-- id appel la fonction hamburger de boostrap aria-controls -->
      <ul class="navbar-nav fs-5">
        <li class="nav-item">
          <a class="nav-link" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tourisme</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Logements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Contact</a>
        </li>
      </ul>
    </div>
    
    </div>
</div>
  
  
  <!-- Création hamburger en responsive -->
    <button class="navbar-toggler  py-4 px-4 text-bg-grey border border-dark " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon position-absolute  translate-middle "></span>
    </button>

    
    
  
    </div>
</nav>



<header class="text-center p-5" style="background-image:url(../images/banner.png); background-size:cover; background-position:center; width:100%; height: 350px;">
 
            <p style="color:white; font-size:40px;">Bienvenue sur le site de réservation<br>
            <strong>Les Caravanes de la Besbre</strong> 
            </p>
       <div> <button class="styled" type="button">Réservez ! </button></div>
          <div><img src="../images/lePal.png" class="" alt="logo Pal"> </div> 
</header>



 <!-- BOOTSTRAP JavaScript -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>