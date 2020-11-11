class postMultipleData{

    constructor(maxDataToSend,idRiquadri,nameRequestToUse){
        if(typeof maxDataToSend != "number") throw new Error('Inserire un numero e non un altro valore come massimale')
        this.maxDataToSend=maxDataToSend
        this.idRiquadri=idRiquadri
        this.nameInput=nameRequestToUse
        
        this.addEventForm()
    }
    


    addEventForm(){

        this.formWhereAreDatas=document.querySelector('form');


        if( !this.formWhereAreDatas ) throw new Error('form non trovato')

        this.skills=this.formWhereAreDatas.querySelectorAll('.skillToSelect');

        if( !this.skills ) throw new Error('skill non presenti')

        
        this.formWhereAreDatas.addEventListener('click',(event) => { this.SkillToSelect(event.target,'skillToSelect') } )
        this.formWhereAreDatas.querySelector('#conferma').addEventListener('click',(event) => { this.submitData(event,this.SkillSelected())})



    }

    SkillSelected(){
        let skillsSelected=[]
 
        for(let skill of this.skills){
            
            if(skill.className.includes('selected')){
                skillsSelected.push(skill)
            }

              
        }

        return skillsSelected

    }

    submitData(event,datasToSend){
        let inputHidden
       
       
        for(let boxSelected of datasToSend){
            let idHiddenInImmage=boxSelected.querySelector('img').dataset.id

            inputHidden=document.createElement('input')
            inputHidden.value=idHiddenInImmage
            inputHidden.type='hidden'
            inputHidden.name=this.nameInput+'[]'
            this.formWhereAreDatas.append(inputHidden)
           
        }
    }

    
    SkillToSelect(htmlObjectClicked,className1){
        let classThis=this
        
        let htmlObjectBoxClicked=htmlObjectClicked.parentElement
        if(htmlObjectBoxClicked.className.indexOf(className1)){
            let skillSelectedByUser=classThis.SkillSelected(classThis)
            
            //remove status selected
            if(classThis.idRiquadri.className.includes('selected')) return eliminateClassSelected(classThis.idRiquadri)
            
            if(skillSelectedByUser.length === this.maxDataToSend) eliminateClassSelected(skillSelectedByUser[0])
            classThis.idRiquadri.className+=' selected'
        }


        function eliminateClassSelected(object){
            return object.className=object.className.slice(0,object.className.indexOf('selected')).replace(' ','') 
        }
    }

    
    
}


export { postMultipleData }