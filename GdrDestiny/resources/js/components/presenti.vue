<template>
    <div>
        <h1> Presenti </h1>
        <ul>
            <li v-for="user in usersOnline" :key="user.id"></li>
        </ul>
    </div>
    
</template>
<script>
export default {
    data(){
        return {

            usersOnline : [],
        
        }
    },
    mounted(){

        Echo.channel('onlineStatus')
            .listen('.user.online', (data) => this.usersOnline = data.usersOnline )

        this.getUserOnline()

    },

    methods : {

        
        getUserOnline(){
            
            axios
                .get('/api/usersonline')
                .then( results => this.usersOnline = results.data )
                .catch( error => console.log(error) )
            
        },
        
    }
    
}
</script>
