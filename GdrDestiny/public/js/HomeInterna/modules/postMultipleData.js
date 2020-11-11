class postMultipleData{

    constructor(maxDataToSend,idRiquadri,nameRequestToUse,cssSelectedClass){
        if(typeof maxDataToSend != "number") throw new Error('Inserire un numero e non un altro valore come massimale')
        this.maxDataToSend=maxDataToSend
        this.idRiquadri=idRiquadri
        this.nameInput=nameRequestToUse
        this.cssClassSelected=cssSelectedClass
        this.addEventForm()
    }
    


    addEventForm(){

        this.formWhereAreDatas=document.querySelector('form');


        if( !this.formWhereAreDatas ) throw new Error('form non trovato')

        this.skills=this.formWhereAreDatas.querySelectorAll('.skillToSelect');

        if( !this.skills ) throw new Error('skill non presenti')

        
        this.formWhereAreDatas.addEventListener('click',(event) => { this.SkillToSelect(event.target,this.idRiquadri) } )
        this.formWhereAreDatas.querySelector('#conferma').addEventListener('click',(event) => { this.submitData(event,this.SkillSelected())})



    }

    SkillSelected(){
        let skillsSelected=[]

    
        for(let skill of this.skills){
           
            if(skill.className.includes(this.cssClassSelected)){
                skillsSelected.push(skill)
            }

              
        }

        return skillsSelected

    }

    submitData(event,datasToSend){
        let inputHidden
      
        for(let boxSelected of datasToSend){
            let idHiddenInImmage=boxSelected.querySelector('img').dataset.id
            if( !idHiddenInImmage ) return;
            inputHidden=document.createElement('input')
            inputHidden.value=idHiddenInImmage
            inputHidden.type='hidden'
            inputHidden.name=this.nameInput+'[]'
            
            this.formWhereAreDatas.append(inputHidden)
           
        }
    }

    
    SkillToSelect(htmlObjectClicked,className1){
        let classThis=this
        
        let htmlObjectBoxClicked=htmlObjectClicked.parentElement.parentElement
        
        if(htmlObjectBoxClicked.className.includes('skillToSelect')){
            let skillSelectedByUser=classThis.SkillSelected(classThis)
            
            //remove status selected
            if(htmlObjectBoxClicked.className.includes('selected')) return eliminateClassSelected(htmlObjectBoxClicked)
            
            if(skillSelectedByUser.length === this.maxDataToSend) eliminateClassSelected(skillSelectedByUser[0])
            htmlObjectBoxClicked.className+=' '+this.cssClassSelected
        }


        function eliminateClassSelected(object){
            let nameOfCssSelcted=classThis.cssClassSelected
            return object.className=object.className.slice(0,object.className.indexOf(nameOfCssSelcted))
        }
    }

    
    
}


export { postMultipleData }