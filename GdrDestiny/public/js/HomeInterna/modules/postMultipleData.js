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
            let lastMaximumSkillSelected=maxSkillSelected(classThis)
            
            //remove status selected
            if(htmlObjectClicked.className.includes('selected')) return eliminateClassSelected(htmlObjectClicked)
            
            if(lastMaximumSkillSelected) eliminateClassSelected(lastMaximumSkillSelected)
            htmlObjectClicked.className+=' selected'
        }

        function maxSkillSelected(classThis){
            let count=0;
            let skills=classThis.skills
     
            for(let skill of skills){
                
                if(skill.className.includes('selected')){
                    count+=1;
                    if(count == classThis.maxDataToSend) return skill
                }

                  
            }

            return null;

        }

        function eliminateClassSelected(object){
            return object.className=object.className.slice(0,object.className.indexOf('selected')).replace(' ','') 
        }
    }

    
    
}


export { postMultipleData }