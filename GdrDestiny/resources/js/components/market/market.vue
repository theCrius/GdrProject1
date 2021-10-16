<template>
    <div id="market_index">
        <link rel="stylesheet" href="/css/SitoFacciaInterna/market.css">
        <div id="title_market">
            
        </div>
        <div id="body_market">
            <div id="body_left_market">
                <objectToSell :object_to_sell="objectOne" v-for="objectOne in objects" :key="objectOne.id"></objectToSell>
            </div>
            <div id="body_right_market">
                <img src="/img/imgHomeInterna/market/categorie.png" alt="">
                <div id="body_right_titles_market">
                    <h1 class="title">Categorie</h1>
                    <ul>
                        <li v-for="category in categories" :key="category.id" :title="category.name" @click="getObjects(category.id)"><p>{{ category.name }}</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data()
    {
        return{
            categories : [],
            objects : []
        }
    },
    methods : {
        getCategories()
        {
            axios
                .get('/api/objects/categories')
                .then(response => this.categories = response.data)
                .catch(error => console.log(error))
                
        },
        getObjects(categoryId)
        {
            axios
                .get('/api/category/' + categoryId + '/objects' )
                .then(response => this.objects = response.data)
                .catch(error => console.log(error))
        }
    },
    mounted()
    {
        this.$root.componentToOpen.image = '/img/imgHomeEsterna/imgIscrizione/sfondoiscrizifine.png'
        this.$parent.titleModalIsDisplayed = false
        this.getCategories()
    }
}
</script>