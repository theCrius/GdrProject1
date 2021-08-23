<template>
    <div :class="{'comunicazioni_off' : ( typology == 'comunicazioni_off'), 'display_inline' : $parent.display_inline(typology) }" >
     <span :class="{ 'infoPgChat' : true , 'sussurri' : (typology === 'sussurri')}"> {{ user.name }}<span v-if="!$parent.display_inline(typology)"><img  class="icon_presenti"  :src="'/img/imgHomeInterna/Icone/Sesso/' + user.sesso +'.png'" :title="( user.name == 'f' ) ? 'femmina' : 'maschio'"><img class="icon_presenti"  :src="'/img/imgHomeInterna/Icone/Emisfero/' + user.emisfero.immagine" :title="user.emisfero.name" alt=""><img class="icon_presenti" :src="'/img/imgHomeInterna/Icone/Razze/' + user.razza.immagine" :title="user.razza.name" alt=""><img class="icon_presenti" v-for="classOfUser in user.classi" :key="classOfUser" :src="'/img/imgHomeInterna/Icone/Classi/' + classOfUser.immagine" alt="" :title="classOfUser.name"></span></span><i v-if="typology == 'comunicazioni_off'">comunica alla chat</i>
     <span v-if="typology == 'sussurri'">sussurra a {{ user_receive.name}}:</span> 
    </div>
</template>
<script>
export default {
    data()
    {
        return {

        }
    },
    props : {
        user : Object,
        user_receive : Object,
        typology : String
    },
}
</script>