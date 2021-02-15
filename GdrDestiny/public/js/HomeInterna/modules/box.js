
class Box
{
       

    constructor(positionToAppendBox=null,nameClass='off',closeManullay=false){
        this.coordinateBox
        this.coordinateElement
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
           this.leaveBox()
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

    addLink(text,classButton,link){

        let newLink= document.createElement('a')
        newLink.className += classButton
        newLink.textContent = text
        newLink.href= link
        this.contentBox.append( newLink )

    }

    editContent(title,text){

        if(!title){

            this.showErrorGif()
            return this.contentBox.children[0].append(document.createTextNode(text))
        
        }

        this.changeTitle(title)
        this.addP(text)

    }

    // howMove object --> first lette uppercase 
    moveBox(element,howMove){
        this.coordinateElement=element.getBoundingClientRect()
        this.coordinateBox=this.boxCreated.getBoundingClientRect()

        let closerOrOn = Object.getOwnPropertyNames(howMove)[0]
        let functionToCallToMove = 'move' + closerOrOn
       
        this[functionToCallToMove](howMove[closerOrOn])
                
            

        
    

    }

    showBox(title,text,elementCloser,howMove){
       
        this.editContent(title,text)
        if( this.nameClass == 'off'){
            this.boxCreated.className='box'
        }else
        {
            this.boxCreated.className='box ' + this.nameClass
        }
        
        if(howMove) this.moveBox(elementCloser,howMove)


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
    moveCloser(move){
        
        
        if ((move == 'left') || (move == 'right')){

            move = ( move == 'left' ) ? 'right' : 'left'

            this.boxCreated.style[move]=this.coordinateElement[move] + this.coordinateElement.width;
            this.boxCreated.style['top']=this.coordinateElement['top'] + Math.abs( this.coordinateElement.height - this.coordinateBox.height )/2

            
        }else{
            
            move = ( move === 'bottom' ) ? 'top' : 'bottom'
            
            this.boxCreated.style['left']= Math.abs(this.coordinateElement['left'] - Math.abs(  this.coordinateBox.width - this.coordinateElement.width )/2 );
            this.boxCreated.style['right']=Math.abs(this.coordinateElement['right'] - Math.abs(  this.coordinateBox.width - this.coordinateElement.width )/2 );

            this.checkIfBoxGoesGoOutOfScreen(move)
        
            
            
        }

    
    }
    moveOn(move=null){

        
        this.boxCreated.style['left']= Math.abs(this.coordinateElement['left'] - Math.abs(  this.coordinateBox.width - this.coordinateElement.width )/2 );
        this.boxCreated.style['right']=Math.abs(this.coordinateElement['right'] - Math.abs(  this.coordinateBox.width - this.coordinateElement.width )/2 );
        this.boxCreated.style['bottom'] = this.coordinateElement['bottom']
        this.boxCreated.style['top'] = this.coordinateElement['top'] - this.coordinateBox.height / 2
        
    }

    checkIfBoxGoesGoOutOfScreen(move){

        let totalHeightBox = this.coordinateElement[move] + ( this.coordinateElement.height * 1.2 )+ this.coordinateBox.height 
        
        

        if(  totalHeightBox > window.innerHeight ){
            
            ( move === 'bottom' ) ? 'top' : 'bottom'
       
            return    this.boxCreated.style[move]=this.coordinateElement[move] - this.coordinateElement.height * 0.2 - this.coordinateBox.height;
        
        }

        return    this.boxCreated.style[move]=this.coordinateElement[move] + this.coordinateElement.height * 1.2;
    }



    
}

export { Box }