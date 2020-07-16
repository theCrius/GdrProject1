class poupUp{
    static createWindowPoupUp(url){
        let h=750;
        let w=450;
        var left = (screen.width/2)-(h/2);
        var top = (screen.height/2)-(w/2);
        this.popupWindow = window.open(
            url,'popUpWindow','height='+h+',width='+w+',left='+left+',top='+top+',resizable=no,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
    }
    



}