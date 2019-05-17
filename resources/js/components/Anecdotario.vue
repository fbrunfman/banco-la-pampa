<template>
    <div>
        <h2>Anecdotario</h2>
    </div>
</template>

<script>
export default {
    name: 'Anecdotario',
    mounted () {
        this.$store.commit('login', false)
        this.$store.commit('paginaPrincipal', false)
    }
}
</script>
