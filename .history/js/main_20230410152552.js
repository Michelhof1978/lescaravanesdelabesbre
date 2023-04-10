




                                //Formulaire de contact

//Restrictions du formulaire de contact
const form = document.getElementById("formulaire");
const firstNameInput = document.getElementById("firstName");
const lastNameInput = document.getElementById("lastName");
const phoneNumberInput = document.getElementById("phoneNumber");
const emailInput = document.getElementById("email");
const messageInput = document.getElementById("message");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    
    if (!isValidLastName(lastNameInput.value)) {
      alert("Le nom doit comporter au moins 3 caractères.");
      lastNameInput.focus(); 
      return false; 
    }

    if (!isValidFirstName(firstNameInput.value)) {
        alert("Le prénom doit comporter au moins 3 caractères.");
        firstNameInput.focus(); 
        return false; 
      }

      if (!isValidPhoneNumber(phoneNumberInput.value)) {
        alert("Le numéro de téléphone doit comporter au moins 10 chiffres");
        phoneNumberInput.focus(); 
        return false; 
      }
    
    if (!isValidEmail(emailInput.value)) {
      alert("L'email n'est pas valide.");
      emailInput.focus(); 
      return false; 
    }
    
    if (!isValidMessage(messageInput.value)) {
      alert("Le message doit comporter au moins 10 caractères.");
      messageInput.focus(); 
      return false; 
    }
    
    
    // Envoyer le formulaire si tout est valide
    form.submit();

  });
 

  function isValidLastName(lastName) {
    return lastName.length >= 3;
  }

  function isValidFirstName(firstName) {
    return firstName.length >= 3;
  }

  function isValidPhoneNumber(phoneNumber) {
    return phoneNumber.length >= 10;
  }
  
  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
  
  function isValidMessage(message) {
    return message.length >= 10;
  }
//FIN Restrictions du formulaire de contact 

//Création événement click sur bouton en jquery
$(() => {
    $('#formulaire').submit(function (e){//Création évenement
        e.preventDefault();

    });

$('#send-data').click(function (){//Affichage message de confirmation quand clic sur bouton

     // Vérification des conditions avant d'afficher le message de confirmation, cela permet d empêcher d'envoyer le formulaire si les conditions ne sont pas remplis
     if (isValidLastName(lastNameInput.value) && isValidFirstName(firstNameInput.value) 
        && isValidPhoneNumber(phoneNumberInput.value) 
        && isValidEmail(emailInput.value) 
        && isValidMessage(messageInput.value)){   
   
        $('#formulaire').prepend("<p class = confirmation>Votre message est envoyé !</p>");
    
    $(document).ready(() => {//Style pour le message de confirmation
        $('.confirmation').css({'color':'#72EA8B',
                                'text-align':'center',
                                'margin-bottom':'30px', 
                                'font-family': 'Times New Roman, Times, serif',
                                'font-weight': 'bold',
                                'font-size': '20px',
    });//Dans ce code, les propriétés CSS sont passées sous forme d'objet avec des clés correspondant aux noms de propriétés CSS et des valeurs correspondant aux valeurs que vous souhaitez leur attribuer.
    });
}
});

$('#formulaire').one( '.confirmation', function(){//La méthode one() de jquery attache un ou plusieurs gestionnaires d'événements pour les éléments sélectionnés et spécifie une fonction à exécuter lorsque l'événement se produit.

    Lors de l'utilisation de la méthode one(), la fonction de gestionnaire d'événements n'est exécutée qu'UNE SEULE FOIS pour chaque élément.
    $(this).fadeOut(3000, function(){//Durer en millisecondes que le message de confirmation va rester 1000 millisecondes = 1 seconde
       //le fadeOut est une fonctionnalité pratique de jQuery pour rendre progressivement un élément HTML invisible.
        $(this).remove();//Le mot-clé "this" est utilisé pour se référer à l'élément actuel (c'est-à-dire l'élément avec la classe "confirmation" qui a été cliqué).
    });
});

// $('#formulaire').on('click', '.confirmation', function(){
   
//     $(this).remove();//Supprime le message de confirmation en faisant un clic dessus
// });

});
//Création événement click sur bouton en jquery

                                      //FIN Formulaire de contact

                                     //AVIS CLIENTS
                                      let nouveau   = document.querySelector('#nouveau');
                                      let citation  = document.querySelector('#citation');
                                      let auteur    = document.querySelector('#auteur');
                                      
                                      let dernier   = 0;
                                      let nombreAleatoire = 0;
                                      let citations = [
                                        ["La vie est un mystère qu'il faut vivre, et non un problème à résoudre.", "Gandhi"],
                                        ["Le plus grand risque est de ne prendre aucun risque.", "Mark Zuckerberg"],
                                        ["Méritez votre statut de leader chaque jour.", "Mickael Jordan"],
                                        ["Soyez le changement que vous voulez voir dans le monde.", "Gandhi"],
                                        ["A chaque fois que vous vous retrouvez du même côté que la majorité, il est temps de prendre du recul, et de réfléchir.", "Mark Twain"],
                                        ["Seulement ceux qui prendront le risque d’aller trop loin découvriront jusqu’où on peut aller.", "T.S Elliot"],
                                        ["Le succès c’est tomber sept fois, se relever huit.", "Proverbe japonais"],
                                        ["Dans vingt ans vous serez plus déçus par les choses que vous n’avez pas faites que par celles que vous avez faites. Alors sortez des sentiers battus. Mettez les voiles. Explorez. Rêvez. Découvrez.", "Mark Twain"],
                                        ["Si vous attendez pour agir, tout ce que vous gagnerez, avec le temps, c’est de l’âge.", "Brian Tracy"],
                                        ["Quand on concentre son attention sur un seul projet, l’esprit suggère constamment des idées et des améliorations qui lui échapperaient s’il était occupé avec plusieurs projets en même temps.", "P.T. Barnum"],
                                        ["Se dédier à faire tout ce que l’on peut pour aider les autres à obtenir ce qu’ils veulent, c’est la clé du succès.", "Brian Sher"],
                                        ["Si vous pensez que vous êtes trop petit pour avoir de l’impact, essayez d’aller au lit avec un moustique.", "Anita Roddick"],
                                        ["Ne jugez pas chaque jour sur ce que vous récoltez, mais sur les graines que vous semez.", "Robert Louis Stevenson"],
                                        ["L’action est la clé fondamentale de tout succès.", "Pablo Picasso"],
                                        ["Le succès, c’est se promener d’échecs en échecs tout en restant motivé.", "Winston Churchill"],
                                        ["Votre avenir est créé par ce que vous faîtes aujourd’hui, pas demain.", "Robert T. Kiyosaki"],
                                        ["Ne vous découragez pas, c’est souvent la dernière clef du trousseau qui ouvre la porte.", "Zig Ziglar"],
                                        ["Pour gagner votre vie, apprenez à l’école. Pour gagner une fortune, apprenez par vous-même.", "Brian Tracy"],
                                        ["Les gagnants trouvent des moyens, les perdants des excuses…", "F. D. Roosevelt"],
                                        ["Vous n’êtes jamais trop vieux pour vous fixer de nouveaux buts, ou rendre vos rêves réalité.", "C.S. Lewis"],
                                        ["Un pessimiste voit la difficulté dans chaque opportunité. Un optimiste voit une opportunité dans chaque difficulté.", "Winston Churchill"]
                                      ];
                                      
                                      // Fonction permettant de générer un nombre aléatoire
                                      function genererNombreEntier(max) {
                                        return Math.floor(Math.random() * Math.floor(max));
                                      }
                                      
                                      nouveau.addEventListener('click', () => {
                                        do {
                                          nombreAleatoire = genererNombreEntier(citations.length);
                                        } while (nombreAleatoire == dernier)
                                          
                                        citation.textContent = citations[nombreAleatoire][0];
                                        auteur.textContent   = citations[nombreAleatoire][1];
                                        dernier              = nombreAleatoire;
                                      });
                                      //FIN AVIS CLIENTS

