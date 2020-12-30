class checkDataForm{

    allObjects
    oldInput

    constructor(form,inputsCanBeEmpty){

        this.form=form
        this.button=this.form.querySelector('button')
        this.inputsCanBeEmpty = inputsCanBeEmpty

        if( !this.form ) throw Error(' Nessun form trovato ')
        this.findInput()
        
    }

    /* Add to an input a function , the function takes an object with the structure {nameOfInput : function} */
    functionsToAdd(inputnameToFunction){
        
            
            for (const key in inputnameToFunction) {
                
                let inputToAdd= returnObjectToAddFunction( key , this)
                

                if( !inputToAdd ) throw Error (' Funzione non aggiunta all\'oggetto selezionato perchè non è nella lista del form ')

                inputToAdd.addEventListener('focusout' , () => inputnameToFunction[key](event,this))
                
            }



        function returnObjectToAddFunction(name,classThis){
            
            for (const object  of classThis.allObjects) {
                    
                if( object.name === name ) return object

            }

            return false
        }
    }

    findInput(){

        let inputsExceptHidden = Array.from(this.form.querySelectorAll('input:not([type="hidden"])'))
        let textArea = Array.from(this.form.querySelectorAll('textarea'))

        this.allObjects = inputsExceptHidden.concat(textArea)
        
        if ( !this.allObjects ) throw Error(' Nessun input trovato ')
        
        
        for ( let object of this.allObjects ) {

            this.addEvent(object)

        }

        


    }

    addEvent(object){
 
        if( this.inputsCanBeEmpty ) object.addEventListener('focusout',(event) => this.checkFieldIfIsEmpty(event))
        object.addEventListener('focus',(event) => this.deleteStatusError(event))
        object.addEventListener('keypress',(event) => this.enterDisabled(event))        


    }


    checkFieldIfIsEmpty(event){
        
        if( !event.target.value ){

            if( event.target.className.indexOf('errorInput') === -1 ) {

                this.giveStatusError(event.target , 'Devi compilare questo campo')

                return event.target

            }
            
            

        }
        

 
    }

    giveStatusError(objectDom , message){

        objectDom.className+=' errorInput'
        
        let oldInput=objectDom.value

        objectDom.value = ''

        objectDom.placeholder= message

        setTimeout(function(){
            objectDom.value = oldInput
            oldInput = null
        },1000)

    


        this.button.disabled=true
    }


    deleteStatusError(event){

        let listOfClasses = event.target.classList
        
        if( listOfClasses.contains('errorInput') ) listOfClasses.remove("errorInput",'oko') 
        

        

        
        for (const object of this.allObjects) {
            
            
            if( object.classList.contains('errorInput') ) return 

        }
        
        this.button.disabled = false      

    }

    enterDisabled(event){

        if(event.which === '13'){

            event.preventDefault()

        }

        return true;

    }

}

export{ checkDataForm }