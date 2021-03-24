<template>
    <div>
         <img src="/img/imgHomeInterna/home/meteo.png" id='meteo' alt="" @mouseout="leave" @mouseover="show">
    </div>
</template>
<script>
export default {
    data(){
        return {
            mapMeteoInfo : '',
            when_updates_meteo : '',
        }
    },
    props : {
        'name_map' : String,
        'route_info_meteo_map' : String,
        'route_to_update_meteo_map' : String,
        'route_to_get_consts_about_when_updates_meteo' : String
    },
    mounted() {
            
            this.getInfo()
            this.setRule()

    },
    methods: {
        show : function(event){

            window.boxMeteo.showBox("Meteo",this.mapMeteoInfo,event.target,{'Closer': 'right' })
        },
        leave : function(){

            return window.boxMeteo.leaveBox()
        
        },
        getInfo(){
           
            axios
                .get(this.route_info_meteo_map)
                .then(response => this.formatInfo(response.data))
                .catch(error => console.log(error))

        },

        formatInfo(meteoInfoFromDb){
            
            if( !this.mapMeteoInfo && !meteoInfoFromDb.meteo || ( moment().diff(meteoInfoFromDb.update_at,'hours') < this.when_updates_meteo ) ) this.updateMeteo()
           
            if( !this.mapMeteoInfo ) this.mapMeteoInfo = JSON.parse( meteoInfoFromDb.meteo )


            

        },

        setRule(){

            axios
                .get(this.route_to_get_consts_about_when_updates_meteo)
                .then(response => this.when_updates_meteo = response.data.each_hours)
                .catch(error => console.log(error))

        },
        updateMeteo(){
           
            axios
                .get("https://api.openweathermap.org/data/2.5/weather?q=" + this.name_map.replace("_",' ') + "&units=metric&appid=" + process.env.MIX_API_METEO + "&lang=it")
                .then((response) =>  this.sendToDb(response.data)  )
                .catch(error => console.log(error))
            
        },
        sendToDb(data){
                let formatting = {
                                    'generals' : data.weather[0],
                                    'misure' : data.main,
                                    'vento'  : data.wind
                                 }
                
                axios
                    .put(this.route_to_update_meteo_map,{

                            'meteo' : formatting

                    })
                    .then((response) => this.mapMeteoInfo = response.data )
                    .catch(error => console.log(error))

            }
    },
}

</script>