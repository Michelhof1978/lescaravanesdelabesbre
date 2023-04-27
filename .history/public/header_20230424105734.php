<head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>

<body>

<div id="mainNavigation">

  <nav role="navigation" >

    <div class="pt-2 text-center border-bottom ">
      
      <img id="logo" src="../images/logo.webp" alt="Logo Les caravanes De La Besbre" style="height:160px " class="img-fluid logo ">

      <div class=" navbar-brand fs-2 textLogo" href="#">Les Caravanes De La Besbre <span class="orange">.</span></div> 
      
      <img src="../images/papillons.gif" alt="Papillons" style="height:100px " class="img-fluid">
    </div>

    <button id="mode" class="">
          <i class="fas fa-moon"></i>
          <span>Thème sombre</span>
        </button>

   <script>     let button = document.querySelector('#mode');
let span   = document.querySelector('span');

if(localStorage.getItem('theme')){
  if(localStorage.getItem('theme') == 'sombre') {
    modeSombre();
  }
}

button.addEventListener('click', () => {
  if(document.body.classList.contains('dark')) {
    document.body.className = '';
    span.textContent = 'Thème sombre';
    localStorage.setItem('theme', 'clair');
  }
  else {
    modeSombre();
  }
});

function modeSombre() {
  document.body.className = 'dark';
  span.textContent = 'Thème clair';
  localStorage.setItem('theme', 'sombre');
}
 
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
