class poupUp{
    static createWindowPoupUp(url){
        
        let h=screen.height*0.50;
        let w=screen.width*0.60;
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/1.5);
        this.popupWindow = window.open(
            url,'popUpWindow','height='+h+',width='+w+',left='+left+',top='+top+',resizable=no,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
    }
    



}