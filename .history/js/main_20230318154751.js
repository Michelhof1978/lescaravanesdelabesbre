const canvas = document.querySelector("canvas");
const img = document.querySelector("img");
const c = canvas.getContext("2d");

imgStroke = c.createPattern(img, "no-repeat");

imgStroke.set;

canvas.width = 512;
canvas.height = 513;

function randomIntFromRange(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}

function randomIntFromRange(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}

function randomRgbValue() {
  const red = randomIntFromRange(41, 44);
  const green = randomIntFromRange(62, 128);
  const blue = randomIntFromRange(80, 185);

  return `rgba(${red},${green},${blue},1)`;
}

function Particle(x, y, radius, color) {
  this.x = x;
  this.y = y;
  this.radius = radius;
  this.color = color;
  this.radians = Math.random() * Math.PI * 2;
  this.velocity = 0.05;
  this.distanceFromCenter =
    //this for 2d randomIntFromRange(50, 220);
    // this makes 3D
    { x: randomIntFromRange(0, 200), y: randomIntFromRange(0, 200) };

  this.update = () => {
    //move points over time
    const lastPoint = { x: this.x, y: this.y };
    this.radians += this.velocity;
    this.x = x + Math.cos(this.radians) * this.distanceFromCenter.x;
    this.y = y + Math.sin(this.radians) * this.distanceFromCenter.y;
    this.draw(lastPoint);
  };

  this.draw = (lastPoint) => {
    c.beginPath();
    c.strokeStyle = imgStroke;
    c.lineWidth = this.radius;
    c.moveTo(lastPoint.x, lastPoint.y); //prev frame
    c.lineTo(this.x, this.y); // next frame
    c.stroke();
    // c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
    // c.fillStyle = this.color;
    // c.fill();
    c.closePath();
  };
}

let particles;
function init() {
  particles = [];

  for (let i = 0; i < 400; i++) {
    const radius = Math.random * 2 + 1;
    const color = randomRgbValue();
    console.log(color);
    particles.push(
      new Particle(canvas.width / 2, canvas.height / 2, radius, color)
    );
  }
}

//animate loop
function animate() {
  requestAnimationFrame(animate);
  c.fillStyle = "rgba(0, 0, 0, 0.05)";
  //below clears screen ever rerender, try commenting when clearRect, fill rect gives tails
  //c.fillStyle = imgStroke;
  c.fillRect(0, 0, canvas.width, canvas.height);

  particles.forEach((particle) => {
    particle.update();
  });
}

init();
animate();



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




