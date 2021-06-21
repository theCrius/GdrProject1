<template>
    <div>
       <img :src="'/img/imgHomeInterna/home/' + messaggiStatus" id='messaggi' :class="{'vibrate' : new_messages.length }"  alt="messaggi">
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
            
             this.messaggiStatus = ( ( this.new_messages.length == 0) ?  'messaggioff.png' : 'messaggion.png' )

             this.vibrateActive = ( ( this.new_messages.length == 0) ?  false : true )

        }
    },
    

    methods: {

    
    },

}
</script>