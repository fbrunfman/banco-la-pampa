<template>
    <div class="d-flex justify-content-center">
        <img src="./img/proximamente.png" alt="" srcset="">
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
