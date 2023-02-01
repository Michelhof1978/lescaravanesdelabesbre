
    //=============== START - DECLARATION DU FORMULAIRE DE CONTACT ===============//    
    (function() {
        'use strict'
        let form = document.getElementById('lessonForm');
        form.addEventListener('submit', function(event) {
            
            Array.from(form.elements).forEach((input) => {
                if (input.type !== "submit") {
                    if (!validateFields(input)) {
                        alert('1')
                        event.preventDefault();
                        event.stopPropagation();
                        
                        input.classList.remove("is-valid");
                        input.classList.add("is-invalid");
                        input.nextElementSibling.style.display = 'block';
                    } 
                    else {
                      	alert('3')
                        input.nextElementSibling.style.display = 'none';
                        input.classList.remove("is-invalid");
                        input.classList.add("is-valid");
                    }
                }
            });
        }, false)
    })()
//------------------------------------------------------------------------------------//
            //=============== START -  FONCTIONS DE VALIDATION DES CHAMPS DU FORMULAIRE ===============//

// Validation d'un champ REQUIRED
    function validateRequired(input) {
        return !(input.value == null || input.value == "");
    }

// Validation du nombre de caractères: MIN MAX
    function validateLength(input, minLength, maxLength){
        return !(input.value.length < minLength || input.value.Length > maxLength);
    }
    //Validation des caractères: LATIN ET LETTRES
    function validateText(input){
        return input.value.match("^[A-Za-z]+$");
    }

    function validateEmail(input){
        let EMAIL = input.value;
        let POSAT = EMAIL.indexOf("@");
        let POSDOT = EMAIL.lastIndexOf(".");

        return !(POSAT < 1 || (POSDOT - POSAT < 2));
    }

    // Validation du Numéro de téléphone

function validatePhoneNumber(input) {

    return input.value.match(/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/);

}
// ==============VALIDATION DES CHAMPS DU FORMULAIRE==============//

    function validateFields(input) {
    let fieldName = input.name;

    // Validaton de l'input PRENOM
    if (fieldName == "firstName") {
        if (!validateRequired(input)) {
            return false;
        }

        if (!validateLength(input, 2, 20)) {
            return false;
        }

        if (!validateText(input)){
            return false;
        }
        return (true);
        }

        // Validaton de l'input NOM
        if (fieldName == "lastName") {
            if (!validateRequired(input)) {
                return false;
            }
            if (!validateLength(input, 2, 20)) {
                return false;
            }
            if (!validateText(input)) {
                return false;
            }
            return (true);
        }
         // Validaton de l'input NOM
        if (fieldName == "email"){
            if(!validateRequired(input)){
                return false;
            }
            if(!validateEmail(input)){
                return false;
            }
            return(true)
        }

         // Validaton de l'input NUMERO DE TELEPHONE
         if (fieldName == "phoneNumber") {
            if (!validateRequired(input)) {
                return false;
            }
            if (!validatePhoneNumber(input)) {
                return false;
            }
            return (true);
        }

}

    //=============== END - VALIDATION DU FORMULAIRE ===============//

    
