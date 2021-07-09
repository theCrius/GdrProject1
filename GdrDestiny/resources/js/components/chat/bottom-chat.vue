<template>
    <div id="bottomChat">
        <div id="bottomChat-left">
        <img src="/img/imgHomeInterna/chat/framescritto.png" alt="" id="sfondoChatInput">
        <div class="sameBox" id="bottomChat-left-copy">
                <div id="action_lenght">
                    <img src="/img/imgHomeInterna/Icone/map_&_chat/indietro.png" id="indietroChat"  @click="goBack()" alt="">
                <div id="box_characters">
                    <p>{{ action_length }}</p>
                </div>
            </div>
            <input_text_chat></input_text_chat>
            <img src="/img/imgHomeInterna/Icone/map_&_chat/inviot.png" id="sendAction" class="icon">
        </div>
    </div>
            <div id="bottomChat-right">
                <img src="/img/imgHomeInterna/chat/usadadi.png" alt="" id="dadi">
            </div>
    </div>
</template>

<script>
import input_text_chat from './input_text_chat.vue'

export default {
    data(){
        return {
            action_length : undefined
        }
    },
    components : {
        input_text_chat
    },
    props : {
        routeToGetBack : String,
    },
    methods : {
        goBack()
        {
            window.location.assign( this.routeToGetBack )
        }
    }
}
</script>