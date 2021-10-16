<template>
    <ul id="hurts_show" :class="{'delete' : admin_power}">
        <li v-for="hurt in old_hurts" :key="hurt.id" @click="deleteItem(hurt)" >
            <p>{{ hurt.descrizione }} <span class="danno">{{hurt.danno }} {{ (hurt.hurtposition == 'sanitamentale' ? 'pm' : 'pc') }}</span></p>
            <p class="whoAdnWhen"><span v-if="!admin_power">Posizione Danno: {{hurt.hurtposition}} |</span> {{ hurt.user_who_add_hurt.name }} il {{ dateAction(hurt.created_at)}}</p>
        </li>
    </ul>
</template>
<script>
export default {
    data()
    {
        return {
            
        }
    },
    props : {
        old_hurts : Array,
        admin_power : Boolean
    },
    methods : {
        dateAction(timestamp)
        {
            return moment(timestamp).format('L')
        },
        deleteItemFrontEnd(itemToRemove)
        {
            for(let key in this.$parent.oldHurts)
            {
                if( this.$parent.oldHurts[key].id == itemToRemove.id ) this.$parent.oldHurts.splice(key,1)
            }
        },
        deleteItem(item)
        {
            if(!this.admin_power) return 
            axios
                .delete('/api/medicalrecord/' + item.id)
                .then(response => this.deleteItemFrontEnd(response.data))
                .catch(error => console.log(error))
            
        }
    }
}
</script>