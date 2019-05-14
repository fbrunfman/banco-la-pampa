<template>
    <div>
        <h2>Bingo</h2>
    </div>
</template>

<script>
export default {
    name: 'Anecdotario',
    mounted () {
        this.$store.commit('login', false)
    }
}
</script>
