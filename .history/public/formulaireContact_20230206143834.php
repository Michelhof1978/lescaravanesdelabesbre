

<h4 class="m-5 text-center border border-3 rounded  text-white p-2 display-6 h4Index" id="contact"><strong>NOUS CONTACTER</strong></h4>

php include("header.php") ?>
<?php 
if (isset($_POST["message"])) {
  $message = "Message envoyé de :
  Nom : ".$_POST["nom"]."
  Email : ".$_POST["email"]."
  Objet : ".$_POST["objet"]."
  Message : ".$_POST["message"];

$retour = mail("michel.hof@hotmail.fr", $_POST["objet"], $message,"From:contact@cvmichel-hoffmann.fr" . "\r\n" . "Reply-to:" . $_POST["email"]);

if ($retour) {
  echo "<p>L'email a bien été envoyé</p>";
}
}
?>

<!--Corps du site-->
<div class="corps size20 text">
<h2 class="size40 borderBottomDark">Me contacter</h2>

<div>
  <form action="#" method="POST">
    <fieldset>
      <legend>Renseigner les informations</legend>

    <div>
    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom" placeholder="Nom / Prenom" required/>
  </div>

  <div>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" placeholder="nom@exemple.com" required/>
  </div>

  <div>
    <label for="objet">Objet:</label>
    <select name="objet" id="objet">
      <option>Pour m'embaucher</option>
      <option>Proposition d'un projet</option>
      <option>Autre</option>
      
    </select>
  </div>
  
  <div>
    <label for="message">Message:</label>
    <textarea name="message" id="message"cols="30" rows="5"></textarea>
  </div>
  <input type="submit" value="Valider" class="buttonContact" />
</fieldset>
  </form>

  
</div>
</div>
  <!--isabelle.deschins@sfr.fr-->


     

          
        <!--EndFormulaireDeContact-->

