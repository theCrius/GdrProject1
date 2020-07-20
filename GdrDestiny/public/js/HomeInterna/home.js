function changeGhostHome(){

    function changeGhost(event){

        let ghostId=document.querySelector('#ghost')
        let numberOfLi=event.target.dataset.number
        if(!numberOfLi) return;
        event.target.src='/img/imgHomeInterna/home/senzapunt.png'
        if(numberOfLi > 0 && numberOfLi < 4) return ghostId.children[0].src='/img/imgHomeInterna/home/ghostsx.png';
        ghostId.children[0].src='/img/imgHomeInterna/home/ghostdx.png'


    }
    let menuTop=document.querySelector('.listMenu');
    menuTop.addEventListener('mouseover',changeGhost)

}