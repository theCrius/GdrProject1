
class Box
{
  

    constructor(positionToAppendBox=null,nameClass='off',closeManullay=false){

        this.boxCreated
        this.titleBox
        this.contentBox
        this.nameClass=nameClass
        
        
        if(!positionToAppendBox) positionToAppendBox = document.body;
        this.createBox(positionToAppendBox)
        if(closeManullay) this.closeManually.className='closeManually'
    }

    createBox(positionToAppendBox){
        this.boxCreated=document.createElement('div')
        this.boxCreated.className='box ' + this.nameClass
        positionToAppendBox.append(this.boxCreated)
        

        this.titleBox=document.createElement('div')
        this.titleBox.className='titleBox'
        this.boxCreated.append(this.titleBox)

        this.titleBoxTitle=document.createElement('div');
        this.titleBoxTitle.className='titleBoxTitle'
        this.titleBox.append(this.titleBoxTitle)


        this.closeManually=document.createElement('div');
        this.closeManually.className='closeManually off';
        this.titleBox.append(this.closeManually);

        this.closeX=document.createElement('p');
        this.closeX.className='close'
        this.closeX.innerHTML='&times'
        this.closeManually.append(this.closeX)

        this.contentBox=document.createElement('div')
        this.contentBox.className='contentBox'
        this.boxCreated.append(this.contentBox)


    }

    changeTitle(title,text){
        this.titleBoxTitle.append(document.createTextNode(title))
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