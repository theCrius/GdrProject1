<template>
    <div id="newMessage">
        <form action="" method="post" id='formMessage'>

            <div class="campi">
            <div class="left">

                <div class="name">
                <input type="text" name="name" id="" placeholder="Nome dell'utente " data-users="okok" value="">
                </div>

                <div class="emailOggetto">
                    <input type="text" name="objectEmail" id="" placeholder='Oggetto del messaggio'>
                </div>

            </div>
            <div class="right">

                <textarea name="text" id="" cols="30" rows="10" placeholder="Testo da inviare"></textarea>

            </div>
        </div>
            <div class="buttons">
                <button id='invia'>Invia</button>
                <button id='annulla' onclick="openOrClose('#sendMessage2','on','leaveBox')">Chiudi</button>
            </div>
            </form>
        </div>

</template>
<script>

import { openOrClose } from "./../../../public/js/HomeInterna/functions/openOrClose.js"

export default {
    data(){
        return {

        }
    },
    methods: {
        
    },
}
</script>
