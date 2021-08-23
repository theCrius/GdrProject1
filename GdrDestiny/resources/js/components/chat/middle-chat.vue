<template>
    <div id="contenitoreAzioni">
        <ul>
            <template v-for="action in this.actions.slice().reverse()">
                <li v-if="checkIfUserCanRead(action)" :key="action.id" :class="{'fato' : ( action.typology == 'fato' ) , 'sussurri' : (action.typology === 'sussurri') , 'dado' : (action.typology === 'dadi') }">
                     <name_user_in_chat :user="action.info_pg" :user_receive="action.info_pg_receive" :typology="action.typology" v-if="action.typology != 'fato' && action.typology != 'dadi' "></name_user_in_chat>
                    <p  :class="{'comunicazioni_off' : ( action.typology ==  'comunicazioni_off' ),'alignJustify' : true,'display_inline' : display_inline(action.typology)}" v-html="action.text_sent"></p>
                    <p class="dataAzione"><b v-if="action.typology === 'fato' || action.typology === 'dadi'" class="nameFato">{{action.info_pg.name}}</b  ><i v-if="action.typology != 'dadi'" >{{ dateAction(action) }}</i></p>
            
                </li>
            </template>
        </ul>
    </div>
</template>

<script>
import name_user_in_chat from './name_user_in_chat.vue';

export default {
    data(){
        return {
            actions : [] ,
            symbols : {}
        }
    },
    components : {
        name_user_in_chat,
    },
    mounted(){
        this.getRules()
          setTimeout(
        () => {
            this.get_action_after_refresh()
            Echo.channel('chat.' + this.chat_id)
                .listen('.action.new', (data) => this.add_action_to_list(data.action) )
                .listen('.sussurro.new',(data) => this.add_action_to_list(data.sussurro))
        }, 1000);

    },
    props : {

        'chat_id' : Number,
        current_user : Object,

    },
    methods : {
        getRules()
        {
            axios
                .get('/api/consts/chat')
                .then(data => this.symbols = data.data.symbols)
                .catch(error => console.log(error))
        },
        get_info_user(idUser)
        {
            for( let key in this.$parent.all_users )
            {
                if( this.$parent.all_users[key].id == idUser ) return this.$parent.all_users[key]
            }
        
        },
        display_inline(typology)
        {
            return (typology == 'sussurri') || typology == 'comunicazioni_off'
        },
        replace_symbol_to_change_color(textToEdit)
        {
            return ( 
                textToEdit
                        .replaceAll('&lt;','<span class="parlato">&lt;')
                        .replaceAll('&gt;','&gt;</span>')
                        .replaceAll('[','<span class="parentesi">[')
                        .replaceAll(']',']</span>')
            )

        },
        get_action_after_refresh()
        {
            axios
                .get('/api/action/'+ this.chat_id + '/last')
                .then( data => data.data.forEach(action => {
                    this.add_action_to_list(action)
                }))
                .catch(error => console.log(error))
        },
        dateAction(action)
        {
            return moment(action.created_at).format('LTS');
        }, 
        openChannelsForSussurri()
        {
                Echo.channel('chat.'+ this.chat_id +'.userReceived.'+ this.current_user.id)
                    .listen('.sussurro.new',(data) => console.log(data))
            
        },
        add_action_to_list(action)
        {
            action.info_pg = this.get_info_user( action.id_user )
            if ( action.id_user_receive ) action.info_pg_receive = this.get_info_user(action.id_user_receive)
            action.text_sent = this.replace_symbol_to_change_color(action.text_sent)
            if( this.actions.some( singleAction => singleAction.id === action.id) ) return
            this.actions.push( action )
        },
        checkIfUserCanRead(action)
        {
            if( action.typology != 'sussurri' ) return true

            return action.id_user === this.current_user.id || action.id_user_receive == this.current_user.id

        },
    }
}
</script>