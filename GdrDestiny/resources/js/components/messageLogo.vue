<template>
    <div>
       <img :src="'/img/imgHomeInterna/home/' + messaggiStatus" id='messaggi'  alt="messaggi">
    </div>
</template>

<script>
export default {
    data(){
        return{
            messaggiStatus : 'messaggioff.png',
        }

    },
    props : {
        route : String,
    },

    mounted() {
        // ogni 30s c'è il check
        setInterval(this.checkNewMessages, 30000)
    },

    methods: {
        checkNewMessages(){

            axios
                .get(this.route)
                .then(response => this.changeMessaggiStatus(response.data))
                .catch(error => console.log(error))


        },

        changeMessaggiStatus(data){
            
            return this.messaggiStatus = ( ( data.length == 0) ?  'messaggioff.png' : 'messaggion.png' )

        }
    },

}
</script>