
function checkPassword (event,classCheckDataForm) {

    let passwordGotted= event.target.value

    if(passwordGotted.length === 0 ) return 
    
    if( passwordGotted.length < 8 ) return classCheckDataForm.giveStatusError(event.target,'Lunghezza minima 8 caratteri')
    if( !checkIfPasswordHasNumber(passwordGotted) || !checkIfPasswordHasUppercase(passwordGotted) ) return classCheckDataForm.giveStatusError(event.target,'Almeno una lettera maiuscola e un numero')
        
        

    function checkIfPasswordHasNumber(password){
        let regExp=/\d/

        return regExp.test(password) 
        
    }   

    function checkIfPasswordHasUppercase(password){
        let regExp=/[A-Z]/

        return regExp.test(password)
    }
    
}

function checkImages(event,classCheckDataForm){

    let linkImage= event.target.value

    if(linkImage.length === 0) return

    if( !linkImage.includes('.png') &&  !linkImage.includes('.jpg') && !linkImage.includes('.jpeg')  && !linkImage.includes('.gif') ) return classCheckDataForm.giveStatusError(event.target,'Inserire link con suffisso .png , .jpg , .jpeg , .gif')

}

function checkData(event,classCheckDataForm){

    let dataGotted= event.target.value
    if( !moment(dataGotted, 'DD/MM/YYYY',true).isValid() ) return classCheckDataForm.giveStatusError(event.target,'Formato errato, esempio da seguire DD/MM/YYYY')

}
export { checkPassword , checkImages , checkData }