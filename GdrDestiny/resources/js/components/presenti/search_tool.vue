<template>
    <div class="tool_presenti">
   <input type="text" name="namePg" placeholder="Personaggio da cercare" v-model="namePg">
   <label class="switch">"
  <input type="checkbox" v-model="user_is_offline">
  <span class="slider"></span>
  <h2 id="status_on_off">Status</h2>
</label>
    </div>
</template>

<script>
export default {
    data(){
        return {
            'namePg' : '',
            'user_is_offline' : false,
        }
    },

    watch : {
        'namePg' : function(){ this.searchUserTool() },
        'user_is_offline' : function(){ this.searchUserTool() },
    },


    methods : {

        searchUser(whereTryToSearch)
        {
            this.$parent.usersFound = []
            for (const key in whereTryToSearch) {

                let letters = 0 ;
                let usersRegistered = whereTryToSearch[key].infoPg || whereTryToSearch[key]
                let chatWhereIsUser = ''
                console.log(whereTryToSearch[key])
                if( whereTryToSearch[key].infoChat ) { chatWhereIsUser = whereTryToSearch[key].infoChat.chat }
                for(  const key2 in usersRegistered.name)
                {
                    if ( usersRegistered.name[key2] === this.namePg[key2] ) letters += 1;
                }
                if( letters > 3 )
                {
                    if( this.$parent.usersFound.includes(usersRegistered) ) continue
                    this.$parent.usersFound.push( {'infoPg' : usersRegistered ,  'chat' : chatWhereIsUser }  )
                }
                

            }
        },

        searchUserTool(){

            this.namePg = this.namePg.charAt(0).toUpperCase() + this.namePg.toLowerCase().slice(1)
        
            if ( this.user_is_offline ) return  this.searchUser(this.$parent.$parent.$parent.all_users)
            
            this.searchUser(this.$parent.$parent.$parent.usersOnline)
        }
        
    }


}
</script>