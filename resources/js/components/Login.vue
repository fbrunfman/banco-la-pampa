<template>
    <div>
        <h2>Login</h2>
    </div>
</template>

<script>
export default {
    name: 'Login',
    mounted () {
        this.$store.commit('login', true)
    }
}
</script>
