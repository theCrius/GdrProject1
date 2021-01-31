<template>
    <div>
       <img :src="'/img/imgHomeInterna/home/' + messaggiStatus" id='messaggi'  alt="messaggi">
    </div>
</template>

<script>
export default {
    data(){
        return{
            messaggiStatus : 'messaggioff.png'
        }

    },
    props : {
        route
    },

    mounted() {
        this.checkNewMessages()
    },

    methods: {
        checkNewMessages(){

            axios
                .get(route)
                .then(response => console.log(response.data))
                .catch(error => console.log(error))


        }
    },

}
</script>