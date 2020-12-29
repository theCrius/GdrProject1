import { Box } from './box.js'

class Finestra{


    constructor(){
    
        this.checkModal()
        this.boxError //box created for error


    }

    dealError(errors,modalContent){
      let boxError=new Box(modalContent,'errore',true);
      boxError.editContent(null,errors)
    
    }

    addScriptToFile(nameFile, modal){


        let scriptToAppend=document.createElement('script');
        scriptToAppend.type='module'
        scriptToAppend.src='/js/HomeInterna/' + nameFile
        
        modal.append(scriptToAppend)

    
        
    }

    
    
    checkModal(){
        this.modal=document.createElement('div')
        this.modal.className='modal off'
        document.body.append(this.modal)
        

        
        if(!this.modal) throw new Error('modal non trovata/non creata')
    } 

    addEventCloseButton(){
        function closeModal(event,divModal){
            modalToHidden.className+=' off'
            modalToHidden.innerHTML=''
        }
        let modalToHidden=document.querySelector('.modal')
   
        document.querySelector('.closeModal').addEventListener('click',(event,modalToHidden) => closeModal(event,modalToHidden))

        
    }

    connectionToPage(url){
       
        let http=new XMLHttpRequest()

        return new Promise((resolve,reject) => {

            http.onreadystatechange=function() {
                http.onload = function () {
                    if (this.status >= 200 && this.status < 300 && http.response) {
                      resolve(http.response);
                    }else{
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

    openModal(url,errors,scriptNameToAdd){

        this.modal.className='modal'
        let modalContent=this.modal
        let modalAddEventClose = this.addEventCloseButton
        let dealErrorBox=this.dealError;
        let sendScriptNameToCall=this.addScriptToFile
     
       this.connectionToPage(url).then(function(data){
         
         modalContent.innerHTML= data; //print the data in the modal
        $(".modal_body").draggable({ //the user can move the modal
        handle: "#modalHeader"
    }); 
    
      modalAddEventClose() //the user can close the modal
      
      if(errors) dealErrorBox(errors,modalContent);
      if( scriptNameToAdd ) sendScriptNameToCall(scriptNameToAdd,modalContent)
    }).catch(function(error){  

    if(error.status !== 200) throw new Error('Connessione fallita: '+ error)
          throw new Error('Cariamento Non Riuscito, dati mancanti')
                                });
                                
        
        
                                
       
        
      
       

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

export{ Finestra }