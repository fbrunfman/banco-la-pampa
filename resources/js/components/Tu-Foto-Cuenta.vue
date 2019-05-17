<template>
    <div>
        <h2>Tu Foto Cuenta</h2>
    </div>
</template>

<script>
export default {
    name: 'Tu Foto Cuenta',
    mounted () {
        this.$store.commit('login', false)
    }
}
</script>
