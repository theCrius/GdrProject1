<template>
    <div id="descrizione_main">
        <div id="immagini">
            <template v-for="(immagine,key) in infoChat.immagini">
            <img :src="'/storage/homeinterna/images/chats/' + infoChat.id + '/' + key + '/' + immagine" alt="" :key="immagine">
            </template>
        </div>
        <div id="Descrizione">
            <h2> Descrizione </h2>
            <p>{{ infoChat.descrizione }}</p>
        </div>
        <div id="news">
            <h2>News</h2>
            <ul>
                <li v-for="oneNews in infoChat.news" :key="oneNews.id"><p>{{ oneNews.descrizione }}</p><p class="whoMadeIt">{{ oneNews.user.name }} il {{ oneNews.created_at }}</p></li>
            </ul>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            infoChat : null
        }
    },
    mounted(){
        this.getInfoChat()
    },
    methods : {
        getInfoChat()
        {   
           this.infoChat = this.$parent.$parent.usersOnlineInMap[0].infoChat.chat
        }
    }

}
</script>