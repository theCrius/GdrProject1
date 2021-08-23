<template>
    <div class="icon">
        <img src="/img/imgHomeInterna/chat/iconmaster.png" id="tools-icon" @click="open()" alt="" onmouseout="boxWhatIsThis.leaveBox()" onmouseover="boxWhatIsThis.showBox('Tools Master','Potrai dare vita ai tuoi poteri',this,{ 'Closer' : 'bottom' })">
    </div>
</template>
<script>
export default {
    data(){
        return {

        }
    }, 
    methods : {
        open()
        {
            this.$parent.is_open = true
        }
    }

}
</script>