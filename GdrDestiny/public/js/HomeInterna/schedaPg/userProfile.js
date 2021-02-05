import { checkDataForm } from "../modules/checkDataForm.js";

window.checkMessage= function(){
    
    let checkSubmitMessage = new checkDataForm(document.querySelector('#formMessage'),'yes');
    
    let checkIfUserToSendMessageExist={

        'name' : function (event,classCheck) {

        let users = JSON.parse(document.querySelector('#name').dataset.users)

            for (const name of users) {

                if ( name.name == event.target.value ) return

            }
            
            event.target.value=''
            classCheck.giveStatusError(event.target,'Personaggio inesistente')
            

            
            
        }
    }
    
    checkSubmitMessage.functionsToAdd( checkIfUserToSendMessageExist )

}

