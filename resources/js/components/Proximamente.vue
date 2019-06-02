<template>
    <div class="d-flex justify-content-center my-5">
        <div class="d-flex justify-content-center align-items-center contenedor">
            <h2> <strong>PRÓXIMAMENTE</strong> </h2>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Proximamente',
     mounted () {
        this.$store.commit('login', false)
        this.$store.commit('paginaPrincipal', false)
    }
}
</script>

<style lang="scss" scoped>



.contenedor {
    width: 384px;
    font-weight: bold;
    max-width: 384px;
    color: white;
    min-width: 384px;
    height: 370px;
    border-radius: 15px 60px 15px 60px;
    background-color: #389438;
    margin:0;
    top:0;
    left:0;
    position: relative;
    margin-top: 120px;
}

@media (max-width: 900px) {
    .contenedor {
        width: 272px;
        max-width: 272px;
        min-width: 272px;
        height: 224px;
        margin-top: 0;
    }

}

</style>

