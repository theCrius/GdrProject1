<template>
    <div id="news_to_write">
        <textarea id="description_news" :placeholder="placeholder"  v-model="news"></textarea>
        <button id="submit_news" class="icon" @click="submit()" :disabled="news.length == 0">Aggiungi News</button>
    </div>
</template>
<script>
export default {
    data(){
        return {
            placeholder : "Descrizione della news",
            news : ''
        }
    },
    mounted(){

    },
    methods : {
        submit()
        {
            axios
                .post('/api/chat/' +this.$parent.$parent.$parent.usersOnlineInMap[0].infoChat.chat.id +'/news/add',
                {
                    description : this.news
                })
                .then( response => this.newsInserted(response.data))
                .catch(error => console.log(error))
        },
        newsInserted(newsToPrint)
        {
            this.news = ''
            this.$parent.$parent.$parent.usersOnlineInMap[0].infoChat.chat.news.unshift(newsToPrint)
        }
    }
}
</script>