<template>
    <div class='presenti_tool'>
        <transition enter-active-class="animate__animated animate__flipInX" mode="out-in">
                <search_tool id="search_tool" v-show="this.$parent.$parent.componentToOpen.show_search_tool"></search_tool>
        </transition>
        <div id="useronlineinmap">
            <table>
                <tr>
                    <th><h3>Nome</h3></th>
                    <th><h3>Info PG</h3></th>
                    <th><h3>Cariche On/Off</h3></th>
                    <th><h3>Chat</h3></th>

                </tr>
                <template v-if="this.$parent.$parent.componentToOpen.show_search_tool">
                    <show_searches :user="user" v-for="user in usersFound" :key="user.id"></show_searches>
                </template>
                <template v-else>

                <template v-for="( users , nameMap) in usersDividedIntoMap">
                <tr  :key="nameMap" v-if="nameMap">
                    <td colspan="6" id="" class="nameMap"><h2>{{ nameMap.replace('_',' ') }}</h2></td>
                </tr>
                        <show_searches :user="user" v-for="user  in users" :key="user"></show_searches>

                
                </template>
                </template>
            </table>
            
        </div>
    </div>
</template>
<script>
import search_tool from './search_tool.vue';
import show_searches from './show_searches.vue';
export default{
    data(){
        return {
            'usersDividedIntoMap' : {},
            'usersFound' : [],
            
        }
    },
    components : {
        search_tool ,
        show_searches
    },

    mounted(){
        this.divideUsersInMap()
        
        Echo.channel('onlineStatus')
            .listen('.user.online', () => this.divideUsersInMap() )
           

    },
    methods : {

        divideUsersInMap()
        {
            this.usersDividedIntoMap = {}
            //se l'utente si trova in una chat allora aggiungiamo le informazioni se no lasciamo solo le informazioni dell'utente
            for (const key in this.$parent.$parent.usersOnline) {

            let chatAndUserInfoToSend = this.$parent.$parent.usersOnline[key].infoChat ? { infoPg : this.$parent.$parent.usersOnline[key].infoPg, chat : this.$parent.$parent.usersOnline[key].infoChat.chat } : { infoPg : this.$parent.$parent.usersOnline[key].infoPg }

            if ( Object.keys( this.usersDividedIntoMap ).includes( this.$parent.$parent.usersOnline[key].nameMap ) ) 
            {
               if ( !this.usersDividedIntoMap[this.$parent.$parent.usersOnline[key].nameMap].includes ( this.$parent.$parent.usersOnline[key].infoPg ) )
               {
                   this.usersDividedIntoMap[this.$parent.$parent.usersOnline[key].nameMap].push( chatAndUserInfoToSend )
               }
            }else
            {
                this.usersDividedIntoMap[ this.$parent.$parent.usersOnline[key].nameMap ] = [chatAndUserInfoToSend]
            }
        }
        },

    }
}
</script>

