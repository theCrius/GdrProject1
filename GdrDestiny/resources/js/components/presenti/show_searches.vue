<template>
    <tr >
                            <td><p class="icon" @click="openUserInfo( user.id )">{{ user.name }}</p></td>
                            <td><img  class="icon_presenti"  :src="'/img/imgHomeInterna/Icone/Sesso/' + user.sesso +'.png'" :title="( user.name == 'f' ) ? 'femmina' : 'maschio'"><img class="icon_presenti"  :src="'/img/imgHomeInterna/Icone/Emisfero/' + user.emisfero.immagine" :title="user.emisfero.name" alt="">
                            <img class="icon_presenti" :src="'/img/imgHomeInterna/Icone/Razze/' + user.razza.immagine" :title="user.razza.name" alt=""></td>
                            <td><img class="icon_presenti" v-for="classOfUser in user.classi" :key="classOfUser" :src="'/img/imgHomeInterna/Icone/Classi/' + classOfUser.immagine" alt="" :title="classOfUser.name"></td>

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