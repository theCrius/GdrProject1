<template>
    <div>
         <img src="/img/imgHomeInterna/home/meteo.png" id='meteo' alt="" @mouseout="leave" @mouseover="show">
    </div>
</template>
<script>
export default {
    data(){
        return {
            mapMeteoInfo,
        }
    },
    props : {
        'name_map' : String,
        'route_info_meteo_map' : String,
    },
    methods: {
        show : function(){

            window.boxMeteo.showBox("Meteo",this.mapMeteoInfo,this,{'Closer': 'right' })
        },
        leave : function(){

            return window.boxMeteo.leaveBox()
        
        },
        mounted() {
            
            this.getInfo()

        },
        getInfo(){

            axios
                .get(this.route_info_meteo_map)
                .then(response => this.formatInfo(response))
                .catch(error => console.log(error))

        },

        formatInfo(meteoInfoFromDb){

            if( !this.mapMeteoInfo && !meteoInfoFromDb) this.updateMeteo()
            if( !this.mapMeteoInfo ) this.mapMeteoInfo = meteoInfoFromDb

            if( this.mapMeteoInfo->updated_at)

        },
        updateMeteo(){

            axios
                .get("https://api.openweathermap.org/data/2.5/weather?q=" + this.name_map.replace("_",' ') + "&units=metric&appid=" + process.env.MIX_API_METEO + "&lang=it")
                .then(function(response){ return updateM } )
                .catch(error => console.log(error))
            

        }
    },
}

</script>