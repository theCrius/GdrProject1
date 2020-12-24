
class Box
{
  

    constructor(positionToAppendBox=null,nameClass='off',closeManullay=false){

        this.boxCreated
        this.titleBox
        this.contentBox
        this.nameClass=nameClass
        this.closeManullay=closeManullay
        
        if(!positionToAppendBox) positionToAppendBox = document.body;
        this.createBox(positionToAppendBox)
        if(this.closeManullay) this.closeManuallyBox()
    }
    closeManuallyBox(){
        this.closeManually.className='closeManually'
        this.closeX.addEventListener('click',() => {
           this.boxCreated.className+=' off'
        }
        );
    }

    createBox(positionToAppendBox){
        this.boxCreated=document.createElement('div')
        this.boxCreated.className='box ' + this.nameClass +( (this.closeManullay) ? '' : ' off' )
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

    showErrorGif(){
        let errorGif=document.createElement('img')
        errorGif.src='/img/imgHomeInterna/home/errorGifModal.gif'
        errorGif.id='errorGif'
        this.titleBoxTitle.append(errorGif)

        this.contentBox.innerHTML='<marquee behavior="scroll" direction="right" scrollamount="5"></marquee>'
    }

    changeTitle(title){

             this.titleBoxTitle.append(document.createTextNode(title))
    
            }

    addP(text){

            this.contentBox.append(document.createTextNode(text))

    }

    editContent(title,text){

        if(!title){

            this.showErrorGif()
            return this.contentBox.children[0].append(document.createTextNode(text))
        
        }

        this.changeTitle(title)
        this.addP(text)

    }

    moveBox(element,move){
        let coordinateElement=element.getBoundingClientRect()
        let coordinateBox=this.boxCreated.getBoundingClientRect()
            
                if ((move == 'left') || (move == 'right')){

                    move = ( move == 'left' ) ? 'right' : 'left'

                    this.boxCreated.style[move]=coordinateElement[move] + coordinateElement.width;
                    this.boxCreated.style['top']=coordinateElement['top'] + Math.abs( coordinateElement.height - coordinateBox.height )/2

                    
                }else{

                    move = ( move == 'bottom' ) ? 'top' : 'bottom'
                    
                    this.boxCreated.style['left']= Math.abs(coordinateElement['left'] - Math.abs(  coordinateBox.width - coordinateElement.width )/2 );
                    this.boxCreated.style['right']=Math.abs(coordinateElement['right'] - Math.abs(  coordinateBox.width - coordinateElement.width )/2 );
                    this.boxCreated.style[move]=coordinateElement[move] + coordinateElement.height * 1.2;
                    
                }
            

        
    

    }

    showBox(title,text,elementCloser,move){
       
        this.editContent(title,text)
        if( this.nameClass == 'off'){
            this.boxCreated.className='box'
        }else
        {
            this.boxCreated.className='box ' + this.nameClass
        }
        
        if(move) this.moveBox(elementCloser,move)


    }
    leaveBox(){
        this.boxCreated.className+=' off'
        this.titleBoxTitle.innerHTML=''
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