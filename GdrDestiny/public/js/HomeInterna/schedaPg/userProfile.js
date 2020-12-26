import { checkDataForm } from "../modules/checkDataForm.js";

let checkSubmitMessage = new checkDataForm(document.querySelector('#formMessage'));

let checkIfUserToSendMessageExist={

    'name' : function (event,classCheck) {

       let users = JSON.parse(document.querySelector('.name').children[0].dataset.users)

        for (const name of users) {

            if ( name.name == event.target.value ) return

        }
        
        event.target.value=''
        classCheck.giveStatusError(event.target,'Personaggio inesistente')
        

        
        
    }
}


checkSubmitMessage.functionsToAdd( checkIfUserToSendMessageExist )