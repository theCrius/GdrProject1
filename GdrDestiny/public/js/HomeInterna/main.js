import { Box } from './modules/box.js';
import { Finestra } from './modules/modal.js';


//box created for meteo
let box=new Box();

//modal to use 
window.modal=new Finestra


//box meteo
box.appendEventsLeaveShowBox(document.querySelector('#meteo'),'ok','fdkdk');


