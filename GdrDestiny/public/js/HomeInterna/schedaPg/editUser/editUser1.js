import { checkDataForm } from '../../modules/checkDataForm.js';
import { checkPassword , checkImages , checkDate } from '../../functions/editUser1Checking.js';


function checkDataFromInput(){
    
    let checkSubmitMessage = new checkDataForm(document.querySelector('#editUser1'));

    let checkIfUserToSendMessageExist={

        'password' : function(event , classCheckDataForm){
            checkPassword(event,classCheckDataForm)
        },

        'immagine_avatar' : function(event , classCheckDataForm){
            checkImages(event,classCheckDataForm)
        },

        'immagine_miniavatar' : function(event , classCheckDataForm){
            checkImages(event,classCheckDataForm)
        },

        'immagine_mecha' : function(event , classCheckDataForm){
            checkImages(event,classCheckDataForm)
        },

        'data_di_nascita' : function(event, classCheckDataForm){
            checkDate(event,classCheckDataForm)
        }
    }

    checkSubmitMessage.functionsToAdd( checkIfUserToSendMessageExist )

}
checkDataFromInput()