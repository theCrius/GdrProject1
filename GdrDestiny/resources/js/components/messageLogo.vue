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
        new_messages : Object,
    },

    mounted() {

        
       
    },

    watch: {
        new_messages : function(){
            
            return this.messaggiStatus = ( ( this.new_messages.length == 0) ?  'messaggioff.png' : 'messaggion.png' )

        }
    },
    

    methods: {

    
    },

}
</script>