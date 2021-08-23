<template>
    <div class="boxPresenti">
        <div class="presentiTitle"><h1 id="mainTitle" class="title"> Presenti </h1><h1 class="icon" onclick="openOrClose('.boxPresenti','onBoxLeft','offBoxLeft')" id="closePresenti">&times</h1></div>
        <ul id='presenti'>
            <li v-for="user in $parent.usersOnlineInMap" :key="user.id"><p @click="openUserInfo( user.infoPg.id )">{{ user.infoPg.name }}</p> <img src="/img/imgHomeInterna/Icone/Presenti/open.png" id="iconPresenti" @click="$parent.openModalVue('icon_search_tool','presenti_estesi')" v-if="$parent.usersOnlineInMap[Object.keys($parent.usersOnlineInMap).length - 1] == user "></li>
        </ul>
    </div>
 
</template>
<script>
export default {
    data(){
        return {
        
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
            this.$parent.usersOnline = usersOnline
            this.$parent.usersOnlineInMap = []
            
            loop1: 
            for (const keyFirstLoop in this.$parent.usersOnline) {
                    
                    if( !this.checkIfUserIsInChat(this.$parent.usersOnline[keyFirstLoop]) ) continue
                    for (const keySecondLoop in this.$parent.usersOnlineInMap){
                        if( this.$parent.usersOnlineInMap[keySecondLoop].infoPg.name == this.$parent.usersOnline[keyFirstLoop].infoPg.name ) continue loop1;
                    }
                    this.$parent.usersOnlineInMap.push( this.$parent.usersOnline[keyFirstLoop] )
            

            }
            console.log(this.$parent.usersOnlineInMap)

        },
        checkIfUserIsInChat(user)
        {
                    console.log(user)
                   console.log(user.last_chat.nameRoute,this.current_map.nameRoute)
                    let sameNameRoute = user.last_chat.nameRoute == this.current_map.nameRoute
                    return sameNameRoute && this.haveSameParametres(user.last_chat.parametres)


            

            
        },  
        
        haveSameParametres(parametres)
        {
            let parametresChecked = 0
            console.log( parametres, this.current_map.parametres)
            for (const key in parametres) {
                for (const key in this.current_map.parametres) {
                    if( parametres[key] == this.current_map.parametres[key]) parametresChecked += 1
                }
            }
            return parametresChecked === parametres.length
        },
        openUserInfo(idUser)
        {
            this.openModal("/user/" + idUser ,'schedaPg/userProfile.js')
        },

        openModal(url,scriptToAdd=null)
        {
            return modal.openModal(url,null,scriptToAdd);
        },

        

    
    }
}
            
    
    

</script>
