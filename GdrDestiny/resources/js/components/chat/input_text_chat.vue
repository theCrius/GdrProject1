<template>
    <div id="inputChat">
        <input type="text" v-model="actionText">
    </div>
</template>
<script>
export default {
    data(){
        return {
            chat_rules : null
        }   
    },
    mounted(){
        this.getRules()
    },
    props : {
        'set_null' : Boolean
    },

    computed : {
        actionText : {

            set( action )
            {
                if ( action.length > this.chat_rules.action.max_length ) action = this.actionText.slice(0,this.chat_rules.action.max_length)
                this.$parent.action = this.checkWhatSymbolIsUsed(action)
            },

            get()
            {
                return this.$parent.action.action
            }


        }
    },
    watch : {

        set_null : function()
        {
            if( this.set_null ) this.actionText = ''
        }

    },

    methods : {
        getRules()
        {
            axios
                .get('/api/consts/chat')
                .then(data => this.chat_rules = data.data)
                .catch(error => console.log(error))
        },

        checkWhatSymbolIsUsed(action)
        {
            for (const rule in this.chat_rules.symbols) {

                if( action[0] == this.chat_rules.symbols[rule] )
                {

                    if( rule == 'sussurri' )
                    {

                        let regex =  /\#(\w+)\#/g;

                        let resultOfRegex = regex.exec(action)[1]
                        return { 'nameUser' : resultOfRegex , 'symbol' : rule, 'action' : action  }
                    }

                    return { 'symbol' : rule , 'action' : action}
                }

            }

            return { 'action' : action , 'symbol' : 'action'}
        },
    }
}
</script>

