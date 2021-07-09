<template>
    <tr >
                            <td><p class="icon" @click="openUserInfo( user.infoPg.id )">{{ user.infoPg.name }}</p></td>
                            <td><img  class="icon_presenti"  :src="'/img/imgHomeInterna/Icone/Sesso/' + user.infoPg.sesso +'.png'" :title="( user.infoPg.name == 'f' ) ? 'femmina' : 'maschio'"><img class="icon_presenti"  :src="'/img/imgHomeInterna/Icone/Emisfero/' + user.infoPg.emisfero.immagine" :title="user.infoPg.emisfero.name" alt="">
                            <img class="icon_presenti" :src="'/img/imgHomeInterna/Icone/Razze/' + user.infoPg.razza.immagine" :title="user.infoPg.razza.name" alt=""></td>
                            <td><img class="icon_presenti" v-for="classOfUser in user.infoPg.classi" :key="classOfUser" :src="'/img/imgHomeInterna/Icone/Classi/' + classOfUser.immagine" alt="" :title="classOfUser.name"></td>
                            <td v-if="user.chat"><p><a :href="'/chat/' + user.chat.id">{{ user.chat.name }}</a></p></td>
                        </tr>
</template>

<script>
export default {
    data(){
        return {

        }
    },
    props : {
        user : Object
    },
    methods : {
        openUserInfo(idUser)
        {
            return modal.openModal("/user/" + idUser ,null,'schedaPg/userProfile.js');
        }
    }
}
</script>