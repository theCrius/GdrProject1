<template>
    <div id="descrizione_main">
        <div id="immagini">
            <template v-for="immagine in infoChat.immagini">
            <h2 :key="immagine.id">{{ immagine.name }}</h2>
            <img :src="'/img/imgHomeInterna/chat/immagini_descrizione/' + immagine.immagine" alt="" :key="immagine.id">
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