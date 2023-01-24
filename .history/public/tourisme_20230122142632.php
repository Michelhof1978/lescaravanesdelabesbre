<?php include("header.php") ?>

<h1 class="pb-2 border border-3 text-center rounded bg-light m-4">Loin de tout, proche de l'éssentiel</h1>

<!--Video page tourisme-->
<section class="container mt-5 ">
<div class="row ">

<div class="slideShow embed-responsive embed-responsive-16by9 col col-xl-6 mt-4">
    <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/GeCGXlwJA4Q" frameborder="0" allowfullscreen></iframe>
</div>

<div class="col mt-5 col-xl-6">
        <p class="textIntro lead bg-light rounded shadow p-4 mb-5 bg-white ms-1 me-1 ">
L'Allier au paradis du tourisme vert ! La rando, les sports de plein air, les séjours campagnards... mais aussi de remise en forme, puisque l'Allier compte plusieurs villes d'eau d'importance, dont la plus connue, Vichy.
Se mettre au vert : le Val de Cher, la Vallée de la Sioule, la Montagne Bourbonnaise, la Sologne Bourbonnaise, la forêt de Tronçais, etc... on ne compte plus les sites remarquables de l'Allier, offrant nature et paysages variés, mais aussi une foule d'activités... la destination idéale pour un séjour rural. 
  Randonnée, sports de plein air, thalasso et gastronomie, 
tous les ingrédients sont réunis pour un weekend des vacances de remise de forme, à grand renfort de bons bols d'air !
        </p>
    </div>

</div> 
</section>
<!--End Video page tourisme-->


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