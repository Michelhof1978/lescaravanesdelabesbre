<?php include("head.php") ?>
<meta name="description" content="Vacance en Auvergne">
<title>Tourisme auvergne Dompierre sur besbre</title>
</head>

<?php include("header.php") ?>

<h1 class="pb-2 text-center border border-3 rounded h1Index pt-1 text-white mt-5">Souvenirs De Vacances</h1>

<div class="mt-5 text-center bg-light rounded shadow p-4 bg-white ms-1 me-1 mb-3">
  <h3>Vous avez des souvenirs de vacances à partager ?</h3>
  <p class="lead">
    Des vidéos, des images ou un petit message que vous souhaitez nous
    faire passer ? Nous serions ravis de les recevoir ! Vos contributions permettront à nos utilisateurs d'être
    guidés dans leurs futures escapades et de découvrir quelques balades secrètes à faire. N'oubliez pas :
    profitez de la vie à fond et partagez ces moments magiques avec la communauté ! Ensemble, créons des
    souvenirs inoubliables et inspirons-nous mutuellement pour nos prochaines aventures. Merci de partager vos
    merveilleuses expériences de vacances avec nous !
  </p>
</div>

<div class="container mt-5 mb-5">
  <div class="row">
    <!-- Bloc festi1 - à gauche -->
    <div class="col-lg-6 mb-4">
      <div class="text-center mb-4">
        <img src="../images/festiDomp.webp" alt="logo festi domp" loading="lazy" class="img-fluid w-75 rounded-2 mb-3">
        <img src="../images/festi01.webp" alt="image concert festiDomp" loading="lazy" class="img-fluid w-75 rounded-2">
      </div>

      <!-- Vidéos -->
      <?php 
        $videos = [
          ['src' => '../videos/festi01.mp4', 'caption' => 'Concert Festi Domp 1ère Partie'],
          ['src' => '../videos/festi04.mp4', 'caption' => 'Concert Festi Domp 2ème Partie'],
          ['src' => '../videos/festi2024-1.mp4', 'caption' => 'FestiDomp 2024'],
          ['src' => '../videos/festi2024-2.mp4', 'caption' => 'FestiDomp 2024'],
          ['src' => '../videos/festi2024-3.mp4', 'caption' => 'FestiDomp 2024'],
          ['src' => '../videos/festi2024-4.mp4', 'caption' => 'FestiDomp 2024'],
          ['src' => '../videos/festi2024-5.mp4', 'caption' => 'FestiDomp 2024']
        ];

        foreach ($videos as $video) {
          echo '
          <div class="embed-responsive embed-responsive-4by3 mb-4">
            <video controls class="embed-responsive-item" src="'.$video['src'].'">
              Votre navigateur ne prend pas en charge la lecture de la vidéo.
            </video>
            <figcaption class="text-center">'.$video['caption'].'</figcaption>
          </div>';
        }
      ?>
    </div>

    <!-- Bloc festi2 - à droite -->
    <div class="col-lg-6">
      <div class="mb-4">
        <img src="../images/laMontagne.webp" loading="lazy" alt="logo journal la montagne" class="img-fluid rounded-2 mb-lg-5">
      </div>
      <div class="lead text-center bg-light rounded shadow p-4 bg-white ms-1 me-1 mb-5">
        <p>
          «On n’avait jamais vu ça, sourit Séverine Villette, l’une des présidentes de l’association,
          avec en point d’orgue la soirée du samedi soir qui a accueilli à un moment près de 2.000 personnes !
          À un moment, on n’avait plus rien à proposer à manger au public ! Même le dimanche après-midi qui
          est d’habitude plus calme a été un vrai succès avec pas loin de 400 spectateurs, là aussi un record.
          On espère que le public sera de nouveau au rendez-vous l’année prochaine pour la 10e édition du
          festival ! Un anniversaire que l’on veut inoubliable ! »
        </p>
      </div>
      <div class="text-center">
        <img src="../images/festi03.webp" loading="lazy" alt="concert festiDomp" class="img-fluid w-75 rounded-2 mb-3">
        <img src="../images/festi02.webp" loading="lazy" alt="concert festiDomp" class="img-fluid w-75 rounded-2 mb-3">
      </div>
      <div class="lead text-center bg-light rounded shadow p-2 bg-white ms-1 me-1">
        <p>
          Et encore <strong>BRAVO</strong> à FestiDomp pour ces superbes soirées
        </p>
      </div>
    </div>
  </div>
</div>

<div class="mt-5 text-center bg-light rounded shadow p-4 bg-white ms-1 me-1 mb-3">
  <p class="lead">
    A bientôt Pour De Nouvelles Aventures Avec <strong>LesCaravanesDeLaBesbre.fr</strong>
  </p>
</div>

<?php include("footer.php") ?>

</body>
</html>
