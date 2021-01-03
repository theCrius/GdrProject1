import { Box } from '../../modules/box.js';

window.changeUserBox=new Box(document.querySelector('.modal'),'errore',false);
window.changeUserBox.closeManuallyBox()
window.changeUserBox.showWarning= function (link){

    window.changeUserBox.showBox('Reset Account','Cosifacendo questo account verrà eliminato ma ti arriverà per email un link per crearne un altro e riceverai tutti i tuoi soldi perdendo però 1/4 dei tuoi EXP')
    window.changeUserBox.addLink('Cambia Pg','buttonChangePg',link)

}    