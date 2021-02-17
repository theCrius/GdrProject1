<template>
    <div id="newMessage">
        <form :action="routeNewMessage" id='messagesRightForm' method="POST" >
            <input type="hidden" name="_token" :value="csrf">
            <div class="campi">
            <div class="left">

                <div class="name">
                    <input type="text" @blur='checkName' :class="{ 'errorInput' : errors.messages.name }" name="name" id="" v-model='name' :placeholder="errors.placeholder.name"  value="">
                </div>

                <div class="emailOggetto">
                    <input type="text" name="objectEmail" id="" :class="{ 'errorInput' : errors.messages.title }" v-model='title' :placeholder="errors.placeholder.title">
                </div>

            </div>
            <div class="right">

                <textarea name="text" id="" cols="30" v-model='message' :class="{ 'errorInput' : errors.messages.message }" rows="10" :placeholder="errors.placeholder.message"></textarea>

            </div>
        </div>
            <div class="buttons">
                <button id='invia' :disabled="submitDisabled">Invia</button>
                <button id='annulla' @click="close">Chiudi</button>
            </div>
            </form>
        </div>

</template>
<script>

export default {
    data(){
        return {
            all_users : {},
            name : '',
            title : '',
            message : '',
            errors : {

                placeholder : {

                    name : 'Inserire nome dell\' utente',
                    
                    title : 'Inserire oggetto',

                    message : 'inserire messaggio'

                },

                messages : {

                    name : null,

                    title : null,

                    message : null

                }

            },
            submitDisabled : true ,

        }
    },

    props : {
        'routeNewMessage' : String,
        'csrf' : String 
    },
    mounted() {

        this.getAllUsersRegistered()
        
    },

    watch : {

        errors : {

                handler : function(){

                    for ( let key in this.errors.messages){

                        if( this.errors.messages[key] ) return this.submitDisabled = true; 

                    }


                    return this.submitDisabled = false


                },

                deep : true
        }
    },
    methods: {

        close : function(){
            event.preventDefault();
            
            this.$parent.newMessage = false;

        },

        getAllUsersRegistered : function (){

            axios
                .get(this.$parent.route_to_get_all_users)
                .then(response => this.all_users = response.data)
                .catch(error => console.log(error))
            

        },

         checkName : function(){

            for( let name of this.all_users){
                
                if(name.name == this.name) { 

                    this.errors.placeholder.name = ''   
                    return this.errors.messages.name = false

                }

            }

            this.errors.messages.name = true;

            
            


            

        }
        


        
    },
}
</script>
