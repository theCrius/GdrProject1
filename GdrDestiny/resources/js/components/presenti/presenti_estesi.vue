<template>
    <div>
        <ul>
            <li v-for="user in this.$parent.$parent.usersOnline" :key="user.id">{{ user.name }}</li>
        </ul>
    </div>
</template>
<script>
export default{
    data(){
        return {
            'usersDividedIntoMap' : {},
        }
    },

    mounted(){
        this.usersDividedIntoMap = {}

        for (const key in this.$parent.$parent.usersOnline) {
            if ( Object.keys( this.usersDividedIntoMap ).includes( this.$parent.$parent.usersOnline[key].nameMap ) ) 
            {
               if ( !this.usersDividedIntoMap[this.$parent.$parent.usersOnline[key].nameMap].includes ( this.$parent.$parent.usersOnline[key].name ) )
               {
                   this.usersDividedIntoMap[this.$parent.$parent.usersOnline[key].nameMap].push( this.$parent.$parent.usersOnline[key].name )
               }
            }else
            {
                this.usersDividedIntoMap[ this.$parent.$parent.usersOnline[key].nameMap ] = [ this.$parent.$parent.usersOnline[key].name ]
            }
        }
    },
    methods : {
        
        

    }
}
</script>
