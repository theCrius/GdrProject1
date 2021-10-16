<template>
    <div class="modal_vue" >
            <link rel="stylesheet" href="/css/SitoFacciaInterna/modalvue/modal.css">
            <div class="modal_vue_body" :style="{height : this.$parent.componentToOpen.height,width : this.$parent.componentToOpen.width}">
                <!-- .image is a variable that is created if it is necessary -->
                <img :src=" $parent.componentToOpen.image" id="sfondo_modal_vue">
                <section>
                    <header id="modal_vue_header">
                    <div class="boxTop" v-if="titleModalIsDisplayed">
                        <h1 class="title">{{ this.getNameModal() }}</h1>
                            <component v-bind:is="this.$parent.componentToOpen.header" ></component>
                    </div>
                        <h1 class="icon" @click="closeModal()">&times</h1>

                </header>
                <main>
                    <component v-bind:is="this.$parent.componentToOpen.main" ></component>

                </main>
                <footer>
                    
                </footer>
                </section>

            </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            'titleModalIsDisplayed' : true
        }
    },

    mounted(){

    },
    methods : {
        getNameModal()
        {
            return this.$parent.componentToOpen.main.replaceAll('_',' ').toUpperCase()
        },
        closeModal()
        {
            this.$parent.componentToOpen.main = null ;
            this.$parent.componentToOpen.header = null ;
            this.$parent.componentToOpen.footer = null ;
            this.$parent.componentToOpen.height = null
            this.$parent.componentToOpen.width = null
            this.$parent.componentToOpen.image = '/img/imgHomeInterna/sfondo_modal_vue.png'
            this.titleModalIsDisplayed = true
},
        

    }
}
</script>