<template>
    <div class="modal_vue" >
            <link rel="stylesheet" href="/css/SitoFacciaInterna/modalvue/modal.css">
            <div class="modal_vue_body">
                <img src="/img/imgHomeInterna/home/sfondobg.png" id="sfondo_modal_vue">
                <section>
                    <header id="modal_vue_header">
                </header>
                <main>
                    <component v-bind:is="this.$parent.componentToOpen" ></component>

                </main>
                </section>

            </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            
        }
    },

    mounted(){

    },
    methods : {
        
    }
}
</script>