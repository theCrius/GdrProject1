class postMultipleData{

    constructor(maxDataToSend,idRiquadri){
        if(typeof maxDataToSend != "number") throw new Error('Inserire un numero e non un altro valore come massimale')
        this.maxDataToSend=maxDataToSend
        this.idRiquadri=idRiquadri
        
        this.getData()
    }
    


    getData(){

        this.formWhereAreDatas=document.querySelector('form');


        if( !this.formWhereAreDatas ) throw new Error('form non trovato')

        this.skills=this.formWhereAreDatas.querySelectorAll('#skill');

        if( !this.skills ) throw new Error('skill non presenti')

        
        this.formWhereAreDatas.addEventListener('click',(event) => { this.SkillToSelect(event.target,'skill') } )



    }

    
    SkillToSelect(htmlObjectClicked,idName){
        let classThis=this
        let htmlObjectBoxClicked=htmlObjectClicked.parentElement.parentElement
        if(htmlObjectBoxClicked.id == idName){
            let skillSelectedByUser=SkillSelected(classThis)
            
            //remove status selected
            if(htmlObjectBoxClicked.className.includes('selected')) return eliminateClassSelected(htmlObjectBoxClicked)
            
            if(skillSelectedByUser.length === this.maxDataToSend) eliminateClassSelected(skillSelectedByUser[0])
            htmlObjectBoxClicked.className+=' selected'
        }

        function SkillSelected(classThis){
            let skillsSelected=[]
     
            for(let skill of classThis.skills){
                
                if(skill.className.includes('selected')){
                    skillsSelected.push(skill)
                }

                  
            }

            return skillsSelected

        }

        function eliminateClassSelected(object){
            return object.className=object.className.slice(0,object.className.indexOf('selected')).replace(' ','') 
        }
    }

    
    
}


export { postMultipleData }