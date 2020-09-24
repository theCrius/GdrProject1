
class Box
{
  

    constructor(positionToAppendBox=null,nameClass=''){

        this.boxCreated
        this.titleBox
        this.contentBox
        this.nameClass=nameClass
        
        if(!positionToAppendBox) positionToAppendBox = document.body;
        this.createBox(positionToAppendBox)
    }

    createBox(positionToAppendBox){
        this.boxCreated=document.createElement('div')
        this.boxCreated.className='box off' 
        positionToAppendBox.append(this.boxCreated)
        

        this.titleBox=document.createElement('div')
        
        this.titleBox.className='titleBox'
        this.boxCreated.append(this.titleBox)

        this.contentBox=document.createElement('div')
        
        this.contentBox.className='contentBox'
        this.boxCreated.append(this.contentBox)


    }

    changeTitle(title,text){
        this.titleBox.append(document.createTextNode(title))
        this.contentBox.append(document.createTextNode(text))
    }

    moveBox(element){
        let coordinateElement=element.getBoundingClientRect()
        let coordinateBox=this.boxCreated.getBoundingClientRect()
        
        this.boxCreated.style.left=coordinateElement.left + (coordinateBox.width * 0.5);
        this.boxCreated.style.top=coordinateElement.top + Math.abs(coordinateBox.height-coordinateElement.height)/2;
    

    }

    showBox(title,text,elementCloser){
       
        this.changeTitle(title,text)
        this.boxCreated.className='box' + this.nameClass
        this.moveBox(elementCloser)

    }
    leaveBox(){
 
        this.boxCreated.className='box off'
        this.titleBox.innerHTML=''
        this.contentBox.innerHTML=''
    }

    appendEventsLeaveShowBox(elementCloser,title,text){
    
        if(!elementCloser) throw new Error('Elemento non trovato')
        let box=this
       
        elementCloser.addEventListener('mouseout',() => box.leaveBox())
        elementCloser.addEventListener('mouseover', () => box.showBox(title,text,elementCloser) )

    }




    
}

export { Box }