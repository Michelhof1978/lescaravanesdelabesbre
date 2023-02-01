<script>
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
// Validation d'un champ REQUIRED
    function validateRequired(input) {
        return !(input.value == null || input.value == "");
    }

// Validation du nombre de caractères


    function validateFields(input) {
    let fieldName = input.name;
    // Validaton de l'input PRENOM
    if (fieldName == "firstName") {
        if (!validateRequired(input)) {
            return false;
        }
        return (true);
    }
}

    //=============== END - DECLARATION DU FORMULAIRE ===============//

    
</script>