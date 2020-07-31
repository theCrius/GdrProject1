class Finestra{
    



    constructor(name){
    
        this.createStructure(errore,titleModal,text)
        this.checkModal()
        this.addEventCloseButton()

    }

    
    createStructure(errore,titleModal,text){
        this.divModal=document.createElement('div')
        this.divModal.className='modal'
        document.body.append(this.divModal)

        this.modalBody=document.createElement('div')
        this.modalBody.className='modal_body'
        this.divModal.append(this.modalBody)

        this.imgSfondo=document.createElement('img');
        this.imgSfondo.src= errore ? '/img/imgHomeEsterna/imgIscrizione/sfondoiscrizifine.png' : '/img/errorw.png'
        this.imgSfondo.id='sfondoModal'
        this.modalBody.append(this.imgSfondo)

        this.closeDiv=document.createElement('div')
        this.closeDiv.className='closeModal'
        this.modalBody.append(this.closeDiv)

        this.buttonClose=document.createElement('button')
        this.buttonClose.innerHTML='&times'
        this.closeDiv.append(this.buttonClose)

        this.divContentModal=document.createElement('div')
        this.divContentModal.className='content'
        this.modalBody.append(this.divContentModal)

        this.contentTitle=document.createElement('div')
        this.contentTitle.className='titleModal'
        this.divContentModal.append(this.contentTitle)

        this.h1Title=document.createElement('h1')
        this.h1Title.textContent=titleModal
        this.contentTitle.append(this.h1Title)

        this.textOfModal=document.createElement('p')
        this.textOfModal.className='text'
        this.textOfModal.innerHTML=errore ? text: this.getError(text)
        this.divContentModal.append(this.textOfModal)

        this.buttonSubmit=document.createElement('button')
        this.buttonSubmit.id='buttonSubmit'
        this.buttonSubmit.type='submit'
        this.divContentModal.append(this.buttonSubmit)

        this.imageButtonSubmit=document.createElement('img')
        this.imageButtonSubmit.src='/img/imgHomeEsterna/coonfermasiclick.png'
        this.buttonSubmit.append(this.imageButtonSubmit)





    }
    checkModal(){
        if(!this.divModal) throw new Error('modal non trovata/non creata')
    } 

    addEventCloseButton(){
        function closeModal(event,divModal){
            modalToHidden.className='off'
        }
        let modalToHidden=this.divModal
        this.buttonSubmit.addEventListener('click',(event,modalToHidden) => closeModal(event,modalToHidden))
        this.buttonClose.addEventListener('click',(event,modalToHidden) => closeModal(event,modalToHidden))

        
        
    }
    getError(text){
   
        let errors=text.split('.')
        let stringsToPrint=''
        let pOpen='<p>', pClose='</p>'
      

        for(let error of errors){
         
            let wordToPrint=error.slice(error.lastIndexOf(';')+1)
            
            if(wordToPrint == ']') break;
            stringsToPrint+=pOpen + wordToPrint + pClose
            
            
        }
    
    
        return stringsToPrint || 'riprova, attento a non utilizzare caratteri particolari'

    }


}