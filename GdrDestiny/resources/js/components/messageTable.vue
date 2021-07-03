<template>
    <div :class="'messages ' + class_to_close">
    <transition name='slide-fade'>

                    <messageSingle v-show='messageToOpen'   > </messageSingle>
    </transition>
    <div  id="message">
                   
                    <table v-show="!newMessage">
                        <thead>
                            <tr>
                                <th><h1>Nome Pg</h1></th>
                                <th><h1>Anteprima messaggio</h1></th>
                                <th><h1>Check</h1></th>

                                <th @click="close">&times</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="message in messages" :class="{'notRead' : ( message.message.letto == 'no') }">
                                <td  @click='openMessage(message)'> {{ message.userFrom}} </td>
                                <td  @click='openMessage(message)'><p> {{ message.message.title }}</p> </td>
                                <td><input type="checkbox" v-model='messagesToDelete'  :value='message.message.id' ></td>
                                <td><p class='newMessage' v-show="message.message.letto === 'no'">new</p></td>

                            </tr>
                        </tbody>
                        
                    </table>
                    <transition name='slide-fade'>
                        <newMessage :csrf='csrf' :routeNewMessage="route_to_post_message" v-show="newMessage"></newMessage>
                    </transition>
                    <div class='buttons' v-show="!newMessage" >
                    <button @click="showNewMessage">Nuovo Messaggio</button>
                    <button @click='deleteMessages'>Cancella</button>
                    </div>
                </div>

        </div>
</template>
<script>
import messageSingle from "./messages/messageSingle.vue"
import newMessage from "./messages/newMessage.vue"
import { openOrClose } from "./../../../public/js/HomeInterna/functions/openOrClose.js"

export default{

    data(){
        return {
            messages : [],
            show : false,
            messageToOpen : null,
            messagesToDelete : [],
            newMessage : false,
        }
    },
    components : {

        messageSingle,
        newMessage

    },

    mounted() {

        this.getMessages()
        this.checkNewMessages()

         // ogni 30s c'è il check
        setInterval(this.checkNewMessages, 30000)

    },

    methods : {
        getMessages : function(){
            
                axios
                .get(this.route_show_messages)
                .then(response => this.messages = response.data)
                .catch(error => console.log(error))
            
            
        },

        updateStatusMessage : function(message){

            axios
                .put(
                    this.route_to_update_status,
                    {
                        'data' : 'si',
                        'id' : message.message.id
                    }
                )
                .then(this.getMessages())
                .catch(error => console.log(error))

            
            
        },

        checkNewMessages : function(){

            axios
                .get(this.route_to_check_new_messages)
                .then(response => this.newMessageOccured(response.data))
                .catch(error => console.log(error))


        },

        close : function(){

            openOrClose('.messages','onBoxRight',this.class_to_close,)
            
          
            

        },
        newMessageOccured : function(messages){

            this.$parent.newMessages = messages
            
            loop1 : 
            for( let key in messages ){
                loop2 : 
                for ( let key2 in this.messages ){
                    
                    if  ( this.messages[key2].message.id === messages[key].message.id ) continue loop1

                }

                this.messages.push( messages[key] )

            }

            


        },
        openMessage : function(message){
            
            this.messageToOpen = message

            if(message.message.letto == 'no') this.updateStatusMessage(message)

        },
        deleteMessages : function(){

            let messagesToDelete = Array.from(this.messagesToDelete)
            
            axios
                .post( 
                    this.route_to_delete_messages ,
                    { 'messages' : messagesToDelete }
                )
                .then( this.getMessages() )
                .catch(error => console.log(error))


        },
        showNewMessage :  function(){

            this.newMessage = true

        }
        
    },

    props : {
        'route_to_update_status' : String,
        'route_show_messages' : String,
        'route_to_delete_messages' : String,
        'route_to_post_message' : String,
        'route_to_get_all_users' : String,
        'route_to_check_new_messages' : String,
        'route_to_get_consts_value_new_message_checking' : String,
        'opened' : String,
        'csrf' : String,
        'class_to_close' : String,
    }

}
</script>
<style>
   
</style>