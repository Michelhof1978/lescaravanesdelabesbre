<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Réservation de caravanes</title>
</head>

<body>

  <?php include("head.php") ?>

  <h4 class="m-5 text-center border border-3 rounded text-white p-2 display-6 h4Index" id="contact"><strong>RÉSERVATION DE CARAVANES</strong></h4>

  <?php include("header.php") ?>

  <form class="needs-validation" id="formulaire" novalidate action="/submit" method="post">

    <fieldset class="mb-5 ms-2 me-2">

      <div class="row d-flex justify-content-center">

        <div class="col-md-6">

          <div class="row mb-4">

            <div class="col">
              <div class="form-outline">
                <label for="firstName" class="form-label">Prénom</label>
                <input name="firstName" type="text" id="firstName" class="form-control" placeholder="Prénom" required>
                <div class="invalid-feedback">
                  Veuillez saisir votre prénom.
                </div>
              </div>
            </div>

            <div class="col">
              <div class="form-outline">
                <label for="lastName" class="form-label">Nom</label>
                <input name="lastName" type="text" id="lastName" class="form-control" placeholder="Nom" required>
                <div class="invalid-feedback">
                  Veuillez saisir votre nom.
                </div>
              </div>
            </div>

          </div>

          <div class="form-outline mb-4">
            <label for="phoneNumber" class="form-label">Numéro de Téléphone</label>
            <input name="phoneNumber" type="tel" id="phoneNumber" class="form-control" placeholder="Téléphone" pattern="[0-9]{10,15}" required>
            <div class="invalid-feedback">
              Veuillez saisir un numéro de téléphone valide (au moins 10 chiffres).
            </div>
          </div>

          <div class="form-outline mb-4">
            <label for="email" class="form-label">Adresse Email</label>
            <input name="email" type="email" id="email" class="form-control" placeholder="Email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|fr|net|org|eur)">
            <div class="invalid-feedback">
              Veuillez saisir une adresse email valide avec un domaine .com, .fr, .net, .org, ou .eur.
            </div>
          </div>

        </div>

      </div>

      <div class="row d-flex justify-content-center">

        <div class="col-md-6">

          <div class="form-outline mb-4">
            <label class="form-label round" for="nombreAdultes">Nombre d'adultes :</label>
            <input name="nombreAdultes" type="number" id="nombreAdultes" class="form-control" placeholder="Indiquez le nombre d'adultes" required min="0">
            <div class="invalid-feedback">
              Veuillez saisir un nombre d'adultes valide.
            </div>
          </div>

          <div class="form-outline mb-4">
            <label class="form-label round" for="nombreEnfants">Nombre d'enfants :</label>
            <input name="nombreEnfants" type="number" id="nombreEnfants" class="form-control" placeholder="Indiquez le nombre d'enfants" required min="0">
            <div class="invalid-feedback">
              Veuillez saisir un nombre d'enfants valide.
            </div>
          </div>

          <div id="containerDatesNaissance" class="mb-4">
            <h5 class="form-label round">Informations sur les enfants :</h5>
            <div class="
