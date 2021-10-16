<template>
    <div id="main_cartella_clinica">
                <link rel="stylesheet" href="/css/SitoFacciaInterna/tools/cartella_clinica_e_cura_pg.css">
        <div id="selects">
            <cartella_clinica_users :users="usersHurted"></cartella_clinica_users>
            <div>
                <label for="names">Scegli skill/spec</label>
                <select  name="names" v-model="dateToFilterResults.skillOrSpec.value" :class="{'errorInput' : dateToFilterResults.skillOrSpec.errors}">
                    <optgroup  label="Skills">
                        <option v-for="skill in skillsAndSpecs.skills " :key="skill.id" :value="{'id' :  skill.id,'type' : 'skills' }">{{skill.name}}</option>
                    </optgroup>
                    <optgroup  label="Specializzazioni">
                        <option v-for="spec in skillsAndSpecs.specs " :key="spec.id" :value="{'id' :  spec.id,'type' : 'specs' }">{{spec.name}}</option>
                    </optgroup>
                </select>
            </div>
        </div>
          <cartella_clinica_list :old_hurts="oldHurts"></cartella_clinica_list>
          <div id="cura_pg_statistiche">
              <button>Totale Danni : {{ totalHurts }}</button>
              <button>Quando Termina la cura : {{ this.dataToSubmit.dateWhenHurtAreDeleted.value  + ' giorni'}} </button>
          </div>
          <transition name="bounce">
            <completed v-show="sent" id="completed_cure"></completed>
             </transition>
          <div id="button_cura">
            <button  class="icon" @click="submitCure()" :disabled="isAllInputSelected">Cura</button>
        </div>
    </div>
</template>
<script>
import { form } from '../../../../mixins/form'
import completed from '../completed.vue'
import cartella_clinica_list from './cartella_clinica/cartella_clinica_list.vue'
import cartella_clinica_users from './cartella_clinica/cartella_clinica_users.vue'
export default {
    mixins : [ form ],
  components: { cartella_clinica_users, cartella_clinica_list, completed },
    data()
    {
        return {
             dataToSubmit : {},
             dateToFilterResults : {},
             oldHurts : [],
             skillsAndSpecs : [],
             sent : false,
             usersHurted : []
        }
    },
    computed : {
        totalHurts : function()
        {
            let danniTotali = 0
            for(let hurt of this.oldHurts)
            {
                if( danniTotali.hurtposition == 'sanitamentale') continue
                danniTotali += hurt.danno
            }
            return danniTotali
        },
        isAllInputSelected : function()
        {
            if (  this.dateToFilterResults.name.value && this.dateToFilterResults.skillOrSpec.value && this.oldHurts.length > 0  ) return false;
            return true
        }
        
    },
    watch : {
         'dateToFilterResults.name.value' : function(){this.getOldHurts()},
         'dateToFilterResults.skillOrSpec.value' : async function()
        {
            if(!this.dateToFilterResults.name.value) return 
            let skillOrSpec
            for( skillOrSpec of this.skillsAndSpecs[this.dateToFilterResults.skillOrSpec.value.type] )
            {
                if ( skillOrSpec.id == this.dateToFilterResults.skillOrSpec.value.id ) break
            }
            if ( skillOrSpec.moltiplicatore.per_livello ) this.dataToSubmit.howMuchPointsCanGetFromSkillOrSpec.value  = skillOrSpec.livello * skillOrSpec.moltiplicatore.per_livello 
            if ( skillOrSpec.moltiplicatore.aggiunta_secca ) this.dataToSubmit.howMuchPointsCanGetFromSkillOrSpec.value = skillOrSpec.moltiplicatore.aggiunta_secca
            if ( skillOrSpec.moltiplicatore.moltiplicatore_semplice )
            {

                    let response = await axios.get('/api/user/' + skillOrSpec.caratteristica + '/getCaratteristica')
                    this.dataToSubmit.howMuchPointsCanGetFromSkillOrSpec.value = response.data
            
            }
            this.dataToSubmit.dateWhenHurtAreDeleted.value = Math.ceil( Math.abs( this.totalHurts / this.dataToSubmit.howMuchPointsCanGetFromSkillOrSpec.value  ) )
            
        }
    },
    methods: {
        getOldHurts : function()
        {
            if( this.dateToFilterResults.name.value.length == 0) return
            axios
                .get('/api/user/'+ this.dateToFilterResults.name.value +'/hurts')
                .then(response => {this.oldHurts = response.data})
                .catch(error => console.log(error))
        },
        getSkillsAboutMedicine()
        {
            axios
                .get('/api/skill/curaPg')
                .then(response => this.skillsAndSpecs = response.data)
                .catch(error => console.log(error))
        },
        changeDataFrontEnd(user)
        {
            this.sent = true
            this.oldHurts = []
            for(let key in this.usersHurted)
            {
                if( this.usersHurted[key].id == user ) return this.usersHurted.splice(key,1)
            }

        },  
        submitCure()
        {
            this.dataToSubmit.medicalrecordsToDelete.value = this.oldHurts.map(function(hurt){ return {'id' : hurt.id , 'hurtposition' : hurt.hurtposition}})
            this.checkIfAllInputsHaveBeenWritten('dataToSubmit', Object.keys(this.dataToSubmit))
            if( this.thereAreErrors ) return 
            axios
                .post('/api/user/' + this.dateToFilterResults.name.value + '/cura',this.objectToSendThroughApi(this.dataToSubmit))
                .then(response => this.changeDataFrontEnd(response.data.patient))
                .catch( error => console.log(error))
        },
        getUsersNotInCureAndHurted()
        {
            axios
                .get('/api/usershurtedAndNotInCure')
                .then(response => this.usersHurted = response.data)
                .catch(error => console.log(error))
        }
    },
    created()
    {

        this.createVModelDatas('dateToFilterResults',['name','skillOrSpec'])
        this.createVModelDatas('dataToSubmit',['dateWhenHurtAreDeleted', 'howMuchPointsCanGetFromSkillOrSpec','medicalrecordsToDelete'])
        this.getOldHurts()
        this.getSkillsAboutMedicine()
        this.getUsersNotInCureAndHurted()
    }
    
}
</script>