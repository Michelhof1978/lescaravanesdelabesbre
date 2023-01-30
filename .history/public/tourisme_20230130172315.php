<?php include("header.php") ?>

 <!-- Topbar Start -->
 


    <!-- About Start -->
    <div class="container-fluid py-5 sectionTourime">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="../images/tourisme.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">A VISITER</h6>
                        <h1 class="mb-3">Loin de tout, proche de l'éssentiel</h1>
                        <p>L'Allier au paradis du tourisme vert ! La rando, les sports de plein air, les séjours campagnards... mais aussi de remise en forme, puisque l'Allier compte plusieurs villes d'eau d'importance, dont la plus connue, Vichy.
Se mettre au vert : le Val de Cher, la Vallée de la Sioule, la Montagne Bourbonnaise, la Sologne Bourbonnaise, la forêt de Tronçais, etc... on ne compte plus les sites remarquables de l'Allier, offrant nature et paysages variés, mais aussi une foule d'activités... la destination idéale pour un séjour rural. 
  Randonnée, sports de plein air, thalasso et gastronomie, 
tous les ingrédients sont réunis pour un weekend des vacances de remise de forme, à grand renfort de bons bols d'air !</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="../images/tourisme1.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="../images/tourisme3.jpg" alt="">
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


   


    <!-- Destination Start -->
    <div class="container-fluid ">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination ALLIER</h6>
                <h1>Nature et air pure</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class=" position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="../images/tourisme4.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class=" position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="../images/tourisme5.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class=" position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="../images/tourisme6.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class=" position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="../images/tourisme7.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class=" position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="../images/tourisme8.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class=" position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="../images/tourisme9.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Destination Start -->

<div class="container">

<!--Bouton logo -->
<div class=" text-center mt-5">
<a href="https://www.allier-auvergne-tourisme.com/commerce-et-service/dompierre-sur-besbre/office-de-tourisme-entr-allier-besbre-et-loire-site-de-dompierre-sur-besbre/4906237"><img src="../images/officeTourismeLogo.png" class="logoPal img-fluid w-25"/></a> 
<img class="img-fluid imgTourismeLogo" src="../images/logoTourisme.png" alt="" />
</div>
<!--End bouton logo-->

<!--logo tourisme-->

<!--Fin logoTourisme -->

</div>

<!--SlideShow-->
<div class="container videoTourisme ">
    <div class=" mt-4 videoTourisme2 row d-flex justify-content-center ">
<div></div>
<div class="col-8">
    <video class="" controls><source src="../videos/besbre.mp4" type=video/mp4></video>
</div>

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
        <h4 class="m-5 text-center border border-3 rounded  text-white p-2 display-6 h4Index"" id="contact"><strong>NOUS CONTACTER</strong></h4>

       
       
       
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


<?php include("footer.php") ?>