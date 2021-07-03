<template>
    <div>
    <img src="/img/imgHomeInterna/Icone/Presenti/search_tool.png" @click="openSearchTool()">
    </div>
</template>
<script>
export default {
    data(){
        return {
            
        }
    },
    methods : {
        openSearchTool()
        {

            if( this.$parent.$parent.componentToOpen.show_search_tool  ) return this.$parent.$parent.componentToOpen.show_search_tool = false

            Vue.set(this.$parent.$parent.componentToOpen, 'show_search_tool' , true )
        },
    },
}
</script>