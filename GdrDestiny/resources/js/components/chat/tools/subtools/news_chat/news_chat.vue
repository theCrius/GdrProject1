<template>
    <div id="note_chat">
        <link rel="stylesheet" href="/css/SitoFacciaInterna/tools/news_chat.css">
        <add_news_chat v-show="this.$parent.$parent.componentToOpen.addNews"></add_news_chat>
       <div id="news_written">
            <ul>
                <li v-for="singleNews in news" :key="singleNews.id" @click="deleteNews(singleNews.id)">
                    <p>{{ singleNews.descrizione }}</p>
                    <p class="dateNews">{{ singleNews.user.name }} il {{ dateNews(singleNews.created_at) }}</p>
                    </li>
            </ul>
        </div>
    </div>
</template>
<script>
import add_news_chat from './add_news_chat.vue'
export default {
  components: { add_news_chat },
    data(){
        return {
            news : []
        }
    },
    methods : {
        getOldNews()
        {
           this.news = this.$parent.$parent.usersOnlineInMap[0].infoChat.chat.news
        },
        dateNews(dateToPrint)
        {
            return moment(dateToPrint).format('LL')
        },
        deleteNewsFromList($newsToDelete)
        {
            for(let key in this.$parent.$parent.usersOnlineInMap[0].infoChat.chat.news)
            {
                if($newsToDelete.id == this.$parent.$parent.usersOnlineInMap[0].infoChat.chat.news[key].id) return this.$parent.$parent.usersOnlineInMap[0].infoChat.chat.news.splice(key,1)
            }
        },
        deleteNews(id)
        {
            axios
                .delete('/api/news/' + id)
                .then( response => this.deleteNewsFromList(response.data))
                .catch(error => console.log(error))
        }
    },
    mounted(){
        this.getOldNews()
    }
    
}
</script>