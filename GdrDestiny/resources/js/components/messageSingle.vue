<template>
    <div id='singleMessage'>
    
        <h1>{{ message.message.title }}</h1>
        <div class='textMessage'>
        <p id='content'>{{ message.message.message }}</p>
        <p id='date'>{{message.message.created_at}} , <i> {{ message.userFrom }}</i></p>
        </div>
        

    </div>
</template>

<script>
export default{

    data(){

        return {

        }
    },

    props : {
        'message' : Object,
    }


}

</script>