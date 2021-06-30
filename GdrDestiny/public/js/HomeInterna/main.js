import { Box } from './modules/box.js';
import { Finestra } from './modules/modal.js';
import { changeGhostHome } from './modules/home.js';
import { openOrClose } from "./functions/openOrClose.js"

//to change the behavior of the image at the home called ghost
changeGhostHome()

//modal to use 
window.modal=new Finestra

window.openOrClose = openOrClose

window.openVueClass = function (  ){

    return true;

}



//box meteo
window.boxMeteo= new Box()

window.boxIconMap = new Box(null,"opacity08")

$(".modal_vue_body").draggable({ //the user can move the modal
    handle: "#modal_vue_header"
}); 



