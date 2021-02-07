<template>
    <div id="newMessage">
        <form :action="routeNewMessage" method="POST" >
            <input type="hidden" name="_token" :value="csrf">
            <div class="campi">
            <div class="left">

                <div class="name">
                    <input type="text" @blur='checkName' name="name" id="" v-model='name' placeholder="Nome dell'utente "  value="">
                </div>

                <div class="emailOggetto">
                    <input type="text" name="objectEmail" id="" placeholder='Oggetto del messaggio'>
                </div>

            </div>
            <div class="right">

                <textarea name="text" id="" cols="30" rows="10" placeholder="Testo da inviare"></textarea>

            </div>
        </div>
            <div class="buttons">
                <button id='invia'>Invia</button>
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

        }
    },

    props : {
        'routeNewMessage' : String,
        'csrf' : String 
    },
    mounted() {
        this.getAllUsersRegistered()
        
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
                
                if(name.name == this.name) return

            }
            console.log(this)


            

        }

        
    },
}
</script>
