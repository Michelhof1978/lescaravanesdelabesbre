





<?php
if (isset($_POST["message"])) {
    $message = "Message envoyé de :\n" .
               "Nom : " . $_POST["firstName"] . "\n" .
               "Prénom : " . $_POST["lastName"] . "\n" .
               "Téléphone : " . $_POST["phoneNumber"] . "\n" .
               "Email : " . $_POST["email"] . "\n" .
               "Objet : " . $_POST["objet"] . "\n" .
               "Message : " . $_POST["message"];

    $retour = mail("isabelle.deschins@sfr.fr", $_POST["objet"], $message, "From: contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to: " . $_POST["email"]);

    if ($retour) {
        // Redirection vers une page de confirmation
        echo "Formulaire envoyé avec succès !"; // Message de débogage
        header("Location: public/confirmationContactResa.php");
        exit();
    } else {
        echo "Une erreur est survenue lors de l'envoi du formulaire. Veuillez réessayer.";
    }
}
?>

<div class="row ">
   

      <div class="col-sm-12 col-xl-6 ">
        <img src="../images/camping1.webp" alt="Le Pal" class="img-fluid" />
      </div>

      <div class="col-sm-12 col-xl-6 ">
        <p class="textIntro lead bg-light rounded shadow p-4 pb-5 bg-white rounded ms-1 me-1 ">
          Profitez d'une expérience de camping unique au <strong> <a href="https://camping.mairie-dsb.fr/">Camping proche du Pal de Dompierre Sur Besbre</a>, situé à proximité du parc d'attractions <a href="https://www.lepal.com/">Le-Pal</a></strong>.
          Niché dans un cadre naturel exceptionnel en bordure d'une rivière et à proximité des commerces, ce site paisible et verdoyant offre une atmosphère propice à la détente et au ressourcement.

          Vous serez enchanté par l'ambiance caravane proposée par notre équipe. Des caravanes tout confort et entièrement équipées sont disponibles du <strong>03/07/2023 au 27/08/2023</strong> pour accueillir 4 personnes chacune (2 adultes et 2 enfants).
          En outre, une épicerie de base est fournie, comprenant café, sucre, sel, poivre, huile, etc.

          Notre équipe, dirigée par Isabelle, se fera un plaisir de vous aider à rendre votre séjour inoubliable. N'hésitez pas à nous contacter pour plus d'informations ou pour réserver votre séjour dès maintenant.
        </p>
      </div>
      
    </div>



  </div>

  <h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index" id="contact"><strong>RESERVEZ</strong></h4>


<form class="needs-validation" id="formulaire" novalidate action="#" method="POST">
    <fieldset class="mb-5 ms-2 me-2">

        <div class="row d-flex justify-content-center">
            <div class="col-md-6">

<!-- 2 column grid layout with text inputs for the first and last names -->
<div class="row mb-4">

    <div class="col">
        <div class="form-outline">
            <input name="firstName" type="text" id="firstName" class="form-control"placeholder="Prénom" required/>
            <label for="firstName" class="form-label"></label>
        <div class="invalid-feedback">
            Veuillez saisir votre prénom.
        </div>
        </div>
</div>

<div class="col">
    <div class="form-outline">
        <input name="lastName" type="text" id="lastName" class="form-control"placeholder="Nom" required/>
            <label for="lastName" class="form-label"></label>
                <div class="invalid-feedback">
                    Veuillez saisir votre nom.
                </div>
    </div>
</div>

<div class="col">
    <div class="form-outline">
        <input name="phoneNumber" type="tel" id="phoneNumber" class="form-control" placeholder="Téléphone" required/>
            <label for="phoneNumber" class="form-label"></label>
                <div class="invalid-feedback">
                     Veuillez saisir votre téléphone.
                </div>
    </div>
</div>

</div>

<!-- Email input -->
<div class="form-outline mb-4">
    <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input name="email" type="email" id="email" class="form-control " placeholder="Email" required/>
                </div>
                    <label for="email" class="form-label"></label>
                        <div class="invalid-feedback">
                            Veuillez saisir votre Email.
                        </div>
                </div>

<div class="form-outline mb-4">
    <label class="form-label round" for="objet">Objet :</label>
        <select class="form-label" name="objet" id="objet">
            <option>Renseignements</option>
            <option>Résérvation</option>
        </select>
</div>


<div class="form-floating ">
    <textarea name="message" class="form-control " id="message" required></textarea>
        <label for="message">Message</label>
            <div class="invalid-feedback">
                Veuillez saisir votre message.
            </div>
</div>

<!-- Submit button -->
<button type="submit" value="Valider" id="send-data" class="btn btn-primary btn-block mb-4 mt-5">
    Envoyez
</button>

</div>
    </div>
        </fieldset>
</form>


<?php include("footer.php") ?>

