<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>

<body>

<div id="mainNavigation">

  <nav role="navigation" >

    <div class="pt-2 text-center border-bottom ">
      
      <img id="logo" src="../images/logo.webp" alt="Logo Les caravanes De La Besbre" style="height:160px " class="img-fluid logo ">

      <div class=" navbar-brand fs-2 textLogo" href="#">Les Caravanes De La Besbre <span class="orange">.</span></div> 
      
      <img src="../images/papillons.gif" alt="Papillons" style="height:100px " class="img-fluid">
    </div>

    <button id="mode">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
  <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
</svg>
          <span>Thème sombre</span>
        </button>
        <style> 
        button {
    border: 1px;
    border-radius: 15px;
    padding: 15px;
    cursor: pointer;
  }
  
  * {
    outline: 0;
  }
  
  .dark {
    background-color: #112F41;
    color: #ffffff;
  }
  
  .dark button {
    background: #144098;
    color: #fff;
  }</style>

        <script>
          let button = document.querySelector('#mode');
let span   = document.querySelector('span');

if(localStorage.getItem('theme')){
  if(localStorage.getItem('theme') == 'sombre') {
    modeSombre();
  }
}

button.addEventListener('click', () => {
  if(document.body.classList.contains('dark')) {
    document.body.className = '';
    // span.textContent = 'Thème sombre';
    localStorage.setItem('theme', 'clair');
  }
  else {
    modeSombre();
  }
});

function modeSombre() {
  document.body.className = 'dark';
//   span.textContent = 'Thème clair';
  localStorage.setItem('theme', 'sombre');
}
        </script>
 
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
