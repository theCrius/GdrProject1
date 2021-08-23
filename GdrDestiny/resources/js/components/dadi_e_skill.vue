<template>
    <div id="system_dado">
        <div class="sub_system">
        <label for="attributi">Scegli l'attributo</label>

        <select name="attributi" id="attributi" v-model="attrib">
        <option v-for="attributo in attributi" :key="attributo" :value="attributo">{{attributo}}</option>
        </select>
        </div>
        <div class="sub_system">
        <label for="attributi">Invia Skill/Specializzazione</label>

        <select name="skillsAndSpecs" id="skillsAndSpecs" v-model="skillOrSpec">
          <optgroup  label="Skills">
              <option v-for="skill in skillsAndSpecs.skills " :key="skill.id" :value="[skill.id,'skills']">{{skill.name}}</option>

        </optgroup>
    <optgroup label="Specializzazioni">
                    <option v-for="spec in skillsAndSpecs.specs " :key="spec.id" :value="[spec.id,'specs']">{{spec.name}}</option>
    </optgroup>
     </select>
</div> 
<div class="sub_system">
        <label for="dado">Dado da lanciare</label>

<select name="dado" id="dado" v-model="dado">
        <option v-for="dado in dadi" :key="dado" :value="dado">{{dado}}</option>
        </select>
</div>
<div class="sub_system">
    <button id="button_send" @click="sendData()">Invia</button>
    </div>
    </div>
</template>

<script>
export default {
    data(){
        return{

            attributi : ['Forza', 'Destrezza', 'Resistenza', 'Prontezza', 'Percezione','Intelligenza'],
            skillsAndSpecs : {},
            dadi : [6,10,20,100],
            attrib : '',
            skillOrSpec : '',
            dado: ''
        }

    },

    mounted() {
        this.$parent.editHeight("50vh")
        this.$parent.editWidth("50vh")
        this.getSkillsAndSpecs()
       
    },

    computed : {

        

    },

    watch: {
        
    },
    

    methods: {
        getSkillsAndSpecs()
        {
            axios
                .get('/api/user/skills/specs')
                .then(resolve =>  this.skillsAndSpecs = resolve.data)
                .catch(error => console.log(error))
        },
        sendData()
        {
            axios
                .post('/api/action/'+ this.$parent.$parent.usersOnlineInMap[0].infoChat.chat.id +'/store', {
                    action : { 
                        'symbol' : 'dadi' ,
                         attributo : this.attrib, 
                         skillOrSpec : { 'id' : this.skillOrSpec[0] , 'classToCall' : this.skillOrSpec[1]}, 
                         dado : this.dado  
                    }
                })
                .then( this.$parent.closeModal() )
                .catch( error => console.log(error))
        }
    },

}
</script>