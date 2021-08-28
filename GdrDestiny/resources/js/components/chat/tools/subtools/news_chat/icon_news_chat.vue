<template>
    <div>
       <img src="/img/imgHomeInterna/Icone/piusottile.png" @click="openBox()" id="iconAddNews" class="icon"> 
    </div>
</template>
<script>
export default {
    data(){
        return {

        }
    },
    methods : {
        openBox()
        {
            if( this.$parent.$parent.componentToOpen.addNews  ) return this.$parent.$parent.componentToOpen.addNews = false
            return Vue.set(this.$parent.$parent.componentToOpen,'addNews', true)
        }
    }
}

</script>