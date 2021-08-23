<template>
    <div id="tools-menu">
        <header><h1 class="title">Tools</h1><h1  class="icon" @click="close()">&times</h1></header>
        <main>
            <ul>
                <li v-for="(tool , key) in this.$parent.tools" :key="key"><p> {{ tool.replace('_',' ') }}</p></li>
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
        }
    }
}
</script>