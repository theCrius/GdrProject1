<template>
    <div id='singleMessage'  v-if='this.$parent.messageToOpen'>
    
        <h1>{{ this.$parent.messageToOpen.message.title }}</h1>
        <div class='textMessage'>
        <p id='content'>{{ this.$parent.messageToOpen.message.message }}</p>
        <p id='date'>{{this.$parent.messageToOpen.message.created_at}} , <i> {{ this.$parent.messageToOpen.userFrom }}</i></p>
        </div>
        

    </div>
</template>

<script>
export default{

    data(){

        return {

        }
    },

    



}

</script>