class Finestra{
    



    constructor(){
        this.modalPrincipale=document.querySelector('.modal')
        this.modalBody=document.querySelector('.modal_body');

        this.checkModal()
        this.addEventCloseButton()

    }

    checkModal(){
        if(!this.modalPrincipale || !this.modalPrincipale) throw new Error('modal non trovata')
    } 

    addEventCloseButton(){
        function closeModal(event){
            let modalObject=document.querySelector('.modal');
            modalObject.className='off';
           
        }
        
        let closeButton= this.modalBody.querySelector('.closeModal')
        let confermaButton=this.modalBody.querySelector('#buttonSubmit')
        closeButton.addEventListener('click',closeModal)
        confermaButton.addEventListener('click',closeModal)

        
    }


}