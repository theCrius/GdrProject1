<template>
    <div id="inputsAndButton">
        <div id="inputs">
            <input type="text" v-model="$parent.dataToSubmit.descrizione.value" id="descrizioneClinica" :placeholder="$parent.dataToSubmit.descrizione.errors || 'Descrizione Danno'"  :class="{'errorInput' :$parent.dataToSubmit.descrizione.errors}">
            <input type="number" v-model="$parent.dataToSubmit.danno.value" id="dannoClinica"  :placeholder="$parent.dataToSubmit.danno.errors || 'Quanti Pc/Pm'"  :class="{'errorInput' :$parent.dataToSubmit.danno.errors}">
        </div>
        <div id="button">
            <button @click="submitData()" class="icon">Invia</button>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {

        }
    },
    methods : {
        addDataToFronted(newItem)
        {
            this.$parent.oldHurts.push(newItem)
            this.$parent.resetData('dataToSubmit',Object.keys(this.$parent.dataToSubmit), ['hurtposition'])
        },
        submitData()
        {
            this.$parent.checkIfAllInputsHaveBeenWritten('dataToSubmit', Object.keys(this.$parent.dataToSubmit))
            if(this.thereAreErrors) return
            this.$parent.dataToSubmit.danno.value = - this.$parent.dataToSubmit.danno.value
            axios
                .post('/api/user/' + this.$parent.dateToFilterResults.name.value + '/medicalrecords/add', this.$parent.objectToSendThroughApi(this.$parent.dataToSubmit))
                .then(response => this.addDataToFronted(response.data))
                .catch(error => this.$parent.showErrorsInFrontEnd(error.response.data.errors, 'dataToSubmit', Object.keys(this.$parent.dataToSubmit)))

        }
    },
    computed : {
        thereAreErrors : function(){
            return this.$parent.checkErrors('dataToSubmit',Object.keys(this.$parent.dataToSubmit))
        }
    }
}
</script>