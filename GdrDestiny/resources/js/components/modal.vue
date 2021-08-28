<template>
    <div class="modal_vue" >
            <link rel="stylesheet" href="/css/SitoFacciaInterna/modalvue/modal.css">
            <div class="modal_vue_body" :style="{height : heightModal,width : widthModal}">
                <img src="/img/imgHomeInterna/sfondo_modal_vue.png" id="sfondo_modal_vue">
                <section>
                    <header id="modal_vue_header">
                    <div class="boxTop">
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
            heightModal : null,
            widthModal : null
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
            this.editHeight(null)
            this.editWidth(null)
        },
        editHeight(newHeight)
        {
            this.heightModal = newHeight
        },
        editWidth(newWidth)
        {
            this.widthModal = newWidth
        }

    }
}
</script>