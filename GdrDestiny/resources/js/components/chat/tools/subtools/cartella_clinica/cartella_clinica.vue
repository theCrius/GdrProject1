<template>
    <div id="main_cartella_clinica">
        <link rel="stylesheet" href="/css/SitoFacciaInterna/tools/cartella_clinica_e_cura_pg.css">
        <div id="selects">
            <cartella_clinica_users></cartella_clinica_users>
            <div>
        <label for="hurtpositions">Scegli la zona del corpo</label>
        <select name="hurtpositions" v-model="dataToSubmit.hurtposition.value" :class="{'errorInput' :dataToSubmit.hurtposition.errors}">
        <option v-for=" (singlePosition,index) in hurtpositions" :value="singlePosition" :key="index">{{ singlePosition }}</option>

        </select>
        </div>
        </div>
        <cartella_clinica_list :old_hurts="oldHurts" :admin_power="true"></cartella_clinica_list>
        <cartella_clinica_inputs></cartella_clinica_inputs>
    </div>
</template>
<script>
import { form }  from "../../../../../mixins/form.js"
export default {
    mixins : [form],
    data(){
        return {
            'dateToFilterResults' : {},
            'hurtpositions' : ['top','bottom','middle','sanitamentale'],
            'oldHurts' : [],
            'dataToSubmit' : {},
        }
    },
    methods : {
       getOldHurts : function()
        {
            if( this.dateToFilterResults.name.value.length == 0 || this.dataToSubmit.hurtposition.value.length == 0) return
            axios
                .get('/api/user/'+ this.dateToFilterResults.name.value +'/hurts/'+ this.dataToSubmit.hurtposition.value)
                .then(response => {this.oldHurts = response.data})
                .catch(error => console.log(error))
        },
    },
    watch : {
        'dateToFilterResults.name.value' : function(){this.getOldHurts()},
        'dataToSubmit.hurtposition.value' : function(){ this.getOldHurts() }

    },
    created(){
        this.createVModelDatas('dateToFilterResults',['name'])
        this.createVModelDatas('dataToSubmit',['descrizione','hurtposition','danno','hurtposition'])

        this.getOldHurts()
    }

}
</script>