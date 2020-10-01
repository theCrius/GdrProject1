import { Box } from './modules/box.js';
import { Finestra } from './modules/modal.js';
// import { postMultipleData } from './modules/postMultipleData.js';
import { changeGhostHome } from './modules/home.js';

//to change the behavior of the image at the home called ghost
changeGhostHome()

//box created for meteo
let box=new Box();

//modal to use 
window.modal=new Finestra


//box meteo
box.appendEventsLeaveShowBox(document.querySelector('#meteo'),'ok','fdkdk');


