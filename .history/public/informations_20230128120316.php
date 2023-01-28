<?php include("header.php") ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
  

  
<div class="container-fluid ">

   
<div class=" row  d-flex align-items-start">
    <div class="col " ><img src="../images/logo.png" alt="Logo" width="150" height="auto" ></div>
    <div class=" col navbar-brand pt-0 ps-4 ms-2 fs-3" href="#">Les Caravanes De La Besbre <span class="orange">.</span></div>
</div>

<!-- Création hamburger en responsive -->
<button class="navbar-toggler col" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <!-- Fin Création hamburger en responsive -->
  

     <div class="d-flex align-self-end  m-0 ">
    <div class=" collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav px-5 ">

  <li class="nav-item navbar ps-3">
    <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
  </li>
  <li class="nav-item navbar ps-3">
    <a class="nav-link" href="informations.php">Informations</a>
  </li>
  <li class="nav-item navbar ps-3">
    <a class="nav-link navbar" href="tourisme.php">Tourisme</a>
  </li>
  <li class="nav-item navbar ps-3">
    <a class="nav-link " href="https://www.lepal.com/">Billets</a>
  </li>
  <li class="nav-item navbar ps-3">
    <a class="nav-link " #contact  href="#contact">Contact</a>
  </li>


</div>

</div> 
    </div>
    
</nav>






<div class="w-50 img-fluid mt-5 container info img-fluid">
<img src=" ../images/informations.png" class="d-block w-100 " alt="...">
</div>



<!--Section FORMULAIRECONTACT-->
<?php 
if (isset($_POST["message"])) {
  $message = "Message envoye de :
  Prénom : ".$_POST["Prénom"]."
  Nom : ".$_POST["nom"]."
  Téléphone : ".$_POST["Téléphone"]."
  Email : ".$_POST["email"]."
  Objet : ".$_POST["objet"]."
  Message : ".$_POST["message"];

$retour = mail("isabelle.deschins@sfr.fr", $_POST["objet"], $message,"From:contact@cvmichel-hoffmann.fr" . "\r\n" . "Reply-to:" . $_POST["email"]);

if ($retour) {
  echo "<p>L'email a bien été envoyé</p>";
}
}
?>
<section>
      <form action="#" method="POST">
      <section class="mb-5 ms-2 me-2">
        <h4 class="m-5 text-center border border-3 rounded bg-light p-2 display-6" bg-light id="contact"><strong>NOUS CONTACTER</strong></h4>

       
       
       
        <div class="row d-flex justify-content-center">
          <div class="col-md-6">
          <form>
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row mb-4">

                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control"placeholder="Prénom" />
                    <label class="form-label" for="form3Example1"></label>
                  </div>
                </div>

                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form3Example2" class="form-control"placeholder="Nom" />
                    <label class="form-label" for="form3Example2"></label>
                  </div>
                </div>

                <div class="col">
                  <div class="form-outline">
                    <input type="tel" id="form3Example3" class="form-control" placeholder="Télèphone" />
                    <label class="form-label" for="form3Example3"></label>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example4" class="form-control " placeholder="Email" />
                <label class="form-label" for="form3Example4"></label>
              </div>

              
              
             
              <div class="form-outline mb-4">
                <label class="form-label round" for="form3Example5">Objet :</label>
                   <select class="form-label" name="objet" for="form3Example5" id="objet">
                     <option>Renseignements</option>
                     <option>Résérvation</option>
                    </select>
             </div>
             

              <div class="form-floating ">
                <textarea class="form-control " placeholder="Leave a comment here" id="floatingTextarea"></textarea>
               <label for="floatingTextarea">Message</label>
            </div>

              

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4 mt-5">
                Envoyez
              </button>

              
            </form>
          </div>
        </div>
        </section>
        <!--EndFormulaireDeContact-->

      </section>
      <!--Section: Content-->
   
  <!--Main layout-->
<?php include("footer.php") ?>