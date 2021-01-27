function openOrClose(nameClass , classOpenBox ,classLeaveBox ){
    
    let box= document.querySelector(nameClass)

    if( box.classList.contains(classLeaveBox) ) box.classList.remove(classLeaveBox)

    if( box.classList.contains(classOpenBox) ){
        
        box.classList.remove(classOpenBox)
       return box.classList.add(classLeaveBox)
    
    }



    box.classList.add(classOpenBox)

}

export { openOrClose }