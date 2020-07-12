class Finestra{
    
    modalPrincipale=document.querySelector('.modal')
    modalBody=document.querySelector('.modal_body');


    constructor(){
        this.checkModal()
        this.addEventCloseButton()

    }

    checkModal(){
        if(!this.modalPrincipale || !this.modalPrincipale) throw new Error('modal non trovata')
    } 

    addEventCloseButton(){
        function closeModal(event){
            
            event.target.parentElement.parentElement.parentElement.className='off'
           
        }
        
        let closeButton= this.modalBody.querySelector('.closeModal')
        closeButton.addEventListener('click',closeModal)

        
    }


}