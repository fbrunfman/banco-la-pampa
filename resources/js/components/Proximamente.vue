<template>
    <div class="d-flex justify-content-center">
        <img src="./img/proximamente-compressor.png" alt="" srcset="">
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


@media (max-width: 1200px) {
    img {
        width: 244px;
        height: 250px;
    }
}

</style>

