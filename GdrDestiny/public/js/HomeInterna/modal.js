class Finestra{

    constructor(){
    
        this.checkModal()
        this.addEventCloseButton()

    }

    
    
    checkModal(){
        if(!this.divModal) throw new Error('modal non trovata/non creata')
    } 

    addEventCloseButton(){
        function closeModal(event,divModal){
            modalToHidden.className='off'
        }
        let modalToHidden=this.divModal
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