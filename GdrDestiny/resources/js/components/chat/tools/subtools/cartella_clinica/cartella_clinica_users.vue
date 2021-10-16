<template>
    <div id="first-div">
        <label for="names">Scegli il nome del Personaggio</label>
        <select  name="names" v-model="$parent.dateToFilterResults.name.value" :class="{'errorInput' : $parent.dateToFilterResults.name.errors}">
            <option v-for="user in ( users || $root.all_users)" :value="user.id" :key="user.id">{{ user.name }}</option>
        </select>
    </div>
</template>
<script>
export default {
    data()
    {
        return {}
    },
    props : {
        'users' : Array
    }
}
</script>