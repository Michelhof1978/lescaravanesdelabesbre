<?php include("header.php") ?>

<h1 style="text-align:center; font-size: 40px;color: gray;">Loin de tout, proche de l'étientiel</h1>

<div class="clear"></div>





<section id="slideshow2">

	<div class="container2">
		<div class="c_slider2"></div>
		<div class="slider2">

			<figure2>
            <video width="730" height="410" controls autoplay>
      <source src="../videos/besbre.mp4" type=video/mp4>
      <div class="attribution-block"><a href="http://dig.ccmixter.org/files/Radioontheshelf/63894">Yesterdays Blues</a> by Radioontheshelf (c) copyright 2021 Licensed under a Creative Commons <a href="http://creativecommons.org/licenses/by/3.0/">Attribution (3.0)</a> license. Ft: Mr Yesterday & The Lovely Ladies</div>
        </video>
            </figure2>

        </div>
       </div>
</div>
</section>

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
      <section class="mb-5">
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

<div class="logoTourisme2 img-fluid">
    <img class="logoTourisme" src="../images/logoTourisme.png" alt="" />
    <div class="clear"></div>
</div>
<?php include("footer.php") ?>