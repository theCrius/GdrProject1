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
        'namePg' : function(){

            if ( this.user_is_offline ) return  this.searchUser(this.$parent.$parent.$parent.all_users)
            
            this.searchUser(this.$parent.$parent.$parent.usersOnline)




        }
    },


    methods : {

        searchUser(whereTryToSearch)
        {
            this.$parent.usersFound = []
            for (const key in whereTryToSearch) {

                let letters = 0 ;
                let usersRegistered = whereTryToSearch[key].infoPg || whereTryToSearch[key]

                if( !usersRegistered.name ) usersRegistered 
                for(  const key2 in usersRegistered.name)
                {
                    if ( usersRegistered.name[key2] === this.namePg[key2] ) letters += 1;
                }
                if( letters > 3 )
                {
                    if( this.$parent.usersFound.includes(usersRegistered) ) continue
                    this.$parent.usersFound.push( usersRegistered )
                }
                

            }
        },
        
    }


}
</script>