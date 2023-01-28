<?php include("header.php") ?>

<h1 class="pb-2 border border-3 text-center rounded bg-light m-4">Loin de tout, proche de l'éssentiel</h1>

 <!-- Destination Start -->
 <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1>Explore Top Destination</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="../img/banner1.png" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">United States</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="../images/banner1.png" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">United Kingdom</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="../images/banner1.png" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Australia</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="../images/banner1.png" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">India</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="../images/banner1.png" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">South Africa</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="/banner1.png" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Indonesia</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Destination Start -->


<!--afficheTourisme-->
<section class="container mt-4 afficheTourisme w-50">
  <div class="row ">
<div class="img-fluid ">
<img src=" ../images/afficheTourisme.png" alt="...">
</div>
</div>
</section>
<!--End afficheTourisme-->


<!--Video page tourisme-->
<section class="container mt-3 ">
<div class="row ">

<div class="slideShow embed-responsive embed-responsive-16by9 col-lg-6 mt-4">
    <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/GeCGXlwJA4Q" frameborder="0" allowfullscreen></iframe>
</div>

<div class="mt-5 col-lg-6">
        <p class="textIntro lead bg-light rounded shadow p-4 bg-white ms-1 me-1 ">
L'Allier au paradis du tourisme vert ! La rando, les sports de plein air, les séjours campagnards... mais aussi de remise en forme, puisque l'Allier compte plusieurs villes d'eau d'importance, dont la plus connue, Vichy.
Se mettre au vert : le Val de Cher, la Vallée de la Sioule, la Montagne Bourbonnaise, la Sologne Bourbonnaise, la forêt de Tronçais, etc... on ne compte plus les sites remarquables de l'Allier, offrant nature et paysages variés, mais aussi une foule d'activités... la destination idéale pour un séjour rural. 
  Randonnée, sports de plein air, thalasso et gastronomie, 
tous les ingrédients sont réunis pour un weekend des vacances de remise de forme, à grand renfort de bons bols d'air !
        </p>
    </div>

</div> 
</section>
<!--End Video page tourisme-->

<!--Bouton logo -->
<div class="container">
<a href="https://www.allier-auvergne-tourisme.com/commerce-et-service/dompierre-sur-besbre/office-de-tourisme-entr-allier-besbre-et-loire-site-de-dompierre-sur-besbre/4906237"><img src="../images/officeTourismeLogo.png" class="logoPal img-fluid w-25"/></a> 
</div>
<!--End bouton logo-->

<!--SlideShow-->
<div class="container w-50">
<div class=" mt-4 slideShow">
    <video controls><source src="../videos/besbre.mp4" type=video/mp4></video>
</div>
</div>
<!--EndSlideShow-->



<!--FormulaireDeContact-->
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

      <form action="#" method="POST">
      <section class="m-5">
        <h4 class="mb-5 text-center git push --set-upstream origin" id="contact"><strong>NOUS CONTACTER</strong></h4>

       
       
       
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
                <label class="form-label" for="form3Example5">Objet:</label>
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
        <!--EndFormulaireDeContact-->

<div class="text-center">
    <img class="img-fluid" src="../images/logoTourisme.png" alt="" />
</div>


<?php include("footer.php") ?>