<template>

    <div  id="message">
                   
                    <table>
                        <thead>
                            <tr>
                                <th><h1>Nome Pg</h1></th>
                                <th><h1>Anteprima messaggio</h1></th>
                                <th><h1>Check</h1></th>

                                <th @click="close">&times</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="message in messages" >
                            
                                <td> {{ message.userFrom}} </td>
                                <td><p> {{ message.message.title }}</p> </td>
                                <td> Si/no</td>

                            </tr>
                        </tbody>
                        
                    </table>
                    <div class='buttons'>
                    <button>Nuovo Messaggio</button>
                    <button>Cancella</button>
                    </div>
                </div>
</transition>
</template>
<script>
export default{

    data(){
        return {
            messages : [],
            show : false
        }
    },

    mounted() {

        this.getMessages()
             

    },

    methods : {
        getMessages : function(){
            
            axios
                .get(this.route)
                .then(response => this.messages = response.data)
                .catch(error => console.log(error))
            
            
        },
        close : function(){

            document.querySelector('#message').className = this.class_to_close
            

        }
        
    },

    props : {
        'route' : String,
        'opened' : String,
        'class_to_close' : String,
    }

}
</script>
<style>
    
</style>