


<h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index" id="contact"><strong>NOUS CONTACTER</strong></h4>

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


<?php
if (isset($_POST["message"])) {
$message = "Message envoye de :
Nom : ".$_POST["firstName"]."
Prenom : ".$_POST["lastName"]."
Telephone : ".$_POST["phoneNumber"]."
Email : ".$_POST["email"]."
Objet : ".$_POST["objet"]."
Message : ".$_POST["message"];

$retour = mail("isabelle.deschins@sfr.fr ", $_POST["objet"], $message,"From:contact@Lescaravanesdelabesbre.fr" . "\r\n" . "Reply-to:" . $_POST["email"]);

if ($retour) {
echo "<p></p>";
}
}
?>


