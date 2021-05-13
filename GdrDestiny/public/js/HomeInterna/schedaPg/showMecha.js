import { Box } from '../modules/box.js';

window.box= new Box(null,'showHurts')

//overriding the method of Box class
window.box.addP = function (multipleP){
    let key;
 
    for ( key in multipleP) {

        if( !multipleP[key].length ) multipleP[key] = [multipleP[key]] 
        
        for( let singleP of multipleP[key]){

            
            let newP=document.createElement('p')
            newP.textContent= '[' + ( singleP.name || '' ) + ' -' + singleP.hurt + ' ] :' + singleP.descrizione

            let newPAssignedBy=document.createElement('p')
            newPAssignedBy.textContent= 'by ' + singleP.assignedBy
            newPAssignedBy.className='assignedBy'

            this.contentBox.append(newP)
            this.contentBox.append(newPAssignedBy)
            

        }

    }
}
