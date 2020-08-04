class Finestra{

    constructor(){
    
        this.checkModal()

    }

    
    
    checkModal(){
        this.modal=document.createElement('div')
        this.modal.className='modal off'
        document.body.append(this.modal)

        
        if(!this.modal) throw new Error('modal non trovata/non creata')
    } 

    addEventCloseButton(){
        function closeModal(event,divModal){
            modalToHidden.className='off'
        }
        let modalToHidden=this.modal
        console.log(document.querySelector('.closeModal'))
       // document.querySelector('.closeModal').addEventListener('click',(event,modalToHidden) => closeModal(event,modalToHidden))

        
        
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

    dragElement() {
      var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
      let modalBody=document.querySelector('.modal_body')
      
      console.log(document.querySelector('.modal_body'),modalBody)
      //document.querySelector("#modalHeader").onmousedown = dragMouseDown;
      
    
      function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        // get the mouse cursor position at startup:
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        // call a function whenever the cursor moves:
        document.onmousemove = elementDrag;
      }
    
      function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();
        // calculate the new cursor position:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        // set the element's new position:
        modalBody.style.top = (elmnt.offsetTop - pos2) + "px";
        modalBody.style.left = (elmnt.offsetLeft - pos1) + "px";
      }
    
      function closeDragElement() {
        /* stop moving when mouse button is released:*/
        document.onmouseup = null;
        document.onmousemove = null;
      }
    }


    openModal(url){

        this.modal.className='modal'
        let modalContent=this.modal
        
        
        
       this.connectionToPage(url).then(function(data){modalContent.innerHTML= data})
                                 .catch(function(error){
                                     if(error.status !== 200) throw new Error('Connessione fallita')
                                     throw new Error('Cariamento Non Riuscito, dati mancanti')
                                })
        this.dragElement() //to move modal
                                //this.addEventCloseButton()
       
        
      
       

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