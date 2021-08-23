<template>
    <div id="bottomChat">
        <div id="bottomChat-left">
        <img src="/img/imgHomeInterna/chat/framescritto.png" alt="" id="sfondoChatInput">
        <div class="sameBox" id="bottomChat-left-copy">
                <div id="action_lenght">
                    <img src="/img/imgHomeInterna/Icone/map_&_chat/indietro.png" id="indietroChat" class="icon"  @click="goBack()" alt="">
                <div id="box_characters">
                    <p>{{ action.action.length }}</p>
                </div>
            </div>
            <input_text_chat :set_null=action_sent ></input_text_chat>
            <img src="/img/imgHomeInterna/Icone/map_&_chat/inviot.png" id="sendAction" @click="sendAction()" class="icon">
        </div>
    </div>
            <div id="bottomChat-right">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" @click="$parent.openModalVue(null,'simboli_chat')" id="moreInfoChat" x="0px" y="0px"
onmouseout="boxWhatIsThis.leaveBox()" onmouseover="boxWhatIsThis.showBox('Aiuto','Clicca per capire come inviare un sussurro o un azione',this,{ 'Closer' : 'bottom' })"
viewBox="0 0 172 172"
style=" fill:#000000;"><defs><linearGradient x1="86" y1="26.42619" x2="86" y2="114.72131" gradientUnits="userSpaceOnUse" id="color-1_123744_gr1"><stop offset="0" stop-color="#33a4b2"></stop><stop offset="1" stop-color="#6ec8ff"></stop></linearGradient><linearGradient x1="86" y1="18.36369" x2="86" y2="164.40244" gradientUnits="userSpaceOnUse" id="color-2_123744_gr2"><stop offset="0" stop-color="#1a545b"></stop><stop offset="1" stop-color="#009efd"></stop></linearGradient><linearGradient x1="80.625" y1="18.36369" x2="80.625" y2="164.40244" gradientUnits="userSpaceOnUse" id="color-3_123744_gr3"><stop offset="0" stop-color="#1a545b"></stop><stop offset="1" stop-color="#009efd"></stop></linearGradient></defs><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M83.3125,120.9375h-5.375v-13.4375c0,-7.40944 6.02806,-13.4375 13.4375,-13.4375h10.49737c9.03269,0 16.37763,-7.34494 16.37763,-16.37763v-31.99737c0,-7.40944 -6.02806,-13.4375 -13.4375,-13.4375h-37.625c-7.40944,0 -13.4375,6.02806 -13.4375,13.4375v16.125h-5.375v-16.125c0,-10.37375 8.43875,-18.8125 18.8125,-18.8125h37.625c10.37375,0 18.8125,8.43875 18.8125,18.8125v31.99737c0,11.99431 -9.75831,21.75263 -21.75263,21.75263h-10.49737c-4.44512,0 -8.0625,3.61738 -8.0625,8.0625z" fill="url(#color-1_123744_gr1)"></path><path d="M104.8125,16.125h-37.625c-16.32656,0 -29.5625,13.23594 -29.5625,29.5625v13.4375c0,2.96969 2.40531,5.375 5.375,5.375h16.125c2.96969,0 5.375,-2.40531 5.375,-5.375v-13.4375c0,-1.4835 1.204,-2.6875 2.6875,-2.6875h37.625c1.4835,0 2.6875,1.204 2.6875,2.6875v31.99737c0,3.10944 -2.51819,5.62763 -5.62763,5.62763h-10.49737c-13.35956,0 -24.1875,10.82794 -24.1875,24.1875v10.75c0,2.96969 2.40531,5.375 5.375,5.375h16.125c2.96969,0 5.375,-2.40531 5.375,-5.375v-8.0625h7.80987c17.94981,0 32.50263,-14.55281 32.50263,-32.50263v-31.99737c0,-16.32656 -13.23594,-29.5625 -29.5625,-29.5625zM129,77.68487c0,14.98281 -12.14481,27.12763 -27.12763,27.12763h-10.49737c-1.4835,0 -2.6875,1.204 -2.6875,2.6875v10.75h-16.125v-10.75c0,-10.38988 8.42262,-18.8125 18.8125,-18.8125h10.49737c6.07644,0 11.00263,-4.92619 11.00263,-11.00263v-31.99737c0,-4.45319 -3.60931,-8.0625 -8.0625,-8.0625h-37.625c-4.45319,0 -8.0625,3.60931 -8.0625,8.0625v13.4375h-16.125v-13.4375c0,-13.35956 10.82794,-24.1875 24.1875,-24.1875h37.625c13.35956,0 24.1875,10.82794 24.1875,24.1875z" fill="url(#color-2_123744_gr2)"></path><path d="M84.27463,129.48375c-10.20981,-2.709 -19.31506,6.39356 -16.60337,16.60338c1.19056,4.48544 4.81869,8.11356 9.30412,9.30413c10.20981,2.709 19.31506,-6.39356 16.60338,-16.60337c-1.19056,-4.48544 -4.81869,-8.11356 -9.30412,-9.30413zM82.20525,150.3495c-5.67063,1.08306 -10.57531,-3.82162 -9.49225,-9.49225c0.602,-3.15244 3.17931,-5.72975 6.33175,-6.33175c5.67063,-1.08306 10.57531,3.82162 9.49225,9.49225c-0.602,3.15244 -3.17931,5.72975 -6.33175,6.33175z" fill="url(#color-3_123744_gr3)"></path><g fill="#ffffff"><path d="M45.6875,53.75h10.75v5.375h-10.75z"></path></g><g fill="#ffffff"><path d="M75.25,112.875h10.75v5.375h-10.75z"></path></g></g></g></svg>
                <img src="/img/imgHomeInterna/chat/usadadi.png" alt="" @click="openModalSkill()" id="dadi">
                
            </div>
    </div>
</template>


<script>
import input_text_chat from './input_text_chat.vue'
import modal from "./../modal.vue"
export default {
    data(){
        return {
            action : { 'action' : '' , 'symbol' : ''},
            action_sent : false,
            clicked : false
        }
    },
    components : {
        input_text_chat,
        modal
    },
    props : {
        routeToGetBack : String,
    },
    methods : {
        goBack()
        {
            window.location.assign( this.routeToGetBack )
        },
        checkUserOnlineInMap(nameUser)
        {
            for( let key in this.$parent.usersOnlineInMap )
            {   
                if( this.$parent.usersOnlineInMap[key].infoPg.name.toLowerCase() == nameUser ) return this.$parent.usersOnlineInMap[key].infoPg.id
            }
            return false
        },
        sendAction()
        {
            if( !this.action.action.length ) return 

            if ( this.action.nameUser )
            {
                this.action.nameUser = this.checkUserOnlineInMap( this.action.nameUser.toLowerCase() )

                if( !this.action.nameUser ) return this.action.action = 'Utente non trovato, sussurro non inviato'

            }
            axios
                .post('/api/action/'+ this.$parent.usersOnlineInMap[0].infoChat.chat.id +'/store', {
                    action : this.action
                })
                .then(this.setNull())
                .catch(error => console.log(error))
        },
        setNull()
        {
            this.action = { 'action' : '' , 'symbol' : ''},
            this.action_sent = true;
        },
        openModalSkill()
        {
            this.$parent.openModalVue(null,'dadi_e_skill')
        }
    }
}
</script>