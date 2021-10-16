<template>
    <div id="tools-menu">
        <header><h1 class="title">Tools</h1><h1  class="icon" @click="close()">&times</h1></header>
        <main>
            <ul>
                <li v-for="(tool , key) in this.$parent.tools" :key="key" @click="openModal(tool)" ><p>{{ tool.replace('_',' ') }}</p></li>
            </ul>
        </main>
    </div>
</template>
<script>
export default {
    data(){
        return {
            
        }
    },
    methods : {
        close()
        {
            this.$parent.is_open = false
        },
        openModal(name)
        {
            let topComponent = null
            if(name == 'news_chat') topComponent = 'icon_news_chat'
            if( name == 'quest') return this.$parent.$parent.openModalVue(topComponent,name,null,"50vh","39vh")
            if( name == 'news_chat' || name == "note_chat") return this.$parent.$parent.openModalVue(topComponent,name,null,"60vh","60vh")
            this.$parent.$parent.openModalVue(topComponent,name,null)
        }
    }
}
</script>