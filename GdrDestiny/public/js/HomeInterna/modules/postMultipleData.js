class postMultipleData{

    constructor(){
        this.getData()
    }
    


    getData(){

        this.formWhereIsDatas=document.querySelector('form');

        if( !this.formWhereIsDatas ) throw new Error('form non trovato')
        console.log(this.formWhereIsDatas)
        this.formWhereIsDatas.addEventListener('click',(event) => { this.SkillToSelect(event.target,'ok12') } )



    }

    
    SkillToSelect(htmlObjectClicked,className){
        
        if(htmlObjectClicked.nodeName === 'IMG' && htmlObjectClicked.className == className) htmlObjectClicked.className+=' selected'
    }

    
    
}


new postMultipleData