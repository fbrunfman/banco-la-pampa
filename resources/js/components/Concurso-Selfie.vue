<template>
    <div>
        <h2>Concurso Selfie</h2>
    </div>
</template>

<script>
export default {
    name: 'Concurso Selfie',
    mounted () {
        this.$store.commit('login', false)
    }
}
</script>
