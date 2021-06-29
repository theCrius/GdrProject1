<template>
    <div class="boxPresenti">
        <div class="presentiTitle"><h1 id="mainTitle"> Presenti </h1><h1 class="icon" onclick="openOrClose('.boxPresenti','onBoxLeft','offBoxLeft')" id="closePresenti">&times</h1></div>
        <ul id='presenti'>
            <li v-for="user in usersOnlineInMap" :key="user.id"><p @click="openModal( user.id )">{{ user.name }}</p> <img src="/img/imgHomeInterna/Icone/Presenti/open.png" id="iconPresenti" v-if="usersOnlineInMap[Object.keys(usersOnlineInMap).length - 1] == user "></li>
        </ul>
    </div>
 
</template>
<script>
export default {
    data(){
        return {

            usersOnline : [],
            usersOnlineInMap : [],
        
        }
    },
    mounted(){

        Echo.channel('onlineStatus')
            .listen('.user.online', (data) => this.updateUsers( data.usersOnline ) )

        this.getUserOnline()

    },
    props : {

        'current_map' : Object
    },

    methods : {

        
        getUserOnline(){
            axios
                .get('/api/usersonline')
                .then( results => this.updateUsers( results.data ))
                .catch( error => console.log(error) )
            
        },

        updateUsers( usersOnline ){
            this.usersOnline = usersOnline
            this.usersOnlineInMap = []
            loop1: 
            for (const keyFirstLoop in this.usersOnline) {
                
                    if( !this.checkIfUserIsInChat(this.usersOnline[keyFirstLoop]) ) continue
                    for (const keySecondLoop in this.usersOnlineInMap){
                        if( this.usersOnlineInMap[keySecondLoop].name == this.usersOnline[keyFirstLoop].name ) continue loop1;
                    }
                    this.usersOnlineInMap.push( this.usersOnline[keyFirstLoop] )
            

            }

        },
        checkIfUserIsInChat(user)
        {
            
                   
                    let sameNameRoute = user.last_chat.nameRoute == this.current_map.nameRoute
                    
                    return sameNameRoute && this.haveSameParametres(user.last_chat.parametres)


            

            
        },  
        
        haveSameParametres(parametres)
        {
            let parametresChecked = 0
            for (const key in parametres) {
                for (const key in this.current_map.parametres) {
                    if( parametres[key] == this.current_map.parametres[key]) parametresChecked += 1
                }
            }
            return parametresChecked === parametres.length
        },

        openModal(idUser)
        {
            return modal.openModal("/user/" + idUser ,null,'schedaPg/userProfile.js')
        },

    
    }
}
            
    
    

</script>
