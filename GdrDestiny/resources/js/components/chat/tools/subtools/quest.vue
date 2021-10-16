<template>
    <div class="total">
                <link rel="stylesheet" href="/css/SitoFacciaInterna/tools/quest.css">
        <input type="text" v-model="dataToSubmit.name.value" :disabled="is_quest_opened" :class="{'errorInput' : dataToSubmit.name.errors}" :placeholder="dataToSubmit.name.errors || 'Nome Quest'">
        <button @click="sendData()">{{ is_quest_opened ? 'Chiudi Quest' : 'Apri Quest'  }}</button>
        <transition name="bounce">
            <completed v-show="sent" id="completed_quest"></completed>
             </transition>
    </div>
</template>
<script>
import { form } from '../../../../mixins/form'
import completed from '../completed.vue'
export default {
  components: { completed },
    mixins : [ form ],
    data()
    {
        return {
            dataToSubmit : {},
            is_quest_opened : this.$root.usersOnlineInMap[0].infoChat.chat.quest[0],
            sent : false
        }
    },
    created()
    {
        this.createVModelDatas('dataToSubmit',['name'])
        if ( this.$root.usersOnlineInMap[0].infoChat.chat.quest[0] ) this.dataToSubmit.name.value = this.$root.usersOnlineInMap[0].infoChat.chat.quest[0].name
    },
    methods : {
        changeDataFrontEnd(questOpened)
        {
            this.$root.usersOnlineInMap[0].infoChat.chat.quest[0] = questOpened
            this.is_quest_opened = true
            this.$forceUpdate()
            this.sent = true

        },
        closeQuestFrontEnd()
        {
            this.$root.usersOnlineInMap[0].infoChat.chat.quest[0] = null
            this.is_quest_opened = false
            this.dataToSubmit.name.value = ''
            this.$forceUpdate()
                        this.sent = true


        },
        closeQuest()
        {
            axios
                .put('/api/chat/' + this.$root.usersOnlineInMap[0].infoChat.chat.id + '/quest/' + this.$root.usersOnlineInMap[0].infoChat.chat.quest[0].id)
                .then(response => this.closeQuestFrontEnd())
                .catch(error => console.log(error))
        },
        openQuest()
        {
            this.checkIfAllInputsHaveBeenWritten('dataToSubmit', Object.keys(this.dataToSubmit))
            if( this.thereAreErrors ) return 
            axios
                .post('/api/chat/' + this.$root.usersOnlineInMap[0].infoChat.chat.id + '/quest/store',this.objectToSendThroughApi(this.dataToSubmit))
                .then(response => this.changeDataFrontEnd(response.data))
                .catch( error => this.showErrorsInFrontEnd(error.response.data.errors, 'dataToSubmit', Object.keys(this.dataToSubmit)))
        },
        sendData()
        {
            if( !this.is_quest_opened ) return this.openQuest()
            this.closeQuest()
        }
    },
    computed : {
        thereAreErrors : function(){
            return this.checkErrors('dataToSubmit',Object.keys(this.dataToSubmit))
        }
    }

    
}
</script>