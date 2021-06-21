<template>
    <div>
        <h1> Presenti </h1>
        <ul>
            <li v-for="user in users" :key="user.id"></li>
        </ul>
    </div>
    
</template>
<script>
export default {
    data(){
        return {

            users : [],
        
        }
    },
    mounted(){

        this.getUserOnline()
        console.log(this.users)
    },

    methods : {

        
        getUserOnline(){
            
            axios
                .get('/api/usersonline')
                .then( results => this.users = results )
                .catch( error => console.log(error) )
        },
        
    }
    
}
</script>
