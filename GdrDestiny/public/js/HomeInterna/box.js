class Box
{
    boxCreated;
    titleBox;
    contentBox;

    constructor(text,boxViewed,title){
       
        this.text=text;
        this.boxViewed=boxViewed;
        this.title=title;

        this.createBox()
    }

    createBox(){
        this.boxCreated=document.createElement('div')
        this.boxCreated.className='box'
        document.body.append(this.boxCreated)
        

        this.titleBox=document.createElement('div')
        this.titleBox.append(document.createTextNode(this.title))
        this.titleBox.className='titleBox'
        this.boxCreated.append(this.titleBox)

        this.contentBox=document.createElement('div')
        this.contentBox.append(document.createTextNode(this.text))
        this.contentBox.className='contentBox'
        this.boxCreated.append(this.contentBox)


    }
    
}