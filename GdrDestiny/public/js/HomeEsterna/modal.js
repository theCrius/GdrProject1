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
            let modalObject=document.querySelector('.modal');
            modalObject.className='off';
           
        }
        
        let closeButton= this.modalBody.querySelector('.closeModal')
        let confermaButton=this.modalBody.querySelector('#buttonSubmit')
        console.log(confermaButton)
        closeButton.addEventListener('click',closeModal)
        confermaButton.addEventListener('click',closeModal)

        
    }


}