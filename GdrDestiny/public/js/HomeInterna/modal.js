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
       
        let http=new XMLHttpRequest()

        return new Promise((resolve,reject) => {

            http.onreadystatechange=function() {
                http.onload = function () {
                    if (this.status >= 200 && this.status < 300 && http.response) {
                      resolve(http.response);
                    } else {
                      reject({
                        status: this.status,
                        statusText: http.statusText
                      });
                    }
                  };
                  http.onerror = function () {
                    reject({
                      status: this.status,
                      statusText: http.statusText
                    });
                  };
                  
                
            }
            http.open('GET',url,true)  
            http.send()

        })
        
         


        

        
       

    }


    openModal(url){

        this.divModal.className='modal'
        let a=this.divContentModal
        
       this.connectionToPage(url).then(function(data){a.innerHTML = data})
                                 .catch(function(error){
                                     if(error.status !== 200) throw new Error('Connessione fallita')
                                     throw new Error('Cariamento Non Riuscito, dati mancanti')
                                })
      
       

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