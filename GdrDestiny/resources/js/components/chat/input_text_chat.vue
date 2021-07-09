<template>
    <div id="inputChat">
        <input type="text" v-model="action">
    </div>
</template>
<script>
export default {
    data(){
        return {
            action : '',
            max_length_action : null,
        }   
    },
    mounted(){
        this.getMaxLength()
    },

    watch : {
        action  : function()
        {
            if ( this.action.length > this.max_length_action ) this.action = this.action.slice(0,this.max_length_action)
            this.$parent.action_length = this.action.length
        }
    },
    methods : {
        getMaxLength()
        {
            axios
                .get('/api/consts/chat')
                .then(data => this.max_length_action = data.data.action.max_length)
                .catch(error => console.log(error))
        }
    }
}
</script>

