// $(document).ready(function() {
    //     alert('jQuery a bien été inclus')
    //   });
      


$(() => {
    $('#formulaire').submit(function (e){
        e.preventDefault();

    });

$('#send-data').click(function (){
    $('#formulaire').append('<p class = "confirmation">Votre message a bien été envoyé!</p>')
});

$('#formulaire').on('click', '.confirmation', function(){
    console.log('N');
    $(this).remove();
});

});






/


//     <div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">

//     <form class="row g-3 needs-validation" id="lessonForm" novalidate>
//         <div class="col-md-6">
//             <label for="firstname" class="form-label">Prénom</label>
//             <input type="text" class="form-control" name="firstName" id="firstName">
//             <div class="invalid-feedback">
//                 Veuillez saisir votre prénom.
//             </div>
//         </div>
//         <div class="col-md-6">
//             <label for="lastname" class="form-label">Nom</label>
//             <input type="text" class="form-control" name="lastName" id="lastName">
//             <div class="invalid-feedback">
//                 Veuillez saisir votre nom.
//             </div>
//         </div>
//         <div class="col-md-6">
//             <label for="email" class="form-label">E-mail</label>
//             <input type="email" class="form-control" name="email" id="email">
//             <div class="invalid-feedback">
//                 Veuillez saisir votre e-mail.
//             </div>
//         </div>
//         <div class="col-md-6">
//             <label for="phoneNumber" class="form-label">Téléphone</label>
//             <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber">
//             <div class="invalid-feedback">
//                 Veuillez saisir votre numéro de téléphone.
//             </div>
//         </div>
//         <div class="col-md-6">
//             <label for="address" class="form-label">Adresse</label>
//             <input type="text" class="form-control" name="address" id="address">
//             <div class="invalid-feedback">
//                 Veuillez saisir votre adresse.
//             </div>
//         </div>
//         <div class="col-md-6">
//             <label for="city" class="form-label">Ville</label>
//             <select class="form-select" name="city" id="city">
//                 <option selected disabled value="">Choose a city ...</option>
//                 <option>Paris</option>
//                 <option>Lyon</option>
//                 <option>Marseille</option>
//                 <option>Lille</option>
//             </select>
//             <div class="invalid-feedback">
//                 Veuillez choisir une ville.
//             </div>
//         </div>
//         <div class="col-md-6">
//             <label for="postcode" class="form-label">Code postal</label>
//             <input type="text" class="form-control" name="postCode" id="postCode">
//             <div class="invalid-feedback">
//                 Veuillez saisir votre code postal.
//             </div>
//         </div>
//         <div class="col-12">
//             <div class="mb-3 form-check">
//                 <label class="form-check-label" for="conditions">J'accepte les conditions</label>
//                 <input type="checkbox" class="form-check-input" id="conditions" name="conditions">
//                 <div class="invalid-feedback">
//                     Merci de lire les conditions avant de valider le formulaire.
//                 </div>
//             </div>
//         </div>
//         <button type="submit" class="btn btn-primary w-25">Valider</button>
//     </form>
// </div>
    
    //=============== START - DECLARATION DU FORMULAIRE DE CONTACT ===============//    
//     (function() {
//         'use strict'
//         let form = document.getElementById('formulaire');
//         form.addEventListener('submit', function(event) {
            
//             Array.from(form.elements).forEach((input) => {
//                 if (input.type !== "submit") {
//                     if (!validateFields(input)) {
//                         alert('1');
//                         event.preventDefault();
//                         event.stopPropagation();
                        
//                         input.classList.remove("is-valid");
//                         input.classList.add("is-invalid");
//                         input.nextElementSibling.style.display = 'block';
//                     } 
//                     else {
//                       	alert('3')
//                         input.nextElementSibling.style.display = 'none';
//                         input.classList.remove("is-invalid");
//                         input.classList.add("is-valid");
//                     }
//                 }
//             });
//         }, false)
//     })()
//     //=============== END- DECLARATION DU FORMULAIRE DE CONTACT ===============//    
// //------------------------------------------------------------------------------------//
//             //=============== START -  FONCTIONS DE VALIDATION DES CHAMPS DU FORMULAIRE ===============//

// // Validation d'un champ REQUIRED
//     function validateRequired(input) {
//         return !(input.value == null || input.value == "");
//     }

// // Validation du nombre de caractères: MIN MAX
//     function validateLength(input, minLength, maxLength){
//         return !(input.value.length < minLength || input.value.Length > maxLength);
//     }
//     //Validation des caractères: LATIN ET LETTRES
//     function validateText(input){
//         return input.value.match("^[A-Za-z]+$");
//     }

//     function validateEmail(input){
//         let EMAIL = input.value;
//         let POSAT = EMAIL.indexOf("@");
//         let POSDOT = EMAIL.lastIndexOf(".");

//         return !(POSAT < 1 || (POSDOT - POSAT < 2));
//     }

//     // Validation du Numéro de téléphone

// function validatePhoneNumber(input) {

//     return input.value.match(/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/);

// }
// // ==============VALIDATION DES CHAMPS DU FORMULAIRE==============//

//     function validateFields(input) {
//     let fieldName = input.name;

//     // Validaton de l'input PRENOM
//     if (fieldName == "firstName") {
//         if (!validateRequired(input)) {
//             return false;
//         }

//         if (!validateLength(input, 2, 20)) {
//             return false;
//         }

//         if (!validateText(input)){
//             return false;
//         }
//         return (true);
//         }

//         // Validaton de l'input NOM
//         if (fieldName == "lastName") {
//             if (!validateRequired(input)) {
//                 return false;
//             }
//             if (!validateLength(input, 2, 20)) {
//                 return false;
//             }
//             if (!validateText(input)) {
//                 return false;
//             }
//             return (true);
//         }

//          // Validaton de l'input EMAIL
//         if (fieldName == "email"){
//             if(!validateRequired(input)){
//                 return false;
//             }
//             if(!validateEmail(input)){
//                 return false;
//             }
//             return(true)
//         }

//          // Validaton de l'input NUMERO DE TELEPHONE
//          if (fieldName == "phoneNumber") {
//             if (!validateRequired(input)) {
//                 return false;
//             }
//             if (!validatePhoneNumber(input)) {
//                 return false;
//             }
//             return (true);
//         }

// }

//     //=============== END - VALIDATION DU FORMULAIRE ===============//

    
