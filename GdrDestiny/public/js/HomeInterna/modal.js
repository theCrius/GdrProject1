class Finestra{

    constructor(){
    
        this.createStructure()
        this.checkModal()
        this.addEventCloseButton()

    }

    
    createStructure(){
        this.divModal=document.createElement('div')
        this.divModal.className='modal off'
        document.body.append(this.divModal)

        this.modalBody=document.createElement('div')
        this.modalBody.className='modal_body'
        this.divModal.append(this.modalBody)

        this.imgSfondo=document.createElement('img');
        this.imgSfondo.src= '/img/imgHomeInterna/home/sfondobg.png'
        this.imgSfondo.id='sfondoModal'
        this.modalBody.append(this.imgSfondo)

        this.modalHeader=document.createElement('div')
        this.modalHeader.id='modalHeader'
        this.modalBody.append(this.modalHeader)

        this.closeDiv=document.createElement('div')
        this.closeDiv.className='closeModal'
        this.modalHeader.append(this.closeDiv)

        this.buttonClose=document.createElement('img')
        this.buttonClose.src='/img/imgHomeInterna/home/chiudischeda.png'
        this.closeDiv.append(this.buttonClose)

        this.divContentModal=document.createElement('div')
        this.divContentModal.className='content'
        this.modalBody.append(this.divContentModal)
        
        // this.textOfModal=document.createElement('p')
        // this.textOfModal.className='text'
        // this.textOfModal.innerHTML=errore ? text: this.getError(text)
        // this.divContentModal.append(this.textOfModal)

        // this.buttonSubmit=document.createElement('button')
        // this.buttonSubmit.id='buttonSubmit'
        // this.buttonSubmit.type='submit'
        // this.divContentModal.append(this.buttonSubmit)

        // this.imageButtonSubmit=document.createElement('img')
        // this.imageButtonSubmit.src='/img/imgHomeEsterna/coonfermasiclick.png'
        // this.buttonSubmit.append(this.imageButtonSubmit)





    }
    checkModal(){
        if(!this.divModal) throw new Error('modal non trovata/non creata')
    } 

    addEventCloseButton(){
        function closeModal(event,divModal){
            modalToHidden.className='off'
        }
        let modalToHidden=this.divModal
       // this.buttonSubmit.addEventListener('click',(event,modalToHidden) => closeModal(event,modalToHidden))
        this.buttonClose.addEventListener('click',(event,modalToHidden) => closeModal(event,modalToHidden))

        
        
    }

    connectionToPage(url){
       function getHTMLData(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText)
            return this.responseText
           
           
        }
       }
       
        let http=new XMLHttpRequest()
        
         
        http.onreadystatechange=getHTMLData
        http.open('GET',url,true)  
        http.send()
        return http.onreadystatechange()

        

        
       

    }


    openModal(url){

        this.divModal.className='modal'
        console.log(this.connectionToPage(url))

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