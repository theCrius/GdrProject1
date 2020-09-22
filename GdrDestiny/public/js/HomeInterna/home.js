function changeGhostHome(){

    function changeGhost(event){

        let ghostId=document.querySelector('#ghost')
        let numberOfLi=event.target.dataset.number
        if(!numberOfLi) return;

        let classRightOrLeft=event.target.parentElement.parentElement.parentElement;
        for(let child of classRightOrLeft.children){
            child.children[0].children[0].src='/img/imgHomeInterna/home/senzapunt.png'
         
        }

        if(classRightOrLeft.className === 'buttonLeft') return ghostId.children[0].src='/img/imgHomeInterna/home/ghostsx.png';
        ghostId.children[0].src='/img/imgHomeInterna/home/ghostdx.png'


    }
    function returnGhost(event){
        
        let classRightOrLeft=event.target.parentElement.parentElement.parentElement;
        if(classRightOrLeft.className !== 'buttonRight' && classRightOrLeft.className !== 'buttonLeft') return;
        let ghostId=document.querySelector('#ghost')
        let linkMenu = (classRightOrLeft.className === 'buttonLeft') ? ['archivi.png','presenti.png','rimnet.png'] : ['schedapg.png','rymzody.png','logouttuttodx.png']
        for(let i=0; i < classRightOrLeft.children.length; i++){
            classRightOrLeft.children[i].children[0].children[0].src="/img/imgHomeInterna/home/"+linkMenu[i];
        }
        ghostId.children[0].src='/img/imgHomeInterna/home/ghost.png'
 


    }

    let menuTop=document.querySelector('.listMenu');
    menuTop.addEventListener('mouseover',changeGhost)
    menuTop.addEventListener('mouseout',returnGhost)

}

function addDataForm(nameClass){
    let formToAppend=document.querySelector('form');
    
    if( formToAppend ) throw new Error('Form non trovato');


    function GetData(formWhereIsDatas,nameClass){
        formWhereIsDatas=document.querySelectorAll('.'+nameClass);
        //if(formWhereIsDatas.length < 3) box
    }
    


    
    
}