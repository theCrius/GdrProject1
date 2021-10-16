<template>
    <div class="total">
        <link rel="stylesheet" href="/css/SitoFacciaInterna/tools/note_chat.css">
        <div id="note_images">
            <form  enctype="multipart/form-data">
            <ul>
                <li v-for="(item,key) in immagine" :key="key">
                    <button v-show="item" class="display_image" @click.prevent="" :class="{'errorInput' : error[key].error}">{{ nameFile(item) }}</button>
                    <input v-show="!item"  type="file" :ref="'immagine_' + key" @change="insertImage($event.target.files,key)" :placeholder="error[key].error ? 'Solo .png a .jpg sono permessi come link' : ('Link immagine chat ' + key)" @blur="checkInput(key)"   > 
                    <button  class="icon deleteImage" @click.prevent="deleteImage(key)">&times</button>
                </li>
            </ul>
             <transition name="bounce">
            <completed v-show="sent"></completed>
             </transition>
            </form>
        </div>
        <div id="note_descrizione">
            <textarea  id="note_textarea" v-model="descrizione" placeholder="Descrizione chat"></textarea>
            <button id="edit_modify" class="icon" :disabled="thereIsError" @click="submitData()">Modifica</button>
        </div>

    </div>
</template>
<script>
import completed from '../completed.vue'
export default {
  components: { completed },
    data(){
        return {
            immagine : [null,null,null],
            descrizione : this.$parent.$parent.usersOnlineInMap[0].infoChat.chat.descrizione,
            error : [
                {error : false},
                {error : false},
                {error : false}
            ],
            sent : false
        }
    },
    methods : {
        nameFile(singleFile)
        {
            return ( singleFile instanceof File) ? singleFile.name : singleFile
        },
        checkInput(keyOfImmagine)
        {
            if( this.immagine[keyOfImmagine].length == 0  ) return
            this.error[keyOfImmagine].error = false
        },
        getOldImmagini()
        {
            for ( let index in  this.$parent.$parent.usersOnlineInMap[0].infoChat.chat.immagini)
            {
                this.immagine[index] = this.$parent.$parent.usersOnlineInMap[0].infoChat.chat.immagini[index]
            }
        },
        insertImage(file,key)
        {
            this.immagine[key] = file[0]
            this.$forceUpdate()

        },
        deleteImage(key)
        {
             this.$refs['immagine_'+key][0].value=null
             this.immagine[key] = ''
            this.error[key].error = false
             this.$forceUpdate()
        },
        getErrorInFrontEnd(errors)
        {
           for (const nameInput of Object.keys(errors)) {
                this.error[nameInput.split('.')[1]].error = errors[nameInput]
           }
        },
        submitData()
        {
           let imagesToSend = new FormData()
           for (const key in this.immagine)
           {
               if( this.immagine[key] instanceof File || this.immagine[key] == '' ) imagesToSend.append(`immagini[${key}]`,this.immagine[key])
           }
           imagesToSend.append('descrizione',this.descrizione)

            axios
                .post('/api/chat/' + this.$parent.$parent.usersOnlineInMap[0].infoChat.chat.id +'/update',imagesToSend)
                .then(response => this.sent = true)
                .catch(error => this.getErrorInFrontEnd(error.response.data.errors))
        }
    },
    computed : {
        thereIsError : function(){

            for (const key in this.error) {

                    if( this.error[key].error )
                    {
                        this.immagine[key] = this.error[key].error[0]
                        this.$forceUpdate()

                        return true
                    } 

            }
            return false

        }
    },
    created()
    {
        this.getOldImmagini()
    }
}
</script>
<style>
.bounce-enter-active {
  animation: bounce-in .5s;
}
.bounce-leave-active {
  animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}
</style>