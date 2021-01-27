import { Box } from './modules/box.js';
import { Finestra } from './modules/modal.js';
import { changeGhostHome } from './modules/home.js';
import { openOrClose } from "./functions/openCloseBoxSmallBox.js"

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




