<template>
    <div class="absoluteContainerIcon" v-if="tools.length">
        <tools_icon></tools_icon>
         <tools_menu v-show="is_open" :class="{'openToolsMenu' : is_open}"></tools_menu>
    </div>
</template>
<script>
import tools_icon from "./tools_icon.vue"
import tools_menu from "./tools_menu.vue"
export default {
    data(){
        return {
            'is_open' : false
        }
    },
    components : {
        tools_icon,
        tools_menu

    },
    methods : {

    },
    props : {
        tools : Array
    }

}
</script>
<style>
.lightSpeedInLeft-enter-active{
    animation: lightSpeedInLeft;
}
</style>