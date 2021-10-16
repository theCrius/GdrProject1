<template>
    <div class="body_left_object_market">
        <div class="body_left_object_image_market">
            <img src="/img/imgHomeInterna/market/frameoggimg.png" class="body_left_object_image_background_market" alt="">
            <div>
                <img :src="object_to_sell.image" alt="">
            </div>
        </div>
        <div class="body_left_object_description_market">
            <img src="/img/imgHomeInterna/market/descrizioneogg.png" alt="">
            <div class="body_left_object_description_box_market">
                <h1 class="title body_left_object_description_name_market">{{ object_to_sell.name }}</h1>
                <p class="body_left_object_description_descrizione_market">{{ object_to_sell.descrizione }}</p>
                <div class="body_left_object_description_descrizione_secondaria_market"><p>Costo: {{ object_to_sell.prize }}</p><p> Punti Resistenza: {{ object_to_sell.usura }}</p></div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data()
    {
        return {

        }
    },
    props : {
        object_to_sell : Object
    }
}
</script>