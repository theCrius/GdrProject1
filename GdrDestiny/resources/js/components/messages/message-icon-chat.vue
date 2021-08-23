<template>
    <div id="messaggiChat">
        <h1 :class="{'new_message_chat' : newMessageWarn}">Messaggi</h1>
    </div>
</template>
<script>
export default {
    data(){
        return {
            newMessageWarn : false
        }
    },
    props : {
        new_messages : Array,
    },
    methods : {
        
    },
     watch: {
        new_messages : function(){
            
             this.newMessageWarn = ( this.new_messages.length != 0 )


        },
    },
}
</script>