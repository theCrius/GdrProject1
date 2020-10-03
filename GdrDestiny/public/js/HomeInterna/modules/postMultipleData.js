class postMultipleData{

    constructor(maxDataToSend){
        if(typeof maxDataToSend != "number") throw new Error('Inserire un numero e non un altro valore come massimale')
        this.maxDataToSend=maxDataToSend
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
        if(htmlObjectClicked.nodeName === 'IMG' && htmlObjectClicked.id == idName){
            let skillSelectedByUser=SkillSelected(classThis)

            //remove status selected
            if(htmlObjectClicked.className.includes('selected')) return eliminateClassSelected(htmlObjectClicked)
            
            if(skillSelectedByUser.length === this.maxDataToSend) eliminateClassSelected(skillSelectedByUser[0])
            htmlObjectClicked.className+=' selected'
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