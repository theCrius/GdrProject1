<template>
    <div class="completed">
        <h1>Inviato con successo</h1>
        <h2 @click="close()">&times</h2>
    </div>
</template>
<script>
export default {
    data()
    {
        return{

        }
    },
    methods : {
        close()
        {
            this.$parent.sent= false
        }
    }
}
</script>
<style >
    .completed
    {
        height: 7vh;
        width: 90%;
        background: #00838f;
        color: white;
        position: absolute;
        bottom: 5%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid white;
        z-index: 1;

    }
    h2{
        cursor: pointer;
        margin-left: 0.2em;
    }

</style>