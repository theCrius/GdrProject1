class XMLHttp {


    static connectionToPage(url){
       
        let http=new XMLHttpRequest()

        return new Promise((resolve,reject) => {

            http.onreadystatechange=function() {
                http.onload = function () {
                    if (this.status >= 200 && this.status < 300 && http.response) {
                      resolve(http.response);
                    }else{
                      reject({
                        status: this.status,
                        statusText: http.statusText
                        
                      });
                    }
                  };
                  http.onerror = function () {
                    reject({
                      status: this.status,
                      statusText: http.statusText
                    });
                  };
                  
                
            }
            
            http.open('GET',url,true)  
            http.send()
            

        })
        
         


        

        
       

    }

}

export { XMLHttp }